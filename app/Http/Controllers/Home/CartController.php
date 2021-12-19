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

                $image_product = ImageProduct::where('product_id', $request->id)->first();
                
                $product = Cart::add($product_model->id, $product_model->name, 1 , $product_model->price)
                    ->associate('App\Models\Product');

                $count    = Cart::count();
                $subtotal = Cart::subtotal();
                $currency = app()->getLocale() == 'ar' ? 'جس' : 'SDG';

                return response()->json([
                            'product'       => $product,
                            'product_model' => $product_model,
                            'image_product' => $image_product, 
                            'count'         => $count, 
                            'currency'      => $currency,
                            'subtotal'      => $subtotal
                       ]);

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

    public function destroy_cart(Request $request)
    {

        try {


            if (request()->ajax()) {

                Cart::remove($request->row_id);
                
                $count    = Cart::count();
                $subtotal = Cart::subtotal();
                $currency = app()->getLocale() == 'ar' ? 'جس' : 'SDG';

                return response()->json(['subtotal'=>$subtotal,'currency' => $currency,'count' => $count]);

            }//end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        }//end try
    
    }//end of function

}//end of controller
