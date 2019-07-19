<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
class IndexController extends Controller
{

    public function __invoke()
    {
        $sliderTours = Tour::where('advertisement', 1)->orderBy('price', 'desc')->take(3)->get();
        $recommendedTours = Tour::where('recommended', 1)->orderBy('created_at', 'desc')->get();
        $hotTours = Tour::where('hot', 1)->orderBy('start_at')->get();
        //dd($hotTours);

        return view('/pages/index/index', [
            'sliderTours' => $sliderTours,
            'hotTours' => $hotTours,
            'recommendedTours' => $recommendedTours,
            'name1' => 'img/mountains.jpg',
            'name2' => 'img/palm.jpg',
            'name3' => 'img/train.jpg',
            'name' => 'null',
            'tour' => 'null',
            'title' => 'index',
            'body_class' => 'index'
        ]);
    }
}
