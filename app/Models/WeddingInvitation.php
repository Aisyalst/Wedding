<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class WeddingInvitation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bride_name',
        'groom_name',
        'couple_nickname',
        'wedding_date',
        'ceremony_time',
        'reception_time',
        'venue_name',
        'venue_address',
        'venue_city',
        'venue_state',
        'venue_zipcode',
        'venue_latitude',
        'venue_longitude',
        'welcome_message',
        'love_story',
        'special_message',
        'hero_image',
        'couple_image',
        'gallery_images',
        'template_style',
        'color_scheme',
        'font_style',
        'enable_rsvp',
        'rsvp_message',
        'is_published',
        'slug',
    ];

    protected $casts = [
        'wedding_date' => 'date',
        'ceremony_time' => 'datetime:H:i',
        'reception_time' => 'datetime:H:i',
        'venue_latitude' => 'decimal:8',
        'venue_longitude' => 'decimal:8',
        'gallery_images' => 'array',
        'enable_rsvp' => 'boolean',
        'is_published' => 'boolean',
    ];

    /**
     * Get the user that owns the wedding invitation.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the guestbook entries for the invitation.
     */
    public function guestbooks()
    {
        return $this->hasMany(Guestbook::class);
    }

    /**
     * Generate a unique slug for the invitation.
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($invitation) {
            if (empty($invitation->slug)) {
                $invitation->slug = Str::slug($invitation->couple_nickname ?? 'invitation-' . time());
                
                // Ensure slug is unique
                $count = 1;
                while (static::where('slug', $invitation->slug)->exists()) {
                    $invitation->slug = Str::slug($invitation->couple_nickname ?? 'invitation') . '-' . $count;
                    $count++;
                }
            }
        });
    }

    /**
     * Get the public URL for the invitation.
     */
    public function getPublicUrlAttribute()
    {
        return route('invitation.show', $this->slug);
    }

    /**
     * Get the full venue address.
     */
    public function getFullAddressAttribute()
    {
        $parts = array_filter([
            $this->venue_address,
            $this->venue_city,
            $this->venue_state,
            $this->venue_zipcode,
        ]);

        return implode(', ', $parts);
    }

    /**
     * Get the Google Maps URL.
     */
    public function getGoogleMapsUrlAttribute()
    {
        if ($this->venue_latitude && $this->venue_longitude) {
            return "https://www.google.com/maps?q={$this->venue_latitude},{$this->venue_longitude}";
        }

        if ($this->full_address) {
            return "https://www.google.com/maps?q=" . urlencode($this->full_address);
        }

        return null;
    }
}
