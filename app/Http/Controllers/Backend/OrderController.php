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

class OrderController extends Controller
{
    
    public function PendingOrder()
    {
        
        $orders = Order::where('status','pendiente')->orderBy('id', 'DESC')->get();

        return view('backend.orders.pending_orders', compact('orders'));

    }// End Method

}
