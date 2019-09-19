<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize ()
    {
        // return false;
        return true;
    }

    public function attributes ()
    {
        return [
            'country_id'        => 'country',
            'hotel_id'          => 'hotel',
            'category_id'       => 'category',
            'tour_type_id'      => 'type of the tour',
            'nutrition_id'      => 'nutrition',
            'for_children'      => 'children accessibility',
            'start_at'          => 'start date',
            'finish_at'         => 'finish date',
            'start_location_id' => 'start location',
            'main_img_id'       => 'main image',

        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules ()
    {
        return [
            'name'              => 'required|min:3|max:50',
            'country_id'        => 'required|exists:countries,id',
            'hotel_id'          => 'required|exists:hotels,id',
            'category_id'       => 'required|exists:categories,id',
            'tour_type_id'      => 'required|exists:tour_types,id',
            'price'             => 'integer|required|min:1',
            'nutrition_id'      => 'required|exists:nutrition,id',
            'for_children'      => 'boolean',
            'description'       => 'max:500|sometimes',
            'start_at'          => 'required|date|after:tomorrow',
            'finish_at'         => 'required|date|after:start_at',
            'start_location_id' => 'required|exists:locations,id',
            'main_img_id'       => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024',
        ];
    }
}
