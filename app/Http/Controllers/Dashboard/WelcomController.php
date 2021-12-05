<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PromotedDealer;
use App\Models\Product;
use App\Models\User;

class WelcomController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:dashboard_read'])->only('index');

    }//end of constructor 
    
    public function index()
    {
        $admins_count    = User::whereRoleIs('admin')->count();
        $clients_count   = User::whereRoleIs('clients')->count();
        $products_count  = Product::count();

        return view('dashboard.welcome',compact('admins_count','clients_count','products_count'));

    }//end of index function

    public function promoted_dealer_count()
    {
        $promoted_dealers = PromotedDealer::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.promoted_dealer_count',compact('promoted_dealers'));

    }//end of promoted_dealer_count
    
}//end of controller
