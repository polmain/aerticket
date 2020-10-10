<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\SearchRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function searchTicket(SearchRequest $request){


        return response()->json(['message' => 'ok'],200);
    }
}
