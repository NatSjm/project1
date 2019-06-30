<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = ['id'];

    public function mainImgTours()
    {
        return $this->hasMany(Tour::class, 'main_img_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_media');
    }

}
