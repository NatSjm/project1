<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tour;
use App\Models\Cart;


class CartController extends Controller
{


    public function index (Request $request)
    {

        if (!$request->session()->has('cart')) {
            return view('/pages/cart/cart', [
//                                             'crumb_level2' => 'Михаил Павлов',
//                                             'crumb_level3' => ['Корзина'],

            ]);
        }
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);

        return view('/pages/cart/cart', [
//                                         'crumb_level2' => 'Михаил Павлов',
//                                         'crumb_level3' => ['Корзина'],
'products'   => $cart->items,
'totalPrice' => $cart->totalPrice,
        ]);
    }

    public function add (Request $request, Tour $tour)
    {
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($tour, $tour->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('cart');
    }

    public function removeItem (Request $request, $id)
    {
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)) {
            $request->session()->put('cart', $cart);
        } else {
            $request->session()->forget('cart');
        }
        return redirect()->route('cart');
    }
}
