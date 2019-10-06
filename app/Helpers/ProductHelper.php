<?php


namespace App\Helpers;

use App\Models\Media;
use App\Models\Tour;
use Illuminate\Http\Request;


use App\Http\Requests\ProductRequest;

class ProductHelper
{

    public function priceRanger ($prices)
    {
        $priceRange = collect([
            "до 1 000"            => "<_1000",
            "от 1 000 до 5 000"   => "1001_5000",
            "от 5 001 до 10 000"  => "5001_10000",
            "от 10 001 до 50 000" => "10001_50000",
            "более 50 000"        => ">_50001",
        ]);

        $newPriceRange = $priceRange->filter(function ($value) use ($prices) {
            if ($value == "<_1000") {
                return $prices->contains(function ($price) {
                    return $price < 1000;
                });
            } else if ($value == ">_50001") {
                return $prices->contains(function ($price) {
                    return $price > 50001;
                });
            } else {
                $value = explode('_', $value);
                return $prices->contains(function ($price) use ($value) {
                    return ($price > $value[0] && $price < $value[1]);
                });
            }
        });
        return $newPriceRange;
    }

    public function imageCreator ($image)
    {
        $path = $image->store('images', 'public');
        $media = Media::create(['path' => substr($path, 7),
                                'name' => $image->getClientOriginalName(),
        ]);
        return $media->id;
    }

}
