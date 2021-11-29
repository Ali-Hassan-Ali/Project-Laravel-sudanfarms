<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{

    public function index()
    {
        $offers = Offer::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('home.my_acount.offers.index',compact('offers'));

    }//end of index


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Offer $offer)
    {
        //
    }


    public function edit(Offer $offer)
    {
        //
    }


    public function update(Request $request, Offer $offer)
    {
        //
    }


    public function destroy(Offer $offer)
    {
        //
    }
}
