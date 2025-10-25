<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use App\Models\WeddingInvitation;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\Facades\DNS2DFacade as DNS2D;

class GuestbookController extends Controller
{
    /**
     * Store a new guestbook entry.
     */
    public function store(Request $request, $slug)
    {
        $invitation = WeddingInvitation::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'visitor_number' => 'required|integer|min:1|max:50',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string|max:1000',
            'attendance' => 'required|in:yes,no,maybe',
        ]);

        $validated['wedding_invitation_id'] = $invitation->id;

        $guestbook = Guestbook::create($validated);

        // Generate the attendance URL with guestbook ID
        $attendanceUrl = route('guestbook.attendance', ['id' => $guestbook->id]);

        // Store the URL in session to trigger download after redirect
        session(['qr_download' => [
            'guestbook_id' => $guestbook->id,
            'url' => $attendanceUrl,
            'guest_name' => $guestbook->name
        ]]);

        return redirect()->route('guestbook.download-qr', ['id' => $guestbook->id]);
    }

    /**
     * Display guestbook entries for the authenticated user's invitation.
     */
    public function index()
    {
        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        if (!$invitation) {
            return redirect()->route('invitation.dashboard')
                ->with('error', 'Please create your invitation first.');
        }

        $guestbooks = $invitation->guestbooks()
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        $stats = [
            'total' => $invitation->guestbooks()->count(),
            'attending' => $invitation->guestbooks()->where('attendance', 'yes')->count(),
            'not_attending' => $invitation->guestbooks()->where('attendance', 'no')->count(),
            'maybe' => $invitation->guestbooks()->where('attendance', 'maybe')->count(),
            'total_guests' => $invitation->guestbooks()->sum('visitor_number'),
        ];

        return view('invitation.guestbook', compact('guestbooks', 'invitation', 'stats'));
    }

    /**
     * Delete a guestbook entry.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $guestbook = Guestbook::findOrFail($id);

        // Ensure the guestbook belongs to the user's invitation
        if ($guestbook->weddingInvitation->user_id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $guestbook->delete();

        return back()->with('success', 'Guestbook entry deleted successfully.');
    }

    /**
     * Download QR code for guestbook entry.
     */
    public function downloadQr($id)
    {
        $guestbook = Guestbook::findOrFail($id);
        
        // Generate the attendance URL
        $attendanceUrl = route('guestbook.attendance', ['id' => $guestbook->id]);
        
        // Generate QR code as PNG
        $qrCode = DNS2D::getBarcodePNG($attendanceUrl, 'QRCODE', 10, 10);
        
        // Create filename
        $filename = 'guestbook-qr-' . $guestbook->id . '-' . time() . '.png';
        
        // Return as download
        return response()->streamDownload(function() use ($qrCode) {
            echo base64_decode($qrCode);
        }, $filename, [
            'Content-Type' => 'image/png',
        ]);
    }

    /**
     * Display attendance confirmation page.
     */
    public function attendance($id)
    {
        $guestbook = Guestbook::with('weddingInvitation')->findOrFail($id);
        
        return view('invitation.attendance', compact('guestbook'));
    }

    /**
     * Check in a guest by scanning their QR code
     */
    public function checkIn(Request $request, $id)
    {
        try {
            $guestbook = Guestbook::with('attendance')->findOrFail($id);
            
            // Check if already checked in (check attendance table)
            $existingAttendance = $guestbook->attendance()->first();
            if ($existingAttendance) {
                return response()->json([
                    'success' => false,
                    'message' => '⚠️ Guest already checked in at ' . $existingAttendance->checked_in_at->format('h:i A'),
                    'guest' => [
                        'name' => $guestbook->name,
                        'visitor_number' => $guestbook->visitor_number,
                        'checked_in_at' => $existingAttendance->checked_in_at->format('Y-m-d H:i:s')
                    ]
                ]);
            }
            
            // Create attendance record
            $attendance = Attendance::create([
                'guestbook_id' => $guestbook->id,
                'wedding_invitation_id' => $guestbook->wedding_invitation_id,
                'checked_in_at' => now(),
                'checked_in_by' => Auth::id(),
                'device_info' => $request->userAgent(),
                'ip_address' => $request->ip(),
                'notes' => $request->input('notes'),
            ]);
            
            // Also update guestbook table for backward compatibility
            $guestbook->checked_in_at = now();
            $guestbook->save();
            
            return response()->json([
                'success' => true,
                'message' => '✅ ' . $guestbook->name . ' checked in successfully!',
                'guest' => [
                    'name' => $guestbook->name,
                    'visitor_number' => $guestbook->visitor_number,
                    'email' => $guestbook->email,
                    'checked_in_at' => $attendance->checked_in_at->format('Y-m-d H:i:s')
                ]
            ]);
        } catch (\Exception $e) {
            \Log::error('Check-in error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}

