<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\TourResource;


class TourDetailResource extends TourResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray ($request)
    {
        $tour = parent::toArray($request);
        return array_merge($tour, [
            'medias'           => $this->medias,
            'sellerAvatar'     => $this->seller->avatar,
            'sellerName'       => $this->seller->fullName,
            'sellerFirstName'  => $this->seller->first_name,
            'nutrition'        => $this->nutrition->nutrition_type,
            'description'      => $this->description,
            'comments'         => $this->comments,
            'shortCountryName' => $this->country->name,
            'sellerId'         => $this->seller->id,
            'countryId'        => $this->country_id,
            'mainImgId'        => $this->main_img_id,
            'categoryId'       => $this->category_id,
            'tourTypeId'       => $this->tour_type_id,
            'startLocationId'  => $this->start_location_id,
            'hotelId'          => $this->hotel_id,
            'nutritionId'      => $this->nutrition_id,
            'startAt'          => $this->start_at->format('Y-m-d'),
            'finishAt'         => $this->finish_at->format('Y-m-d'),
            'sellerTours'      => TourResource::collection($this->seller->belongingTours->except([$this->id])),
            'similarTours'     => TourResource::collection($this->tourType->tours->except([$this->id])),
        ]);

    }
}
