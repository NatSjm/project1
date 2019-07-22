<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function show($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user', 'medias')->findOrFail($id);


        $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
        $similarTours = $tour->tourType->tours->except([$tour->id]);
        $seller_full_name = $tour->seller->fullName;



        return view('pages.product.product', [
            'tour' => $tour,
            'sellerTours' => $sellerTours,
            'similarTours' => $similarTours,
            'name' => 'img/mountains.jpg',
            'body_class' => 'product-page',
            'crumb_level2' => $seller_full_name,
            'crumb_level3' => [$tour->name, $tour->hotel->hotel_class . "*"]
        ]);
    }

    public function index(Request $request)
    {

        $tours = Tour::paginate(12);
        //dd($tours);
        return view('/pages/search/search', ['name' => 'img/mountains.jpg',
            'body_class' => 'search-page',
            'crumb_level2' => 'Поиск',
            'categories' => ['ind' => 'Индустриальный', 'luxury' => 'Luxury', 'all-inclus' => 'Все включено',
                'fam' => 'Семейный отдых', 'gastro' => 'Гастрономический', 'keep-calm' => 'Спокойный отдых',
                'intertainment' => 'Программа развлечений', 'shop' => 'Шоппинг', 'extreem' => 'Экстрим',
                'beach' => 'Пляжный', 'sp' => 'SPA'],
            'tours' => $tours,
        ]);
    }
}
