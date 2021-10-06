<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {

            return redirect()->route('welcome.index');    
        }

        return view('home.login.index');

    }//end of index login function

    public function store(Request $request)
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

    public function seller_logout()
    {

        Auth::guard('web')->logout();

        return $this->index();

    }//end of logout seller

}//end of controller
