<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tour;
use Illuminate\Http\Request;


use App\Http\Requests\ProductRequest;
use App\Filters\ProductFilter;
use App\Helpers\ProductHelper;


class ProductController extends Controller
{



    public function show ($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user', 'medias')->findOrFail($id);


        $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
        $similarTours = $tour->tourType->tours->except([$tour->id]);


        return view('pages.product.product', [
            'tour'         => $tour,
            'sellerTours'  => $sellerTours,
            'similarTours' => $similarTours,
        ]);
    }


    public function index (Request $request, ProductFilter $filters, ProductHelper $helper)
    {
        $tours = Tour::with('country', 'category', 'hotel', 'nutrition', 'tourType', 'startLocation.city', 'mainImg')
            ->filter($filters);


        $selectedTours = $tours->get();

        $plucker = function ($selector) use ($selectedTours) {
            return $selectedTours->pluck($selector)->unique()->values();
        };

        $countryNames = $plucker('country.name')->sort();
        $tourTypes = $plucker('tourType.name');
        $nutritionTypes = $plucker('nutrition.nutrition_type');
        $categories = $plucker('category.name');
        $hotels = $plucker('hotel.hotel_class');
        $prices = $plucker('price');

        $prices = $helper->priceRanger($prices);

        $tours = $tours->paginate(12);
        $toursCount = $tours->total();

        return view('/pages/search/search', compact(
            'tours', 'countryNames', 'tourTypes', 'nutritionTypes', 'categories', 'hotels', 'toursCount', 'prices'));

    }

    public function create (Request $request)
    {
        return view('pages.product.product-create.product-create');
    }

    public function store (ProductRequest $request, ProductHelper $helper)
    {
        $data = $request->validated();

        if (array_key_exists('main_img_id', $data)) {
            $image = $request->file('main_img_id');
            $mediaId = $helper->imageCreator($image);

            $data = (array_merge(
                $data,
                ['main_img_id' => $mediaId]
            ));
        }
        $data['seller_id'] = auth()->id();
        $tour = Tour::create($data);
        if($request->has('media_id')){
            foreach($request->file('media_id') as $image){
                $mediaId = $helper->imageCreator($image);
                $tour->medias()->attach($mediaId);
            }
        }


        return redirect()->route('product-page', $tour);

    }

    public function edit($id)
    {
        //
    }

}
