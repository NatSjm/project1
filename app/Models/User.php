<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function belongingTours()
    {
        return $this->hasMany(Tour::class, 'seller_id');
    }

    public function buyerDeals()
    {
        return $this->hasMany(Deal::class, 'buyer_id');
    }

    public function sellerDeals()
    {
        return $this->hasMany(Deal::class, 'seller_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
