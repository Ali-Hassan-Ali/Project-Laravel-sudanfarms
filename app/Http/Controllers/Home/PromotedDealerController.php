<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromotedDealerController extends Controller
{
    public function index()
    {
        return view('home.my_acount.promoted_dealers');

    }//ene of index

    public function store(Request $request)
    {
        return $request;
    }//end of store

}//end of controller
