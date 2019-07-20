<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tour;

class SellerController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
        //$seller = $user->load('belongingTours');


        //dd($user);
        $sellerTours = Tour::where('seller_id', $user->id)->paginate(12);
        //dd($sellerTours);

        return view('pages.seller.seller', [
            'sellerTours' => $sellerTours,
            'name' => 'img/mountains.jpg',
            'body_class' => 'seller-page',
            'crumb_level2' => $user->fullName,
            'crumb_level3' => ['Предложения продавца'],
            'categories' => ['ind' => 'Индустриальный', 'luxury' => 'Luxury', 'all-inclus' => 'Все включено',
                'fam' => 'Семейный отдых', 'gastro' => 'Гастрономический', 'keep calm' => 'Спокойный отдых',
                'intertainment' => 'Программа развлечений', 'shop' => 'Шоппинг', 'extreem' => 'Экстрим',
                'beach' => 'Пляжный', 'sp' => 'SPA']
        ]);
    }

}
