<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class ForgotPasswordController extends Controller
{

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showForgetPasswordForm()
    {
        return view('auth.passwords.reset-password');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitForgetPasswordForm(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        Mail::send('auth.passwords.email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });
        return back()->with('status', 'We have e-mailed your password reset link!');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function showResetPasswordForm($token) {
        return view('auth.passwords.reset', ['token' => $token]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);
        $updatePassword = DB::table('password_resets')
            ->where([
                'token' => $request['token']
            ])
            ->first();

        if(!$updatePassword){
            return redirect()->back()->with('error_reset', 'Invalid token!');
        }
        $user = User::where('email', $updatePassword->email)
            ->update(['password' => Hash::make($request['password'])]);
        DB::table('password_resets')->where(['email'=> $request['email']])->delete();
        return redirect(url()->previous())->with('message_reset', 'Your password has been changed!');
    }
}
