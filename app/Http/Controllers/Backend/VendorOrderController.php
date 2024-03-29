<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class VendorOrderController extends Controller
{
    
    public function VendorOrder()
    {
        
        $id = Auth::user()->id;
        
        $orderItem = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();

        return view('vendor.backend.orders.pending_orders', compact('orderItem'));

    }// End Method

    public function VendorReturnOrder()
    {
        
        $id = Auth::user()->id;
        
        $orderItem = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();

        return view('vendor.backend.orders.return_orders', compact('orderItem'));

    }// End Method

    public function VendorCompleteReturnOrder()
    {
        
        $id = Auth::user()->id;
        
        $orderItem = OrderItem::with('order')->where('vendor_id', $id)->orderBy('id', 'DESC')->get();

        return view('vendor.backend.orders.complete_return_orders', compact('orderItem'));

    }// End Method

    public function VendorOrderDetails($order_id)
    {
        
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('vendor.backend.orders.vendor_order_details', compact('order', 'orderItem'));

    }// End Method
    

}
