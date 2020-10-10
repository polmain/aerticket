<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * Scope a query to only include tickets for specified airports and date.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAirportDate($query,$departureAirport,$arrivalAirport,$departureDateTime)
    {
        return $query
            ->whereHas('departureAirport',function ($airports) use ($departureAirport){
                $airports->where('name',$departureAirport);
            })
            ->whereHas('arrivalAirport',function ($airports) use ($arrivalAirport){
                $airports->where('name',$arrivalAirport);
            })
            ->where('departureDateTime','>=', $departureDateTime)
            ->where('departureDateTime','<', Carbon::parse($departureDateTime)->addDay());
    }
}

