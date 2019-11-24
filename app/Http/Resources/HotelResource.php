<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HotelResource extends JsonResource
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
            'id'         => $this->id,
            'hotelClass' => $this->hotel_class,
        ];
    }
}
