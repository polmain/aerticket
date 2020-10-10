<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SearchRequest extends FormRequest
{
    public $validator = null;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'searchQuery.departureAirport'  => 'required|max:3|exists:airports,name',
            'searchQuery.arrivalAirport'    => 'required|max:3|exists:airports,name',
            'searchQuery.departureDate'     => 'required|date',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'searchQuery.departureAirport.required' => trans('search_validation.departure_airport'),
            'searchQuery.departureAirport.max' => trans('search_validation.departure_airport'),
            'searchQuery.departureAirport.exists' => trans('search_validation.departure_airport'),
            'searchQuery.arrivalAirport.required' => trans('search_validation.arrival_airport'),
            'searchQuery.arrivalAirport.max' => trans('search_validation.arrival_airport'),
            'searchQuery.arrivalAirport.exists' => trans('search_validation.arrival_airport'),
            'searchQuery.departureDate.required'  => trans('search_validation.departure_date'),
            'searchQuery.departureDate.date'  => trans('search_validation.departure_date'),
        ];
    }
}
