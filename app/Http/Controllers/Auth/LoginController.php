<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login(LoginRequest $request)
    {
        $data = [
            'username' => $request->username,
            'password' => $request->password_login,
        ];

        if (Auth::attempt($data, isset($request->rememberme))) {
            return redirect(url()->previous());
        } else {
            return redirect()->back()->with('error', 'username password is incorrect');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        return redirect()->route('index');
    }
}
