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
            // return Cart::destroy();

                    $product_model = Product::FindOrFail($request->id);

                    $image_product = ImageProduct::where('product_id',$product_model->id)->first();
                    
                    $product = Cart::add($product_model->id, $product_model->name, 1 , $product_model->price)
                        ->associate('App\Models\Product');
    // 
                    $total   = Cart::subtotal();
                    $count   = Cart::count();
                    $local   = app()->getLocale();

                    return response()->json(['product' => $product, 'product_model' => $product_model, 'total' => $total, 'local' => $local, 'count' => $count,'image_product' => $image_product]);
                    return Cart::update($request->id, $request->quantity);
        try {

            if (request()->ajax()) {

                if ($request->quantity != '1') {

                    $quantity = $request->quantity;
                    $quantity = $request->quantity;

                    return $this->update_cart($quantity,);
                    
                } else {

                    return 'ok';


                }//end of if

            }//end of if ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try

    }//end of function add_cart

    public function update_cart(Request $request, $id)
    {   
        try {

            if (request()->ajax()) {

                $cart  = Cart::update($request->row_id, $request->quantity);
                $count = Cart::count();
                $app   = app()->getLocale();

                if ($coupon = session()->has('coupon_value') == '') {

                    $coupon = '0';
                    
                } else {

                    $coupon = session()->get('coupon_value'); 

                }//end of if

                return response()->json(['cart' => $cart, 'count' => $count, 'app' => $app, 'coupon' => $coupon]);

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
