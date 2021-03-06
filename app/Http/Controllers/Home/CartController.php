<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\ImageProduct;
use App\Models\Notification;
use App\Models\NotificationUser;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PromotedDealer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function add_cart(Request $request)
    {

        try {

            if (request()->ajax()) {

                $product_model = Product::FindOrFail($request->id);

                $image_product = ImageProduct::where('product_id', $request->id)->first();

                $product = Cart::add($product_model->id, $product_model->name, 1, preg_replace('/,/', '', $product_model->new_price))
                    ->associate('App\Models\Product');

                $count    = Cart::count();
                $subtotal = Cart::subtotal();
                $currency = app()->getLocale() == 'ar' ? 'ج س' : 'SDG';

                return response()->json([
                    'product'       => $product,
                    'product_model' => $product_model,
                    'image_product' => $image_product,
                    'count'         => $count,
                    'currency'      => $currency,
                    'subtotal'      => $subtotal,
                ]);

            } //end of if ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end of function add_cart



    public function update_cart(Request $request)
    {

        try {

            if (request()->ajax()) {

                $product = Cart::update($request->row_id, $request->quantity);

                $count    = Cart::count();
                $subtotal = Cart::subtotal();

                $currency = app()->getLocale() == 'ar' ? 'ج س' : 'SDG';

                return response()->json(['product' => $product, 'count' => $count, 'currency' => $currency, 'subtotal' => $subtotal]);

            } //end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end of function update_cart



    public function destroy_cart(Request $request)
    {

        try {

            if (request()->ajax()) {

                Cart::remove($request->row_id);

                $count    = Cart::count();
                $subtotal = Cart::subtotal();
                $currency = app()->getLocale() == 'ar' ? 'ج س' : 'SDG';

                return response()->json(['subtotal' => $subtotal, 'currency' => $currency, 'count' => $count]);

            } //end of ajax

        } catch (\Exception $e) {

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);

        } //end try

    } //end of function destroy_cart



    public function send()
    {

        if (Cart::count() > 0) {

            $order = Order::create([
                'user_id'     => auth()->id(),
                'phone'       => auth()->user()->phone,
                'totle_price' => Cart::subtotal(),
            ]);

            NotificationUser::create([
                'title_ar' => 'قمت بطلب منتجات من سودان فارمس',
                'title_en' => 'I ordered products from Sudan Farms',
                'slug'     => 'orders',
                'user_id'  => auth()->id(),
            ]); //end of create

            Notification::create([
                'title_ar' => 'قمت بطلب منتجات من سودان فارمس',
                'title_en' => 'I ordered products from Sudan Farms',
                'slug'     => 'orders',
                'user_id'  => '1',
            ]); //end of create


            foreach (Cart::content() as $product) {

                $orderItem = OrderItem::create([
                    'order_id'           => $order->id,
                    'product_id'         => $product->model->id,
                    'quantity'           => $product->qty,
                    'price'              => $product->price,
                    'subtotal'           => $product->subtotal,
                    'promoted_dealer_id' => $product->model->user_id,
                    'user_id'            => auth()->id(),
                ]);;

                $data = PromotedDealer::where('user_id',$orderItem->promoted_dealer_id)->first();

                NotificationUser::create([
                    'title_ar' => 'تم طلguب منتج جديد',
                    'title_en' => 'New product ordered',
                    'slug'     => 'products',
                    'user_id'  => auth()->id(),
                ]); //end of create

                \Mail::to($data->email)->send(new \App\Mail\OrderItemEmail($orderItem));

            } //end of foreach

            \Mail::to(auth()->user()->email)->send(new \App\Mail\OrderUserEmail($order));
            
            Cart::destroy();
                
            notify()->success(__('dashboard.added_successfully'));
            return redirect()->route('orders.index');

        } else {

            notify()->success(__('dashboard.no_data_found'));

            return redirect()->back();

        } //end of if

    } //end of send
    

} //end of controller
