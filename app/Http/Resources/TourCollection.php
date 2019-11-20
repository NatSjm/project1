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

        return [
            'tours' => $this->collection,
        ];
    }
}
