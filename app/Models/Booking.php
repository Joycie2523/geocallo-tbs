<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    // Optional: Set table name if different from "bookings"
    protected $table = 'bookings';

    // Mass assignable fields
    protected $fillable = [
        'user_id',
        'flight_id',
        'booking_date',
        'seat_number',
        'status',
    ];

    /**
     * A booking belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A booking belongs to a flight.
     */
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    } 

    public function status()
{
    return $this->belongsTo(BookingStatus::class, 'booking_status_id');
}

}

