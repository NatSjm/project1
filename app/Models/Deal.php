<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Deal extends Model
{
    protected $guarded = ['id'];


    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function makeOrder($innerItem){
        return $this->orders()->create([
               'tour_id' => $innerItem->id,
               'price' => $innerItem->price,
        ]);
    }
}
