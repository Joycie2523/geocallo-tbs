<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = [
        'flight_number',
        'origin',
        'destination',
        'departure_time',
        'arrival_time',
        'seat_capacity',
        'available_seats',
    ];

    // Relationships
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function status()
{
    return $this->belongsTo(FlightStatus::class, 'flight_status_id');
}

}
