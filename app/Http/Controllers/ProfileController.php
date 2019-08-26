<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function edit (User $user)
    {

        return view('pages.person.person', compact('user'),
            ['body_class' => 'person-page']);
    }

    public function update (User $user)
    {

        $data = request()->validate([
            'first_name' => '',
            'last_name'  => '',
            'phone'      => '',
            'email'      => 'email',
            'avatar'     => '',
        ]);
        if (request('avatar')) {
            $imagePath = request('avatar')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(180, 180);
            $image->save();
            $imageArray = ['avatar' => $imagePath];
        }
        auth()->user()->update(array_merge(
            $data,
            $imageArray ?? []
        ));
        return redirect("/");
    }

}
