<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\TicketResources;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\TicketRepositoryInterface;
use App\Services\SearchService;

class SearchController extends Controller
{
    protected $ticket;
    protected $searchService;

    public function __construct(TicketRepositoryInterface $ticket, SearchService $searchService){
        $this->ticket = $ticket;
        $this->searchService = $searchService;
    }

    /**
     * Search Tickets
     *
     * @param SearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchTicket(SearchRequest $request){
        $validated = $request->validated();

        $tickets = $this
            ->ticket
            ->getAirportDate($validated['searchQuery']);

        return $this->searchService->getResponse($tickets,$request);
    }
}
