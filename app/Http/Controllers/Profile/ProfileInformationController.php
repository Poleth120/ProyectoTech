<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProfileInformationController extends Controller
{
    private string $ui_avatar_api = "https://ui-avatars.com/api/?name=*+*&size=128";

    public function edit()
    {
        return view('profile.show', [
            'user' => Auth::user(),
        ]);
    }

    public function update(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'alpha','min:3', 'max:35'],
            'last_name' => ['required', 'string', 'min:3', 'max:35'],
            'personal_phone' => ['required', 'numeric', 'digits:10'],
        ]);


        $user = $request->user();




        /*Update the model using Eloquent*/
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->personal_phone = $request['personal_phone'];
        $user->save();

        $this->updateUIAvatar($user);

        return back()->with('status', 'Profile update successfully');
    }


    private function updateUIAvatar(User $user): void
    {
        $user_image = $user->image;
        $image_path = $user_image->path;
        if (Str::startsWith($image_path, 'https://')) {
            $user_image->path = Str::replaceArray(
                '*',
                [
                    $user->first_name,
                    $user->last_name
                ],
                $this->ui_avatar_api
            );
            $user_image->save();
        }
    }
}