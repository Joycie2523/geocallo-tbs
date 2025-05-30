<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlightStatus extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }
}
