<?php


namespace App\Services;


use App\Http\Resources\TicketResources;
use App\Services\ValidateServices\TicketValidateService;

class SearchService
{
    protected $ticketValidateService;

    public function __construct(TicketValidateService $ticketValidateService)
    {
        $this->ticketValidateService = $ticketValidateService;
    }

    /**
     * Get tickets json data
     *
     * @param $tickets
     * @param $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    public function getResponse($tickets, $request){
        $this->ticketValidateService->validate($tickets);

        $ticketsResponse =  TicketResources::collection($tickets);

        $response =(object) array_merge(
            (array) $request->all(),
            ['searchResults' => $ticketsResponse]
        );

        return response()->json($response,200);
    }
}
