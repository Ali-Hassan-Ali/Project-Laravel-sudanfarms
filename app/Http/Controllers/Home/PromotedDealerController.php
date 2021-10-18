<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromotedDealer;

class PromotedDealerController extends Controller
{
    public function index()
    {
        return view('home.my_acount.promoted_dealers');

    }//ene of index

    public function store(Request $request)
    {

        $request->validate([
            'company_name_ar'     => ['required','max:255'],
            'company_name_en'     => ['required','max:255']
            'company_logo'        => ['required'],
            'company_certificate' => ['required'],
            'category_dealer_id'  => ['required'],
            'email'               => ['required'],
            'phone_master'        => ['required'],
            'phone'               => ['required'],
            'other_phone'         => ['required'],
            'web_site'            => ['required'],
            'country'             => ['required'],
            'state'               => ['required'],
            'city'                => ['required'],
            'title'               => ['required'],
            'description'         => ['required'],
        ]);

        $this_user    = PromotedDealer::where('id',auth()->user()->id)->first();

        $request_data = $request->except('company_logo','company_certificate','user_id');

        $request_data['user_id']             = auth()->user()->id;
        $request_data['company_logo']        = $request->file('company_logo')->store('company_logo','public');

        $request_data['company_certificate'] = $request->file('company_certificate')->store('company_certificate','public');
            
        PromotedDealer::create($request_data);

        return redirect()->route('profile.index');

    }//end of store

}//end of controller
