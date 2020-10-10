<?php


namespace App\Repositories\Interfaces;


use App\Http\Requests\SearchRequest;

interface TicketRepositoryInterface
{
    public function getAirportDate(array $data);
}
