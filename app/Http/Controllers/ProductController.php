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

     // dd($tour->seller->belongingTours->except([$tour->id])->take(3));
       $sellerTours = $tour->seller->belongingTours->except([$tour->id]);
       $similarTours = $tour->tourType->tours->except([$tour->id]);
       $seller_full_name = $tour->seller->first_name." ".$tour->seller->last_name;
      //dd($tour->seller->avatar);


        return view('pages.product.product', [
            'tour' => $tour,
            'sellerTours' =>  $sellerTours,
            'similarTours'=>  $similarTours,
            'name'         => 'img/mountains.jpg',
            'body_class'   => 'product-page',
            'crumb_level2' => $seller_full_name,
            'crumb_level3' => [$tour->name, $tour->hotel->hotel_class."*"]
        ]);
    }
}
