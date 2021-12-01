<?php

namespace App\Http\Controllers\Dashboard\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
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

    public function store(Request $request)
    {
        setting($request->all())->save();
        session()->flash('success', 'Data added successfully');
        return redirect()->back();

    }// end of store

}//end of controller
