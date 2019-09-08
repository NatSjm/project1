<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use app\models\User;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(User $user)
    {
        //return auth()->check();
        return true;

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user = $this->route('user');
        return [
            'first_name' => 'min:2|max:100',
            'last_name'  => 'min:2|max:100',
            'phone'      => 'numeric',
            'email'      => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'avatar'     => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024',

        ];
    }
}
