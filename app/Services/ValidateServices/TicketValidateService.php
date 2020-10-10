<?php


namespace App\Services\ValidateServices;

use Illuminate\Http\Exceptions\HttpResponseException;

class TicketValidateService
{
    /**
     * Checking ticket availability
     *
     * @param $tickets
     * @throws HttpResponseException
     */
    public function validate($tickets){
        if($tickets->count() == 0){
            throw new HttpResponseException(response()->json(['errors' => (object)[ 'message' => [trans('search_validation.not_found')]]],422));
        }
    }
}
