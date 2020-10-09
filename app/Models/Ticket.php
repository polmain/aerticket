<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'flightNumber', 'arrival_airport_id','departure_airport_id', 'transporter_id','departureDateTime', 'arrivalDateTime','duration'
    ];
}
