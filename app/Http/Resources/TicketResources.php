<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $duration = Carbon::parse($this->arrivalDateTime)->diffInMinutes($this->departureDateTime);
        return [
            'transporter' => [
                'code' => $this->transporter->code,
                'name' => $this->transporter->name,
            ],
            'flightNumber' => $this->flightNumber,
            'departureAirport' => $this->departureAirport->name,
            'arrivalAirport' => $this->arrivalAirport->name,
            'departureDateTime' => $this->departureDateTime,
            'arrivalDateTime' => $this->arrivalDateTime,
            'duration' => $duration, // or in database $this->daration
        ];
    }
}
