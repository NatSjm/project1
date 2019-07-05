<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
//        Tour::where('id', $id)->first();
        $tour = Tour::with('comments', 'comments.user')->findOrFail($id);

//        dd($tour->comments);

        return view('pages.product.product', [
            'tour' => $tour,

            'name'         => 'img/mountains.jpg',
            'body_class'   => 'product-page',
            'crumb_level2' => 'Михаил Павлов',
            'crumb_level3' => ['Отель Мираколь', 'Неаполь', '4*']
        ]);
    }
}
