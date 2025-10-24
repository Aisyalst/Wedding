<?php

namespace App\Http\Controllers;

use App\Models\WeddingInvitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class WeddingInvitationController extends Controller
{
    /**
     * Display the user's wedding invitation dashboard.
     */
    public function dashboard()
    {
        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        // Create invitation if it doesn't exist
        if (!$invitation) {
            $invitation = WeddingInvitation::create([
                'user_id' => $user->id,
                'slug' => Str::slug($user->name) . '-' . $user->id,
            ]);
        }

        return view('invitation.dashboard', compact('invitation'));
    }

    /**
     * Update the wedding invitation data.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        $validated = $request->validate([
            'bride_name' => 'nullable|string|max:255',
            'groom_name' => 'nullable|string|max:255',
            'couple_nickname' => 'nullable|string|max:255',
            'wedding_date' => 'nullable|date',
            'ceremony_time' => 'nullable|date_format:H:i',
            'reception_time' => 'nullable|date_format:H:i',
            'venue_name' => 'nullable|string|max:255',
            'venue_address' => 'nullable|string',
            'venue_city' => 'nullable|string|max:255',
            'venue_state' => 'nullable|string|max:255',
            'venue_zipcode' => 'nullable|string|max:20',
            'venue_latitude' => 'nullable|numeric|between:-90,90',
            'venue_longitude' => 'nullable|numeric|between:-180,180',
            'welcome_message' => 'nullable|string',
            'love_story' => 'nullable|string',
            'special_message' => 'nullable|string',
            'template_style' => 'nullable|in:classic,modern,elegant,rustic',
            'color_scheme' => 'nullable|string|max:50',
            'font_style' => 'nullable|string|max:50',
            'enable_rsvp' => 'boolean',
            'rsvp_message' => 'nullable|string',
            'is_published' => 'boolean',
        ]);

        $invitation->update($validated);

        return back()->with('success', 'Wedding invitation updated successfully!');
    }

    /**
     * Upload hero image.
     */
    public function uploadHeroImage(Request $request)
    {
        $request->validate([
            'hero_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        // Delete old image if exists
        if ($invitation->hero_image) {
            Storage::disk('public')->delete($invitation->hero_image);
        }

        // Store new image
        $path = $request->file('hero_image')->store('wedding-images', 'public');
        $invitation->update(['hero_image' => $path]);

        return back()->with('success', 'Hero image uploaded successfully!');
    }

    /**
     * Upload couple image.
     */
    public function uploadCoupleImage(Request $request)
    {
        $request->validate([
            'couple_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        // Delete old image if exists
        if ($invitation->couple_image) {
            Storage::disk('public')->delete($invitation->couple_image);
        }

        // Store new image
        $path = $request->file('couple_image')->store('wedding-images', 'public');
        $invitation->update(['couple_image' => $path]);

        return back()->with('success', 'Couple image uploaded successfully!');
    }

    /**
     * Upload gallery images.
     */
    public function uploadGalleryImages(Request $request)
    {
        $request->validate([
            'gallery_images' => 'required',
            'gallery_images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        $galleryImages = $invitation->gallery_images ?? [];

        foreach ($request->file('gallery_images') as $image) {
            $path = $image->store('wedding-images/gallery', 'public');
            $galleryImages[] = $path;
        }

        $invitation->update(['gallery_images' => $galleryImages]);

        return back()->with('success', 'Gallery images uploaded successfully!');
    }

    /**
     * Delete a gallery image.
     */
    public function deleteGalleryImage(Request $request)
    {
        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        $galleryImages = $invitation->gallery_images ?? [];
        $imageToDelete = $request->input('image');

        if (($key = array_search($imageToDelete, $galleryImages)) !== false) {
            unset($galleryImages[$key]);
            Storage::disk('public')->delete($imageToDelete);
            $invitation->update(['gallery_images' => array_values($galleryImages)]);
        }

        return back()->with('success', 'Gallery image deleted successfully!');
    }

    /**
     * Display the public invitation page.
     */
    public function show($slug)
    {
        $invitation = WeddingInvitation::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();

        return view('invitation.show', compact('invitation'));
    }

    /**
     * Preview the invitation (for owner only).
     */
    public function preview()
    {
        $user = Auth::user();
        $invitation = $user->weddingInvitation;

        if (!$invitation) {
            return redirect()->route('invitation.dashboard')
                ->with('error', 'Please create your invitation first.');
        }

        return view('invitation.show', compact('invitation'));
    }
}
