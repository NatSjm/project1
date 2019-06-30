<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TourType extends Model
{
    protected $guarded = ['id'];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'tour_type_id');
    }
}
