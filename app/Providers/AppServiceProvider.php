<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Country;
use App\Models\Hotel;
use App\Models\TourType;
use App\Models\Nutrition;
use App\Models\Category;
use App\Models\Deal;



use Illuminate\Support\Facades\View;

use Jenssegers\Date\Date;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('slider', false);
        //
        Date::setlocale(config('app.locale'));

        $countryNames = Country::pluck('name', 'id')->sort();
        $hotels = Hotel::pluck('hotel_class', 'id');
        $tourTypes = TourType::all();
        $nutritionTypes = Nutrition::pluck('nutrition_type', 'id');
        $categories = Category::pluck('name', 'id');

        View::share([
                     'AllCountryNames' => $countryNames,
                     'AllHotels'       => $hotels,
                     'AllTourTypes'    => $tourTypes,
                     'AllNutritionTypes'=> $nutritionTypes,
                     'AllCategories' => $categories,
                     'AllTourTypesNames' =>$tourTypes->pluck('name', 'id'),
            ]);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
