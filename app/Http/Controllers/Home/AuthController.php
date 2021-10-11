<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard('web')->check()) {

            return redirect()->route('welcome.index');    
        }

        return view('home.auth.login');

    }//end of index login function

    public function register()
    {
        if (Auth::guard('web')->check()) {

            return redirect()->route('welcome.index');    
        }
        
        return view('home.auth.register');

    }//end of index register function

    public function store_login(Request $request)
    {
        $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        try {

            if (Auth::guard('web')->check()) {

                return redirect()->route('welcome.index');
                
            } else {

                if (User::where('email',$request->email)->first()) {
                    
                    if (\Auth::guard('web')->attempt([
                        'email'    => $request->email, 
                        'password' => $request->password])) {
                        return redirect()->route('welcome.index');

                    } else {
                        
                        return back()->withErrors([
                            'password' => 'The password is incorrect'
                        ]);
                        
                    }//end of attempt

                } else {

                    return back()->withErrors([
                        'email' => 'The email is incorrect'
                    ]);

                }//end of email
                
            }//end of if auth
            
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try catch

    }//end of login store function

    public function store_register(Request $request)
    {

        $request->validate([
            'name'      => ['required', 'max:15'],
            'username'  => ['required', 'unique:users','max:20'],
            'email'     => ['required', 'email','unique:users','max:25'],
            'password'  => ['required','confirmed','max:20'],
        ]);

        try {

            if (Auth::guard('web')->check()) {

                return redirect()->route('welcome.index');
                
            } else {

                $user = User::create($request->all());

                $user->attachRole('clients');

                if (\Auth::guard('web')->attempt([
                    'email'    => $user->email, 
                    'password' => $user->password])) {

                    return redirect()->route('welcome.index');

                }
                
            }//end of if auth
            
        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            
        }//end of try catch

    }//end of login store function

    public function user_logout()
    {
        Auth::guard('web')->logout();

        return $this->login();

    }//end of logout user

}//end of controller
