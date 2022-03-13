<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Stevebauman\Location\Facades\Location;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\ResetPassword;
use Auth;
use Mail;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->guard('web')->check()) {

            return redirect()->route('welcome.index');
        }

        return view('home.auth.login');

    } //end of index login function

    public function register()
    {
        if (auth()->guard('web')->check()) {

            return redirect()->route('welcome.index');
        }

        return view('home.auth.register');

    } //end of index register function

    public function store_login(Request $request)
    {
        $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        try {

            if (auth()->guard('web')->check()) {

                return redirect()->route('welcome.index');

            } else {

                if (User::where('email', $request->email)->first()) {
                    $remember_me = $request->has('remember') ? true : false;
                    if (auth()->guard('web')->attempt([
                        'email'    => $request->email,
                        'password' => $request->password], $remember_me)) {

                        Notification::create([
                            'title_ar' => 'لقد قمت بتسجيل الدخول',
                            'title_en' => 'I have clicked login',
                            'user_id'  => auth()->id(),
                        ]); //end of create

                        notify()->success(__('dashboard.login_successfully'));
                        return redirect()->route('profile.index');

                    } else {

                        return back()->withErrors([
                            'password' => __('auth.The_password_is_incorrect'),
                        ]);

                    } //end of attempt

                } else {

                    return back()->withErrors([
                        'email' => __('auth.The_email_is_incorrect'),
                    ]);

                } //end of email

            } //end of if auth

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end of try catch

    } //end of login store function

    public function store_register(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'max:25'],
            'phone'    => ['required', 'max:15', 'min:9'],
            'email'    => ['required', 'email', 'unique:users', 'max:25'],
            'password' => ['required', 'confirmed', 'max:20'],
        ]);

        try {

            $request_data             = $request->except('password_confirmation', 'remember');
            $request_data['password'] = bcrypt($request->password);

            if (auth()->guard('web')->check()) {

                return redirect()->route('welcome.index');

            } else {

                $user = User::create($request_data);
                $user->attachRole('clients');

                $remember_me = $request->has('remember') ? true : false;
                auth()->login($user, $remember_me);

                $user = Notification::create([
                    'title_ar' => 'تم انشاء حساب جديد',
                    'title_en' => 'created New account',
                    'user_id'  => $user->id,
                ]); //end of create

                Mail::to($request->email)->send(new \App\Mail\NotyEmail($user));

                notify()->success(__('dashboard.added_successfully'));
                return redirect()->route('profile.index');

            } //end of if auth

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end of try catch

    } //end of login store function

    public function user_logout()
    {
        auth()->guard('web')->logout();

        notify()->success(__('dashboard.logoute_successfully'));
        return redirect()->route('home.login');

    } //end of logout user

} //end of controller
