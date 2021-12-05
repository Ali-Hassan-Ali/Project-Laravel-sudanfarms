<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromotedDealer;
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

    public function count_call_phone(PromotedDealer $PromotedDealer)
    {
        
        $PromotedDealer->update([
            'count_call_phone' => $PromotedDealer->count_call_phone + 1
        ]);

        return $PromotedDealer->count_call_phone;

    }//end of count call phone


    public function count_call_email(PromotedDealer $PromotedDealer)
    {
        
        $PromotedDealer->update([
            'count_call_email' => $PromotedDealer->count_call_email + 1
        ]);

        return $PromotedDealer->count_call_email;

    }//end of count call email
    
}//end of controller
