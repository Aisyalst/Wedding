<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guestbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'wedding_invitation_id',
        'name',
        'visitor_number',
        'email',
        'message',
        'attendance',
        'checked_in_at',
    ];

    protected $casts = [
        'visitor_number' => 'integer',
        'checked_in_at' => 'datetime',
    ];

    /**
     * Get the wedding invitation that owns the guestbook entry.
     */
    public function weddingInvitation()
    {
        return $this->belongsTo(WeddingInvitation::class);
    }

    /**
     * Get the attendance record for this guestbook entry.
     */
    public function attendance()
    {
        return $this->hasOne(Attendance::class);
    }

    /**
     * Check if the guest has been checked in.
     */
    public function isCheckedIn()
    {
        return $this->attendance()->exists() || $this->checked_in_at !== null;
    }
}

