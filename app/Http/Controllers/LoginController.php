<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function index()
    {
        return view('users/v_user_login');
    }

    public function register()
    {
        return view('users/v_user_register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'                  =>  'required',
            'email'                 =>  'required|unique:users,email',
            'password'              =>  'required',
            'password_konfirmasi'   =>  'required|same:password',
        ]);

        User::create([
            'name'              => $request->nama,
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('pesan', 'Pengguna berhasil didaftarkan. Silakan masuk.');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Data yang Anda masukkan tidak sesuai',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function password()
    {
        return view('users/v_user_password_change');
    }

    public function password_change(Request $request)
    {
        $request->validate([
            'password_new'              =>  'required',
            'password_new_confirmation' =>  'required|same:password_new',
        ]);

        $user = User::find(Auth::id());;
        $user->password = Hash::make(Request()->password_new);
        $user->save();

        return redirect()->route('password')->with('pesan', 'Password berhasil diubah.');
    }
}
