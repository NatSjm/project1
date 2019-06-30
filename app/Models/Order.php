<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id'];


    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function deal()
    {
        return $this->belongsTo(Deal::class);
    }
}
