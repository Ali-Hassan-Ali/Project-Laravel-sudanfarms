<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Rules\OldPassword;
use App\Models\User;

class ProfileController extends Controller
{
    public function index()
    {
        return view('home.my_acount.profile');
    }//end of index



    public function passwprd_index()
    {
        
        return view('home.my_acount.change_password');

    }//end of passwprd_index



    public function passwprd_store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'current_password'     => ['required', new OldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return view('home.my_acount.profile');

    }//end of chabge password
    
}//end of controller
