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

    public function store(Request $request)
    {
        setting($request->all())->save();
        session()->flash('success', 'Data added successfully');
        return redirect()->back();

    }// end of store

}//end of controller
