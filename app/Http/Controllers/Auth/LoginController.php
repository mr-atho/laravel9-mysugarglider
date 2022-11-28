<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function index()
    {
        return view('users/v_user_login');
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

    public function password_reset_form(
        Request $request,
        $token = null
    ) {
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
            'password'              => 'required|string|confirmed|min:8',
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
