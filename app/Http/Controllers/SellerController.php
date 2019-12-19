<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Tour;
use App\Http\Resources\TourCollection;

//use App\Models\TourType;


class SellerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke (Request $request, $id, ProductFilter $filters)
    {


        $sellerTours = Tour::with('tourType', 'country', 'startLocation.city', 'mainImg')->where('seller_id',
            $id)->filter($filters);

        $sellerTours = $sellerTours->paginate(12);

        return new TourCollection($sellerTours);
//

//        return view('pages.seller.seller', [
//            'sellerTours' => $sellerTours,
//            'seller'      => $user,
//            'title'       => (auth()->id() == $user->id) ? 'Мои предложения' : 'предложения продавца',
//            //            'crumb_level3' => ['Предложения продавца'],
//            'filterType'  => 'tour_type',
//        ]);
    }

}
