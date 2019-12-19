<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TourCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     *
     *
     */
    public $collects = 'App\Http\Resources\TourResource';

    public function toArray ($request)
    {

//        return [
//            'data' => parent::toArray($request),
//        ];
        return ['tours'  => $this->collection,
                'prices' => [
                    "до 1 000"            => "<_1000",
                    "от 1 000 до 5 000"   => "1001_5000",
                    "от 5 001 до 10 000"  => "5001_10000",
                    "от 10 001 до 50 000" => "10001_50000",
                    "более 50 000"        => ">_50001",
                ],
        ];


    }
}
