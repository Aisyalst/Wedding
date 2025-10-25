<?php

namespace App\Http\Controllers;

use App\Models\WeddingInvitation;
use Illuminate\Http\Request;

class InvitationPageController extends Controller
{
    /**
     * Display the public wedding invitation page.
     */
    public function show($slug)
    {
        $invitation = WeddingInvitation::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('invitation.page', compact('invitation'));
    }

    /**
     * Preview the invitation page (for logged-in users).
     */
    public function preview()
    {
        $invitation = auth()->user()->weddingInvitation;
        
        if (!$invitation) {
            return redirect()->route('invitation.dashboard')
                ->with('error', 'Please create your invitation first.');
        }

        return view('invitation.page', compact('invitation'));
    }
}
