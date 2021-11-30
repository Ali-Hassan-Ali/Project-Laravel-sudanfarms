<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Policy;

class FooterController extends Controller
{
    public function ManagerWord()
    {
        return view('home.footer.manager_word');

    }//end of ManagerWord

    public function copyrights()
    {
        $policys = Policy::where('guard','copyrights')->get();

        return view('home.footer.copyrights', compact('policys'));

    }//end of copyrights


    public function privacys()
    {
        $policys = Policy::where('guard','privacys')->get();

        return view('home.footer.privacys', compact('policys'));

    }//end of privacys


    public function terms_conditions()
    {
        $policys = Policy::where('guard','terms_conditions')->get();

        return view('home.footer.terms_conditions', compact('policys'));

    }//end of terms conditions
    

    public function evacuation_responsibilatys()
    {
        $policys = Policy::where('guard','evacuation_responsibilatys')->get();

        return view('home.footer.evacuation_responsibilatys', compact('policys'));

    }//end of evacuation responsibilatys

}//end of controller
