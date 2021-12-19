<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\ImageProduct;
use App\Models\Product;

class CartController extends Controller
{

    public function add_cart(Request $request)
    {

        try {

            if (request()->ajax()) {

                $product_model = Product::FindOrFail($request->id);
                
                $product = Cart::add($product_model->id, $product_model->name, 1 , $product_model->price)
                    ->associate('App\Models\Product');

                $count    = Cart::count();

                return response()->json(['product' => $product,'image_product' => $image_product, 'count' => $count, 'currency' => $currency,'subtotal'=>$subtotal]);

            }//end of if ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function add_cart

    public function update_cart(Request $request)
    {   

        try {

            if (request()->ajax()) {

                $product  = Cart::update($request->row_id, $request->quantity);

                $count    = Cart::count();
                $subtotal = Cart::subtotal();

                $currency = app()->getLocale() == 'ar' ? 'جس' : 'SDG';

                return response()->json(['product' => $product, 'count' => $count, 'currency' => $currency,'subtotal'=>$subtotal]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function update_cart

    // public function destroy_cart($id)
    // {

    //     try {

    //         $cart       = Cart::content()->where('rowId', $id)->first();

    //         if (request()->ajax()) {

    //             $count = Cart::count();
    //             Cart::remove($id);
    //             return response()->json(['count' => $count]);

    //         }//end of ajax

    //     } catch (\Exception $e) {

    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    //     }//end try
    
    // }//end of function

    // public function add_coupon_cart(Request $request)
    // {
        
    //     try {

    //         if (request()->ajax()) {    

    //             $coupon = Coupon::where('name', $request->coupon)->first();


    //             if ($coupon == null || $coupon->end <= date('Y-m-d')) {
              
    //                 return response()->json('error');
    //             }

    //             session()->put(['coupon_value' => $coupon->value,'coupon_name' => $coupon->name,'end' => $coupon->end]);
              
    //             return response()->json(['success' => true]);

    //         }//end of ajax


    //     } catch (\Exception $e) {

    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    //     }//end try

    // }//end of store

    // public function destroy_coupon_cart()
    // {
    //     try {

    //         if (request()->ajax()) {

    //             $app   = app()->getLocale();
                
    //             return response()->json(['success' => true, 'app' => $app]);

    //         }//end of ajax

    //     } catch (\Exception $e) {

    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]);

    //     }//end try

    // }//end of destroy

}//end of controller
