<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categorey;
use App\Models\CategoryDealer;
use App\Models\Product;
use App\Models\PromotedDealer;
use App\Models\User;
use Illuminate\Http\Request;

class WelcomController extends Controller
{
    public function __construct()
    {
        //create read update delete
        $this->middleware(['permission:dashboard_read'])->only('index');

    } //end of constructor

    public function index()
    {
        $admins_count           = User::whereRoleIs('admin')->count();
        $clients_count          = User::whereRoleIs('clients')->count();
        $products_count         = Product::count();
        $categorys_count        = Categorey::where('sub_categoreys', '0')->count();
        $sub_categoreys_count   = Categorey::where('sub_categoreys', '>', '0')->count();
        $category_dealers_count = CategoryDealer::count();
        $promoted_activ_count   = PromotedDealer::where('status', 0)->count();
        $promoted_inactiv_count = PromotedDealer::where('status', 1)->count();

        return view('dashboard.welcome', compact(
            'admins_count', 'clients_count', 'products_count', 'categorys_count',
            'category_dealers_count', 'promoted_activ_count', 'promoted_inactiv_count', 'sub_categoreys_count'));

    } //end of index function

    public function promoted_dealer_count()
    {
        $promoted_dealers = PromotedDealer::whenSearch(request()->search)->latest()->paginate(10);

        return view('dashboard.promoted_dealer_count', compact('promoted_dealers'));

    } //end of promoted_dealer_count

} //end of controller
