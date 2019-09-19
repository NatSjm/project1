<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tour;
use Illuminate\Http\Request;


use App\Http\Requests\ProductRequest;
use App\Filters\ProductFilter;


class ProductController extends Controller
{
    public function show($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user', 'medias')->findOrFail($id);


        $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
        $similarTours = $tour->tourType->tours->except([$tour->id]);


        return view('pages.product.product', [
            'tour' => $tour,
            'sellerTours' => $sellerTours,
            'similarTours' => $similarTours,
        ]);
    }


    public function index(Request $request, ProductFilter $filters)
    {
        $tours = Tour::with('country', 'category', 'hotel', 'nutrition', 'tourType', 'startLocation.city', 'mainImg')
            ->filter($filters);


        $selectedTours = $tours->get();

        $plucker = function ($selector) use ($selectedTours) {
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
            'tours' => $tours,
            'countryNames' => $countryNames,
            'tourTypes' => $tourTypes,
            'nutritionTypes' => $nutritionTypes,
            'categories' => $categories,
            'hotels' => $hotels,
            'toursCount' => $toursCount,
        ]);
    }

    public function create(Request $request)
    {
        return view('pages.product.product-create.product-create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
//        $data = (array_merge(
//            $data,
//            [
//             'seller_id' => auth()->id()]
//        ));
//
//        $path = $request->file('main_img_id')->store('images', 'public');
//
//        $tour = new Tour($data);
//        $tour->mainImg = new Media();
//        $tour->mainImg->path = $path ;
//        $tour->push();


        $data = (array_merge(
            $data,
            ['main_img_id' => 12,
             'seller_id' => auth()->id()]
        ));

        $tour = Tour::create($data);
//        dd($tour);


        return redirect()->route('product-page', $tour);


           }
}