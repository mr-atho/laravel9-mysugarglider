<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    function show()
    {
        $data = [
            'user' => User::where('id', Auth::id())->first(),
            'profile' => ProfileModel::where('user_id', Auth::id())->first(),
        ];

        return view('profiles.v_profile', $data);
    }

    function update_profile(Request $request)
    {
        $profile = ProfileModel::where('user_id', Auth::id())->first();

        if (is_null($profile)) {
            ProfileModel::create([
                'alamat'            => $request->alamat,
                'telp'              => $request->telp,
                'user_id'           => Auth::id(),
            ]);

            return redirect()->route('profile')->with('pesan', 'Data berhasil ditambahkan.');
        } else {
            $profile->alamat    = Request()->alamat;
            $profile->telp      = Request()->telp;
            $profile->user_id   = Auth::id();
            $profile->save();

            return redirect()->route('profile')->with('pesan', 'Data berhasil diperbaharui.');
        }
    }

    function update_user(Request $request)
    {
        $user = User::find(Auth::id());

        $oldEmail = $user->email;

        $user->name     = Request()->name;
        $user->email    = Request()->email;

        if ($oldEmail != $user->email) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }

        $user->save();

        return redirect()->route('profile')->with('pesan', 'Data berhasil diperbaharui.');
    }

    function password_change(Request $request)
    {
        $request->validate([
            'password_new'              =>  'required',
            'password_new_confirmation' =>  'required|same:password_new',
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make(Request()->password_new);
        $user->save();
        Auth::logout();

        return redirect()->route('login')->with('pesan', 'Password berhasil diubah. Silakan masuk kembali.');
    }

    function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')) {

            // Only allow .jpg, .bmp and .png file types.
            $request->validate([
                'avatar' => 'mimes:jpg,jpeg,bmp,png'
            ]);

            $image = $request->file('avatar');
            $imagename = 'avatar-' . Auth::id() . '.' . $image->extension();

            Image::make($image)->fit(
                150,
                150,
                function ($constraint) {
                    //$constraint->aspectRatio();
                    $constraint->upsize();
                }
            )->save(public_path('upload/avatars/' . $imagename));

            $user = User::find(Auth::id());
            $user->avatar = $imagename;
            $user->save();
        }

        return redirect()->route('profile')->with('pesan', 'Avatar berhasil diperbaharui.');
    }
}
