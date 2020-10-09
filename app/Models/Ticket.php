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

    /**
     * Arrival Airport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function arrivalAirport(){
       return $this->belongsTo(Airport::class, 'arrival_airport_id');
    }

    /**
     * Departure Airport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function departureAirport(){
       return $this->belongsTo(Airport::class, 'departure_airport_id');
    }

    /**
     * Departure Airport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transporter(){
       return $this->belongsTo(Transporter::class);
    }
}
