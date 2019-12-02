<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray ($request)
    {

        return [
            'id'                => $this->id,
            'name'              => $this->name,
            'for_children'      => $this->for_children,
            'length'            => $this->length,
            'category'          => $this->category->name,
            'mainImg'           => $this->mainImg->path,
            'tourTypeIcon'      => $this->tourType->icon,
            'tourTypeName'      => $this->tourType->name,
            'hotelClass'        => $this->hotel->hotel_class,
            'shortCountryName'  => $this->country->shortName,
            'startLocation'     => $this->startLocation,
            'startLocationCity' => $this->startlocation->city->name,
            'price'            => $this->price,
        ];
    }
}
