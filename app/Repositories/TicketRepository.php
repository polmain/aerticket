<?php


namespace App\Repositories;


use App\Models\Ticket;
use App\Repositories\Interfaces\TicketRepositoryInterface;

class TicketRepository implements TicketRepositoryInterface
{
    /**
     * Get ticket use airports and date
     *
     * @param array $data
     * @return mixed
     */
    public function  getAirportDate($data)
    {
        return Ticket::with(['departureAirport','arrivalAirport','transporter'])
            ->airportDate($data['departureAirport'],$data['arrivalAirport'],$data['departureDate'])
            ->get();
    }
}
