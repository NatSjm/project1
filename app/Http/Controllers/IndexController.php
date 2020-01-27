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

    public function __invoke ()
    {
        $sliderTours = Tour::with('tourType', 'country', 'startLocation.city', 'mainImg', 'hotel')
            ->where('advertisement', 1)->orderBy('price',
            'desc')->take(7)->get();
        $recommendedTours = Tour::with('tourType', 'country', 'startLocation.city', 'mainImg', 'hotel')
            ->where('recommended', 1)->orderBy('created_at', 'desc')->get();
        $recommendedToursCount = $recommendedTours->count();
        $recommendedTours = $recommendedTours->take(8);
        $hotTours = Tour::with('tourType', 'country', 'startLocation.city', 'mainImg', 'hotel')->where('hot', 1)
            ->orderBy('start_at')->get();
        $hotToursCount = $hotTours->count();
        $hotTours = $hotTours->take(8);

        $tourTypes = TourType::all();


        return response()->json([
            'sliderTours'           => (TourResource::collection($sliderTours)),
            'hotTours'              => (TourResource::collection($hotTours)),
            'recommendedTours'      => (TourResource::collection($recommendedTours)),
            'recommendedToursCount' => $recommendedToursCount,
            'hotToursCount'         => $hotToursCount,
            'AllTourTypes'          => $tourTypes,
            'title'                 => 'index',
        ]);


    }
}
