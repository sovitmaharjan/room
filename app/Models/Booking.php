<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    const PENDING = 'Pending';
    const CONFIRMED = 'Confirmed';
    const CANCELLED = 'Cancelled';
    const REJECTED = 'Rejected';

    protected $fillable = [
        'user_id',
        'room_id',
        'from',
        'to',
        'duration',
        'extra'
    ];

    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
        'extra' => 'array'
    ];

    public function statuses()
    {
        return $this->hasMany(BookingStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
