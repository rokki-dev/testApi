<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Resources\BrewerResource;
use App\Http\Resources\BrewerShowResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Http;

class BrewerController extends BaseApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        try {
            $response = Http::get('https://api.openbrewerydb.org/breweries')->json();
            return BrewerResource::collection($response);
        } catch (\Exception $exception) {
           abort(500, 'Error endpoint');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return BrewerShowResource
     */
    public function show($id)
    {
        try {
            $response = Http::get('https://api.openbrewerydb.org/breweries/' . (int)$id)->json();
            return new BrewerShowResource($response);
        } catch (\Exception $exception) {
            abort(500, 'Error endpoint');
        }
    }
}
