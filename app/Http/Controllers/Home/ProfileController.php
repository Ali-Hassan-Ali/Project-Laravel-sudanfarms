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
            
            if ($promoted_dealer->PromotedDealerFirst->first()) {

                if ($promoted_dealer->PromotedDealerFirst->first()->end_month < now()) {
                    
                    $promoted_dealer->update([
                        'status' => 0,
                    ]);

                }//end of if

            } //end of if

        }//end of count promoted_dealer

        $user      = PromotedDealer::where('user_id', $userId)->first();
        $products  = Product::where('user_id', $userId)->count();
        $offers    = Offer::where('user_id', $userId)->count();
        $orderItem = OrderItem::where('promoted_dealer_id', $userId)->count();
        $orders    = Order::where('user_id', $userId)->count();
        $recustm   = RequestCustmer::count();
                                    
        return view('home.my_acount.profile', compact('recustm', 'promoted_dealer', 'user',
                                                      'products', 'offers', 'orderItem', 'orders', 'recustm'));

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
        
        notify()->success(__('dashboard.updated_successfully'));
        return redirect()->back();
        return view('home.my_acount.profile');

    } //end of chabge password


    public function update(Request $request)
    {
        $user = User::find(auth()->id());

        $request->validate([
            'name'    => ['required'],
            'phone'   => ['required'],
            'country' => ['required'],
        ]);

        try {

            $request_data = $request->except(['image']);

            if ($request->image) {

                if ($user->image != 'default.png') {

                    Storage::disk('public_uploads')->delete('/user_images/' . $user->image);

                } //end of inner if

                $request_data['image'] = $request->file('image')->store('user_images', 'public');

            } //end of external if

            $user->update($request_data);

            notify()->success(__('dashboard.updated_successfully'));

            return redirect()->back();

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    } //end of store


    public function setting()
    {
        $userId = auth()->id();

        $promoted_dealer = PromotedDealer::where('user_id', $userId)->first();

        return view('home.my_acount.setting', compact('promoted_dealer'));

    }//end of fun


} //end of controller
