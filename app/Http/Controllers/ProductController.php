<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Filters\ProductFilter;


class ProductController extends Controller
{
    public function show ($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user', 'medias')->findOrFail($id);


        $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
        $similarTours = $tour->tourType->tours->except([$tour->id]);
        $seller_full_name = $tour->seller->fullName;


        return view('pages.product.product', [
            'tour'         => $tour,
            'sellerTours'  => $sellerTours,
            'similarTours' => $similarTours,
            'crumb_level2' => $seller_full_name,
            'crumb_level3' => [$tour->name, $tour->hotel->hotel_class . "*"]
        ]);
    }


    public function index (Request $request, ProductFilter $filters)
    {
        $tours = Tour::with('country', 'category', 'hotel', 'nutrition', 'tourType', 'startLocation.city', 'mainImg')
            ->filter($filters);



        $selectedTours = $tours->get();

        $plucker = function  ($selector) use ($selectedTours){
             return $selectedTours->pluck($selector)->unique()->values();
        };

        $countryNames = $plucker('country.name');
        $tourTypes = $plucker('tourType.name');
        $nutritionTypes = $plucker('nutrition.nutrition_type');
        $categories = $plucker('category.name');
        $hotels = $plucker('hotel.hotel_class');

//

        $tours = $tours->paginate(12);
        $toursCount = $tours->total();
//

        return view('/pages/search/search', [
                                             'crumb_level2'   => 'Поиск',
                                             'tours'          => $tours,
                                             'countryNames'   => $countryNames,
                                             'tourTypes'      => $tourTypes,
                                             'nutritionTypes' => $nutritionTypes,
                                             'categories'     => $categories,
                                             'hotels'         => $hotels,
                                             'toursCount'     => $toursCount
                                             //                                             'categories'   => ['ind'           => 'Индустриальный', 'luxury' => 'Luxury', 'all-inclus' => 'Все включено',
                                             //                                                                'fam'           => 'Семейный отдых', 'gastro' => 'Гастрономический', 'keep-calm' => 'Спокойный отдых',
                                             //                                                                'intertainment' => 'Программа развлечений', 'shop' => 'Шоппинг', 'extreem' => 'Экстрим',
                                             //                                                                'beach'         => 'Пляжный', 'sp' => 'SPA'],
        ]);
    }
}
