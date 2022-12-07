<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ProfileModel;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
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
        $user->name     = Request()->name;
        $user->email    = Request()->email;
        $user->save();

        return redirect()->route('profile')->with('pesan', 'Data berhasil diperbaharui.');
    }

    public function password_change(Request $request)
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
}
