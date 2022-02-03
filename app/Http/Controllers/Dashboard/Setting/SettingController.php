<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function contact_us()
    {
        return view('dashboard.settings.contact_us');

    }// end of contact_us

    public function social_links()
    {
        return view('dashboard.settings.social_links');

    }// end of social_links

    public function manager_word()
    {
        return view('dashboard.settings.manager_word');

    }// end of manager_word

    public function services()
    {
        return view('dashboard.settings.services');

    }// end of services

    public function about()
    {
        return view('dashboard.settings.about');

    }//end of about

    public function account_number()
    {
        return view('dashboard.settings.account_number');

    }// end of account_number

    public function store(Request $request)
    {
        setting($request->all())->save();
        
        session()->flash('success', __('dashboard.updated_successfully'));
        return redirect()->back();

    }// end of store
    

}//end of controller
