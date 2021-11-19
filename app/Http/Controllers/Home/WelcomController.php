<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categorey;

class WelcomController extends Controller
{
    public function index()
    {   
        $sub_categoreys = Categorey::where('sub_categoreys','>','0')->get();

        return view('home.welcome',compact('sub_categoreys'));

    }//end of index
    
}//end of controller
