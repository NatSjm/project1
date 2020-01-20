<?php

namespace App\Http\Controllers;


use App\Http\Resources\CategoryResource;
use App\Http\Resources\CountryResource;
use App\Http\Resources\HotelResource;
use App\Http\Resources\TourTypeResource;
use App\Http\Resources\NutritionResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\TourType;
use App\Models\Nutrition;
use App\Models\Category;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct ()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index ()
    {
        return view('home');
    }

    public function categories ()
    {


//        $countryNames = Country::pluck('name', 'id')->sort();
//        $hotels = Hotel::pluck('hotel_class', 'id');
//        $tourTypes = TourType::all();
//        $nutritionTypes = Nutrition::pluck('nutrition_type', 'id');
//        $categories = Category::pluck('name', 'id');
        $locations = Location::pluck('name', 'id');


        return response()->json([
            'AllCountryNames'   => CountryResource::collection(Country::all()),
            'AllHotels'         => HotelResource::collection(Hotel::all()),
            'AllTourTypes'      => TourTypeResource::collection(TourType::all()),
            'AllNutritionTypes' => NutritionResource::collection(Nutrition::all()),
            'AllCategories'     => CategoryResource::collection(Category::all()),
            "AllLocations"      => LocationResource::collection(Location::all()),
        ]);

    }
}
