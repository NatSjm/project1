<?php


namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class ProductFilter
{


    protected $builder;
    protected $request;

    public function __construct (Request $request)
    {
        $this->request = $request;
    }

    public function apply ($builder)
    {
        $this->builder = $builder;
        foreach ($this->filters() as $filter => $value) {
            if (!$value) continue;
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }

    public function filters ()
    {
        return $this->request->all();
    }

    public function country ($value)
    {

        $this->builder->whereHas('country', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }

    public function hotel ($value)
    {
        $this->builder->whereHas('hotel', function (Builder $query) use ($value) {
            $query->where('hotel_class', $value);
        });
    }

    public function tour_type ($value)
    {
        $this->builder->whereHas('tourType', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }

    public function nutrition ($value)
    {
        $this->builder->whereHas('nutrition', function (Builder $query) use ($value) {
            $query->where('nutrition_type', $value);
        });
    }

    public function category ($value)
    {
        $this->builder->whereHas('category', function (Builder $query) use ($value) {
            $query->where('name', $value);
        });
    }

    public function search ($value){
        $this->builder->whereHas('country', function (Builder $query) use ($value) {
            $query->where('name', 'like', "%$value%");
        })->orwhere('name','like', "%$value%");

     }


    public function price ($value)
    {
        $priceToStr = $value;
        $priceToArr = explode('_', $priceToStr);
        if (is_numeric($priceToArr[0]) && is_numeric($priceToArr[1])) {
            $this->builder->whereBetween('price', [$priceToArr[0], $priceToArr[1]]);
        } else {
            $this->builder->where('price', $priceToArr[0], $priceToArr[1]);
        }
    }

    public function children_accessibility ($value)
    {
        $this->builder->where('for_children', $value);
    }

public function recommended($value)
{
$this->builder->where('recommended', $value);
}

public function hot($value) {
    $this->builder->where('hot', $value);
}

public function sorter ($value){

    $this->builder->orderBy($value, 'desc');
}



}
