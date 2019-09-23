<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Country extends Model
{
    protected $guarded = ['id'];

    public function tours()
    {
        return $this->hasMany(Tour::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function getShortNameAttribute() {
        return Str::limit($this->name, 20);
    }
}
