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
    public function authorize()
    {
       // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => '',
          'country_id' => '',
          'hotel_id' => '',
          'category_id' => '',
          'tour_type_id' => '',
          'price' => '',
          'nutrition_id' => '',
          'for_children' => '',
          'description' => '',
          'start_at' => '',
          'finish_at' => '',
          'start_location_id' => '',
          'main_img_id' => '',
        ];
    }
}
