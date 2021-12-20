<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->latest()->paginate(10);

        return view('home.my_acount.orders.index',compact('orders'));

    }//end of index

    public function show(Order $order)
    {
        $orderItems = OrderItem::where('order_id', $order->id)->with('product')->latest()->paginate(10);

        return view('home.my_acount.orders.show',compact('orderItems'));

    }//end of show

}//end of Controller
