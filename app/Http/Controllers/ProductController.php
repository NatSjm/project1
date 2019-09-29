<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Tour;
use Illuminate\Http\Request;


use App\Http\Requests\ProductRequest;
use App\Filters\ProductFilter;


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


    public function index (Request $request, ProductFilter $filters)
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



        $newPriceRange = $this->priceRanger($prices);
       // dd($newPriceRange);



        $tours = $tours->paginate(12);
        $toursCount = $tours->total();


        return view('/pages/search/search', [
            'tours'          => $tours,
            'countryNames'   => $countryNames,
            'tourTypes'      => $tourTypes,
            'nutritionTypes' => $nutritionTypes,
            'categories'     => $categories,
            'hotels'         => $hotels,
            'toursCount'     => $toursCount,
            'prices'         => $newPriceRange,
        ]);
    }

    public function create (Request $request)
    {
        return view('pages.product.product-create.product-create');
    }

    public function store (ProductRequest $request)
    {
        $data = $request->validated();

        if (array_key_exists('main_img_id', $data)) {
            $image = $request->file('main_img_id');
            $path = $image->store('images', 'public');
            $media = Media::create(['path' => substr($path, 7),
                                    'name' => $data['name'],
            ]);


            $data = (array_merge(
                $data,
                ['main_img_id' => $media->id]
            ));
        }
        $data['seller_id'] = auth()->id();
        $tour = Tour::create($data);


        return redirect()->route('product-page', $tour);

    }

    public function priceRanger ($prices)
    {
        $priceRange = collect([
            "до 1 000"            => "<_1000",
            "от 1 000 до 5 000"   => "1001_5000",
            "от 5 001 до 10 000"  => "5001_10000",
            "от 10 001 до 50 000" => "10001_50000",
            "более 50 000"        => ">_50001",
        ]);

        $newPriceRange = $priceRange->filter(function ($value) use ($prices) {
            if ($value == "<_1000") {
                return $prices->contains(function ($price) {
                    return $price < 1000;
                });
            } else if ($value == ">_50001") {
                return $prices->contains(function ($price) {
                    return $price > 50001;
                });
            } else {
                $value = explode('_', $value);
                return $prices->contains(function ($price) use ($value) {
                    return ($price > $value[0] && $price < $value[1]);
                });
            }
        });
        return $newPriceRange;
    }
}
