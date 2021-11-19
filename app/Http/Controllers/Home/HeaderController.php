<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\CategoryDealer;

class HeaderController extends Controller
{
    public function contact()
    {
        return view('home.header.contact');
    }//end of contact

    public function contactStore(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'email'   => 'required',
            'phone'   => 'required',
            'body'    => 'required',
            'message' => 'required',
        ]);

        Contact::create($request->all());

        return redirect()->back();

    }//end of contact

    public function supplier()
    {       
        $category_dealers = CategoryDealer::all();

        return view('home.header.suppliers',compact('category_dealers'));
    }//end of supplier

}//end of controller
