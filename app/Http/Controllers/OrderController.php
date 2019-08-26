<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function handleOrder (Request $request)
    {
        $oldCart = $request->session()->get('cart');
        $cart = new Cart($oldCart);
        $products = collect($cart->items);

        $dealItems = $products->map(function ($item) {
            return $item['item'];
        });

        $groupedBySeller = $dealItems->groupBy('seller_id');
        $this->createDeals($groupedBySeller);

        $request->session()->forget('cart');
        return redirect('/purchases');
    }

    public function createDeals($groupedBySeller){

        $groupedBySeller->each(function ($item, $key) {
            $deal = new Deal;
            $deal->buyer_id = Auth::id();
            $deal->seller_id = $key;
            $deal->total_price = $item->sum('price');
            $deal->save();

            $item->each(function ($innerItem) use ($deal){
                $order = new Order;
                $order->tour_id = $innerItem->id;
                $order->deal_id = $deal->id;
                $order->price = $innerItem->price;
                $order->save();
            });
        });

    }
}
