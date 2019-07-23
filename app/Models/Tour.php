<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $attributes = [
        'for_children' => true,
    ];
    protected $guarded = ['id'];

    protected $dates = [
        'start_at',
        'finish_at'
    ];

    //belongsTo relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function mainImg()
    {
        return $this->belongsTo(Media::class, 'main_img_id');
    }

    public function tourType()
    {
        return $this->belongsTo(TourType::class, 'tour_type_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function startLocation()
    {
        return $this->belongsTo(Location::class, 'start_location_id');
    }

    public function nutrition()
    {
        return $this->belongsTo(Nutrition::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // hasMany relations
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //belongsToMany relations
    public function medias()
    {
        return $this->belongsToMany(Media::class, 'tour_media');
    }

    //accessors

    public function getForChildrenAttribute($value)
    {
        return $value? "Да" : "Нет";
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLengthAttribute()
    {
        $start = $this->start_at;
        $finish = $this->finish_at;
        return $finish->diffInDays($start);
    }

    public function getFormattedPriceAttribute()
    {
        return number_format($this->price, 0, '.', ' ');
    }



}
