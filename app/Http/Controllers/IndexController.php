<?php

namespace App\Http\Controllers;

use App\Http\Resources\TourCollection;
use App\Http\Resources\TourResource;
use App\Http\Resources\ProductCardTourResource;
use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\TourType;

class IndexController extends Controller
{

    public function __invoke()
    {
        $sliderTours = Tour::with('mainImg')->where('advertisement', 1)->orderBy('price',
            'desc')->take(7)->get();


        $tours = Tour::with('tourType', 'country', 'startLocation.city', 'mainImg', 'hotel');

        $recommendedTours = $tours->where('recommended', 1)->orderBy('created_at', 'desc')->get();
        $hotTours = $tours->where('hot', 1)->orderBy('start_at')->get();
        $tourTypes = TourType::all();


        return response()->json([
            'sliderTours'      => ( TourResource::collection($sliderTours)),
            'hotTours'         => ( TourResource::collection($hotTours)),
            'recommendedTours' => ( TourResource::collection($recommendedTours)),
            'AllTourTypes'     => $tourTypes,
            'title'            => 'index',
        ]);


    }
}
