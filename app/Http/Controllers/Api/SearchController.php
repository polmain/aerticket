<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SearchRequest;
use App\Http\Resources\TicketResources;
use App\Models\Ticket;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Search Tickets
     *
     * @param SearchRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchTicket(SearchRequest $request){
        $validated = $request->validated();

        $tickets = Ticket::with(['departureAirport','arrivalAirport','transporter'])
            ->airportDate($validated['searchQuery']['departureAirport'],$validated['searchQuery']['arrivalAirport'],$validated['searchQuery']['departureDate'])
            ->get();

        if($tickets->count() > 0){
            $ticketsResponse =  TicketResources::collection($tickets);
            $response =(object) array_merge((array) $request->all(), [
                'searchResults' => $ticketsResponse
            ]);

            return response()->json($response,200);
        }else{
            return response()->json(['errors' => (object)[ 'message' => [trans('search_validation.not_found')]]],422);
        }
    }
}
