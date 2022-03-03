<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;
use App\Models\User;

class ForgotPasswordController extends Controller
{

    public function verification_email()
    {
        return view('home.auth.verification_email');

    }//end of verification email

    public function verification_email_store(Request $request)
    {   
        $request->validate([
            'email' => ['required','email','exists:users'],
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $token,
            'created_at' => now(),
        ]);

        Mail::to($request->email)->send(new ResetPassword($token));
 
        if (Mail::failures()) {

            return response()->Fail('Sorry! Please try again latter');

            notify()->success(__('dashboard.send_email_successfully_sory'));
            return redirect()->back();

        } else {

            notify()->success(__('dashboard.send_email_successfully'));
            return redirect()->back();

        }//end of if

    }//end of fun

    public function reset_password($token)
    {
        $email = DB::table('password_resets')->where('token', $token)->first();

        if ($email) {
            
            return view('home.auth.reset_password', compact('email'));
        }

        return redirect(route('welcome.index'));

    }//end of fun reset_password

    public function submitResetPasswordForm(Request $request)
    {
        $request->validate([
            'email'                 => ['required','email','exists:users'],
            'password'              => ['required','string','min:8','confirmed'],
            'password_confirmation' => ['required','string','min:8'],
        ]);

        $updatePassword = DB::table('password_resets')->where('email' ,$request->email)->first();

        if (!$updatePassword) {

            return back()->with('error', 'Invalid token!');

        } //end of if

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email' => $request->email])->delete();

        notify()->success(__('dashboard.added_successfully'));
        return redirect(route('home.login'));

    } //end of function

} //end of controller