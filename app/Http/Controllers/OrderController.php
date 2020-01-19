<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Tour;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class OrderController extends Controller
{
//    public function handleOrder (Request $request)
//    {
//        $oldCart = $request->session()->get('cart');
//        $cart = new Cart($oldCart);
//        $products = collect($cart->items);
//        $dealItems = collect();
//
//        $products->map(function ($item) use ($dealItems) {
//            for ($i = 0; $i < $item['qty']; $i++) {
//                $dealItems->push($item['item']);
//            }
//        });
//
//        $groupedBySeller = $dealItems->groupBy(['seller_id']);
//
//        $this->createDeals($groupedBySeller);
//
//        $request->session()->forget('cart');
//        return redirect('/purchases');
//    }

    public function handleOrder (Request $request)
    {
        $products = collect($request->all());
        $dealItems = collect();
        $products->map(function ($item) use ($dealItems) {
            for ($i = 0; $i < $item['quantity']; $i++) {
                $dealItems->push(Tour::find($item['id']));
            }
        });

        $groupedBySeller = $dealItems->groupBy(['seller_id']);
        $this->createDeals($groupedBySeller);


    }

    public function createDeals ($groupedBySeller)
    {

        $groupedBySeller->each(function ($item, $seller) {
            $deal = new Deal;
            $deal->buyer_id = Auth::id();
            $deal->seller_id = $seller;
            $deal->total_price = $item->sum('price');
            $deal->save();

            $item->each(function ($innerItem) use ($deal) {
                $deal->makeOrder($innerItem);
            });
        });

    }

//    public function index ()
//    {
//
//        $deals = Deal::with('orders.tour', 'buyer')->where('seller_id',
//            Auth::id())->latest()->get();
//
//
//        return view('pages.orders.orders', [
//            'deals' => $deals,
//            'title' => 'Мои заказы',
//        ]);
//
//    }

    public function index ($id)
    {

        $deals = Deal::with('orders.tour', 'buyer', 'orders.tour.country', 'orders.tour.mainImg',
            'orders.tour.hotel', 'orders.tour.tourType')->where
        ('seller_id',
            $id)->latest()->get();


        return response()->json([
            // 'id'    => $id,
            'deals' => $deals,
            //'title' => 'Мои заказы',
        ]);

    }
}
