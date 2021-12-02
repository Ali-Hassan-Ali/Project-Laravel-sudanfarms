<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Rules\OldPassword;
use App\Models\User;
use App\Models\RequestCustmer;
use App\Models\PromotedDealer;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {   
        $user = auth()->user()->id;

        $promoted_dealer = PromotedDealer::where('user_id',$user)->first();

        if ($promoted_dealer) {
            
            $promoted_dealer  = PromotedDealer::where('user_id',$user)->first();

            $request_custmers = RequestCustmer::where('promoted_dealer_id',$promoted_dealer->id)->get();

        } else {

            $promoted_dealer  = 0;

            $request_custmers = 0;
        } 

        return view('home.my_acount.profile',compact('request_custmers','promoted_dealer'));

    }//end of index



    public function passwprd_index()
    {
        return view('home.my_acount.change_password');

    }//end of passwprd_index



    public function passwprd_store(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new OldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return view('home.my_acount.profile');

    }//end of chabge password

    public function update(Request $request)
    {   
        
        $user = User::find(auth()->user()->id);

        $request->validate([
            'name'          => ['required'],
            'email'         => ['required', Rule::unique('users')->ignore($user->id)],
            'phone'         => ['required'],
        ]);

        $request_data = $request->except(['image']);

        if ($request->image) {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            } //end of inner if

            $request_data['image'] = $request->file('image')->store('user_images','public');

        } //end of external if
            $request_data['country'] = 'sfgsfg';

        $user->update($request_data);

        notify()->success('Welcome to Laravel Notify ⚡️');
        
        return redirect()->back();

    }//end of store
    
}//end of controller
