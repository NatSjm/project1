<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deal;

class PurchaseController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $deals = Deal::with('orders.tour', 'seller')->where('buyer_id',
            Auth::id())->latest()->get();
       // dd($deals);

        return view('pages.orders.orders', [
                                               'crumb_level2' => 'Михаил Павлов',
                                                'crumb_level3' => ['Мои покупки'],
                                                'deals' => $deals
    ]);
    }
}
