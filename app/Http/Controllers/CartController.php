<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;
use App\Models\Cart;


class CartController extends Controller
{

    public function index (Request $request)
    {
        $cart = $this->createCartObject($request);
        return view('/pages/cart/cart', compact('cart'));
    }

    public function add (Request $request, Tour $tour)
    {
        $cart = $this->createCartObject($request);
        $cart->add($tour, $tour->id);
        return redirect()->route('cart');
    }

    public function removeItem (Request $request, $id)
    {
        $cart = $this->createCartObject($request);
        $cart->removeItem($id);
        return redirect()->route('cart');
    }

   public function createCartObject( $request){
        $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        return new Cart($oldCart);
   }
}
