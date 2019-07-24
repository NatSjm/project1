<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


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
            'body_class'   => 'product-page',
            'crumb_level2' => $seller_full_name,
            'crumb_level3' => [$tour->name, $tour->hotel->hotel_class . "*"]
        ]);
    }


    public function index (Request $request)
    {
        $tours = Tour::with('country', 'category', 'hotel', 'nutrition', 'tourType', 'startLocation.city', 'mainImg');

        if ($request->filled('country')) {
            $tours->whereHas('country', function (Builder $query) use ($request) {
                $query->where('name', $request->country);
            });
        }

        if ($request->filled('hotel')) {
            $tours->whereHas('hotel', function (Builder $query) use ($request) {
                $query->where('hotel_class', $request->hotel);
            });
        }

        if ($request->filled('tour_type')) {
            $tours->whereHas('tourType', function (Builder $query) use ($request) {
                $query->where('name', $request->tour_type);
            });
        }

        if ($request->filled('nutrition')) {
            $tours->whereHas('nutrition', function (Builder $query) use ($request) {
                $query->where('nutrition_type', $request->nutrition);
            });
        }

        if ($request->filled('category')) {
            $tours->whereHas('category', function (Builder $query) use ($request) {
                $query->where('name', $request->category);
            });
        }

        if ($request->filled('price')) {
            $priceToStr = $request->price;
            $priceToArr = explode('_', $priceToStr);
            if (is_numeric($priceToArr[0]) && is_numeric($priceToArr[1])) {
                $tours->whereBetween('price', [$priceToArr[0], $priceToArr[1]]);
            } else {
                $tours->where('price', $priceToArr[0], $priceToArr[1]);
            }
        }

        if ($request->filled('children_accessibility')) {
            $tours->where('for_children', $request->children_accessibility);
        }

        if ($request->filled('recommended')) {
            $tours->where('recommended', '1');
        }

        if ($request->filled('hot')) {
            $tours->where('hot', '1');
        }

        if ($request->filled('sorter')){
            $sorter = $request->sorter;
            $tours->orderBy($sorter, 'desc');
        }

        $selectedTours = $tours->get();

        $countryNames = $selectedTours->pluck('country.name')->unique()->values();
        $tourTypes = $selectedTours->pluck('tourType.name')->unique()->values();
        $nutritionTypes = $selectedTours->pluck('nutrition.nutrition_type')->unique()->values();
        $categories = $selectedTours->pluck('category.name')->unique()->values();
        $hotels = $selectedTours->pluck('hotel.hotel_class')->unique()->values();
        $toursCount = $selectedTours->count();

        $tours = $tours->paginate(12);
//

        return view('/pages/search/search', ['name'           => 'img/mountains.jpg',
                                             'body_class'     => 'search-page',
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
