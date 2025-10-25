<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'guestbook_id',
        'wedding_invitation_id',
        'checked_in_at',
        'checked_in_by',
        'device_info',
        'ip_address',
        'notes',
    ];

    protected $casts = [
        'checked_in_at' => 'datetime',
    ];

    /**
     * Get the guestbook entry that this attendance belongs to.
     */
    public function guestbook()
    {
        return $this->belongsTo(Guestbook::class);
    }

    /**
     * Get the wedding invitation that this attendance belongs to.
     */
    public function weddingInvitation()
    {
        return $this->belongsTo(WeddingInvitation::class);
    }

    /**
     * Get the user who checked in this guest.
     */
    public function checkedInByUser()
    {
        return $this->belongsTo(User::class, 'checked_in_by');
    }
}

