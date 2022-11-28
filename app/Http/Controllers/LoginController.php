<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

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

        return redirect()->route('login')->with('pesan_password', 'Password berhasil diubah. Silakan masuk kembali.');
    }

    public function password_forget()
    {
        return view('users/v_user_password_forget');
    }

    public function password_link(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['pesan' => __('Link perbaharui kata sandi telah dikirim ke email Anda.')])
            : back()->withErrors(['email' => __($status)]);
    }

    public function password_reset_form(Request $request, $token = null)
    {
        $data = [
            'token' => $token,
            'email' => $request->email,
        ];
        return view('users/v_user_password_reset', $data);
    }

    public function password_reset(Request $request)
    {
        $request->validate([
            'token'                 => 'required',
            'email'                 => 'required|email',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required|same:password',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('pesan', __('Kata sandi Anda telah berhasil diperbaharui. Silakan masuk.'))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function profile()
    {
        $data = [
            'user' => User::find(Auth::id()),
        ];
        return view('users/v_user_profile', $data);
    }

    function profile_update(Request $request)
    {
        $user = User::find(Auth::id());
        $user->name     = Request()->nama;
        $user->email    = Request()->email;
        $user->save();

        return redirect()->route('profile')->with('pesan_profile', 'Data berhasil diperbaharui.');
    }
}
