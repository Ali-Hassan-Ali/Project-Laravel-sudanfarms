<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::guard('web')->check()) {

            return redirect()->route('dashboard.welcome');    
        }

        return view('dashboard.login');

    }//end of index login function

    public function store(Request $request)
    {
       $request->validate([
            'email'     => ['required', 'email'],
            'password'  => ['required'],
        ]);

        try {

            if (Auth::guard('web')->check()) {

                return redirect()->route('dashboard.welcome');
                
            } else {

                if (User::where('email',$request->email)->first()) {
                    
                    if (\Auth::guard('web')->attempt([
                        'email'    => $request->email, 
                        'password' => $request->password])) {

                        return redirect()->route('dashboard.welcome');

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
