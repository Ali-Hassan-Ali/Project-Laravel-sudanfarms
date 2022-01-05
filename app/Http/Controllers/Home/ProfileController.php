<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PackagePromoted;
use App\Models\Product;
use App\Models\PromotedDealer;
use App\Models\RequestCustmer;
use App\Models\User;
use App\Rules\OldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {

        $userId = auth()->id();

        $promoted_dealer = PromotedDealer::where('user_id', $userId)->first();

        if ($promoted_dealer) {

            $PackagePromoted = PackagePromoted::where('promoted_dealer_id', $promoted_dealer->id)->latest()->first();
            
            if ($promoted_dealer) {

                if ($promoted_dealer->packages_id) {
                    
                    if ($PackagePromoted->end_month < date('m-d-Y')) {
                        
                        $promoted_dealer->update([
                            'status' => 0,
                        ]);

                    } else {

                        $promoted_dealer->update([
                            'status' => 1,
                        ]);

                    } //end of if

                }//end of if

            } //emd pf

        } //end of if

        if ($promoted_dealer) {

            $promoted_dealer = PromotedDealer::where('user_id', $userId)->first();

            $request_custmers = RequestCustmer::where('promoted_dealer_id', $promoted_dealer->id)->get();

        } else {

            $promoted_dealer = 0;

            $request_custmers = 0;
        }

        $user      = PromotedDealer::where('user_id', $userId)->first();
        $products  = Product::where('user_id', $userId)->count();
        $offers    = Offer::where('user_id', $userId)->count();
        $orderItem = OrderItem::where('promoted_dealer_id', $userId)->count();
        $orders    = Order::where('user_id', $userId)->count();
        $recustm   = RequestCustmer::count();

        $uuser_state = PromotedDealer::where('user_id',auth()->id())->where('state','0')->first();
        $packages    = PromotedDealer::where('user_id',auth()->id())
                                                  ->where('status','>','0')
                                                  ->where('packages_id','>','0')
                                                  ->first();

        $packagCount = PromotedDealer::where('user_id',auth()->id())
                                                  ->where('status','1')
                                                  ->count();
                                    
        return view('home.my_acount.profile', compact('request_custmers', 'promoted_dealer', 'user',
                                                      'products', 'offers', 'orderItem', 'orders', 'recustm'
                                                      ,'uuser_state','packages','packagCount'));

    } //end of index


    public function passwprd_index()
    {
        return view('home.my_acount.change_password');

    } //end of passwprd_index


    public function passwprd_store(Request $request)
    {
        $request->validate([
            'current_password'     => ['required', new OldPassword],
            'new_password'         => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return view('home.my_acount.profile');

    } //end of chabge password


    public function update(Request $request)
    {

        $user = User::find(auth()->user()->id);

        $request->validate([
            'name'  => ['required'],
            'email' => ['required', Rule::unique('users')->ignore($user->id)],
            'phone' => ['required'],
        ]);

        $request_data = $request->except(['image']);

        if ($request->image) {

            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

            } //end of inner if

            $request_data['image'] = $request->file('image')->store('user_images', 'public');

        } //end of external if
        $request_data['country'] = 'sfgsfg';

        $user->update($request_data);

        notify()->success(__('dashboard.updated_successfully'));

        return redirect()->back();

    } //end of store
    

} //end of controller
