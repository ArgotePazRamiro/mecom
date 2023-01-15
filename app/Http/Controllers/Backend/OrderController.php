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
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    
    public function PendingOrder()
    {
        
        $orders = Order::where('status','pendiente')->orderBy('id', 'DESC')->get();

        return view('backend.orders.pending_orders', compact('orders'));

    }// End Method

    public function AdminOrderDetails($order_id)
    {
        
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        return view('backend.orders.admin_order_details', compact('order', 'orderItem'));

    }// End Method

    public function AdminConfirmedOrder()
    {
        
        $orders = Order::where('status','confirmada')->orderBy('id', 'DESC')->get();

        return view('backend.orders.confirmed_orders', compact('orders'));

    }// End Method

    public function AdminProcessingOrder()
    {
        
        $orders = Order::where('status','procesandose')->orderBy('id', 'DESC')->get();

        return view('backend.orders.processing_orders', compact('orders'));

    }// End Method

    public function AdminDeliveredOrder()
    {
        
        $orders = Order::where('status','entregada')->orderBy('id', 'DESC')->get();

        return view('backend.orders.delivered_orders', compact('orders'));

    }// End Method

    public function PendingToConfirm($order_id)
    {
        
        Order::findOrFail($order_id)->update([

            'status' => 'confirmada',
            'confirmed_date' => Carbon::now()->format('d F Y'),

        ]);

        $notification = array(
            'message' => 'Orden Confirmada Corréctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.confirmed.order')->with($notification);

    }// End Method

    public function ConfirmToProcess($order_id)
    {
        
        Order::findOrFail($order_id)->update([
            
            'status' => 'procesandose',
            'processing_date' => Carbon::now()->format('d F Y'),

        ]);

        $notification = array(
            'message' => 'Orden Procesándose Corréctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.processing.order')->with($notification);

    }// End Method

    public function ProcessToDelivered($order_id)
    {
        
        Order::findOrFail($order_id)->update([
            
            'status' => 'entregada',
            'delivered_date' => Carbon::now()->format('d F Y'),
        
        ]);

        $notification = array(
            'message' => 'Orden Entregada Corréctamente',
            'alert-type' => 'success',
        );

        return redirect()->route('admin.delivered.order')->with($notification);

    }// End Method

    public function AdminInvoiceDownload($order_id)
    {
        
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();

        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();

        $pdf = Pdf::loadView('backend.orders.admin_order_invoice', compact('order', 'orderItem'))
                            ->setPaper('a4')->setOption([

                                'tempDir' => public_path(),
                                'chroot' => public_path(),

                            ]);

        return $pdf->download('Factura_admin.pdf');

    }// End Method

}
