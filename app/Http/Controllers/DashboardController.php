<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'user' => User::find(Auth::id()),
        ];
        return view('dashboard.v_index', $data);
    }

    public function profile()
    {
        $data = [
            'user' => User::find(Auth::id()),
        ];

        return view('dashboard.v_profile', $data);
    }

    function profile_update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name     = Request()->name;
        $user->email    = Request()->email;
        $user->save();

        return redirect()->route('dashboard.profile')->with('pesan', 'Data berhasil diperbaharui.');
    }

    public function password()
    {
        $data = [
            'user' => User::find(Auth::id()),
        ];

        return view('dashboard.v_password', $data);
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
