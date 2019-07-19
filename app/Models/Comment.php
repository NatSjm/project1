<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Jenssegers\Date\Date;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function tour()
    {
        return $this->belongsTo(Tour::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //accessors

    public function getCreatedAtAttribute($value)
    {
        return Date::parse($value)->format('j F Y ');
    }
}
