<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


class BrewerShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'url' => route('breweries.show', $this['id']),
            'brewery_type' => $this['brewery_type'],
            'longitude' => $this['longitude'],
            'latitude' => $this['latitude'],
            'updated_at' => $this['updated_at'],
            'created_at' => $this['created_at'],
            'address' => [
                'street' => $this['street'],
                'address_2' => $this['address_2'],
                'address_3' => $this['address_3'],
                'city' => $this['city'],
                'state' => $this['state'],
                'county_province' => $this['county_province'],
                'postal_code' => $this['postal_code'],
                'country' => $this['country'],
                'phone' => $this['phone'],
            ]

        ];
    }
}
