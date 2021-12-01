<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorey;
use App\Models\Offer;

class WelcomController extends Controller
{
    public function index()
    {   
        $sub_categoreys = Categorey::where('sub_categoreys','>','0')->get();

        $offer          = Offer::latest()->first();

        $offers         = Offer::count();

        return view('home.welcome',compact('sub_categoreys','offer','offers'));

    }//end of index
    
}//end of controller
