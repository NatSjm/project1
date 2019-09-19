<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class ProfileController extends Controller
{
    public function edit (User $user)
    {
        if (auth()->user()->isNot($user)) {
            abort(403);
        }

        return view('pages.person.person', compact('user'));
    }

    public function update (User $user, ProfileRequest $request)
    {
        $data = $request->validated();
//
        if (request('avatar')) {
            $path = $request->file('avatar')->store('profile', 'public');

            if ($user->avatar) {
                Storage::delete('/public/' . $user->avatar);
            }

            $data = (array_merge(
                $data,
                ['avatar' => $path]
            ));

        }

        $user->update($data);

        return redirect("/");
    }

}
