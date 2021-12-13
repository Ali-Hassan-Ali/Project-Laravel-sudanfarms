<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
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
                        
                        session()->flash('success', __('dashboard.login_successfully'));
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

        notify()->success( __('dashboard.login_successfully'));
        return redirect()->route('home.login');

    }//end of logout seller

    public function edit()
    {   
        $user = User::find(auth()->user()->id);

        return view('dashboard.profile.edit',compact('user'));

    }//end of edit profile

    public function update(Request $request, User $user)
    {

        $request->validate([
            'name'        => ['required','max:255'],
            'email'       => ['required', Rule::unique('users')->ignore($user->id)],
        ]);

        try {

            $request_data             = $request->except(['password', 'password_confirmation', 'image']);
            $request_data['password'] = bcrypt($request->password);

            if ($request->image) {

                if ($user->image != 'default.png') {

                    Storage::disk('local')->delete('/user_images/' . $user->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('user_images','public');

            } //end of external if

            $user->update($request_data);

            session()->flash('success', __('dashboard.updated_successfully'));
            return redirect()->route('dashboard.welcome');

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of update profile

}//end of controller
