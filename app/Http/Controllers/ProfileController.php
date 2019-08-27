<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    public function edit (User $user)
    {

        return view('pages.person.person', compact('user'),
            ['body_class' => 'person-page']);
    }

    public function update (User $user, Request $request)
    {


        $data = request()->validate([
            'first_name' => '',
            'last_name'  => '',
            'phone'      => '',
            'email'      => 'email',
            'avatar'     => '',
        ]);
        if (request('avatar')) {
            $path = $request->file('avatar')->store('profile', 'public');
            $data = (array_merge(
                $data,
                ['avatar' => $path]
            ));

        }
        auth()->user()->update($data);

        return redirect("/");
    }

}
