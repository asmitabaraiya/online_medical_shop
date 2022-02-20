<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;

use PDF;


class OrderController extends Controller
{
    public function pandingOrderView(){
        $orders = Order::where('status' , 'pending')->orderBy('id' , 'DESC')->get();
        return view('backend.order.pendingOrder_view' , compact('orders'));
    }

    public function pandingOrderDetailView($id){

        $order = Order::where('id' , $id)->first();
        $orderItem = OrderItem::where('order_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('backend.order.pendingOrder_detail' , compact('order' , 'orderItem'));
    }

    public function confirmOrderView(){
        $orders = Order::where('status' , 'confirm')->orderBy('id' , 'DESC')->get();
        return view('backend.order.confirmOrder_view' , compact('orders'));

    }

    public function processingOrderView(){
        $orders = Order::where('status' , 'process')->orderBy('id' , 'DESC')->get();
        return view('backend.order.processingOrder_view' , compact('orders'));        
    }

    public function pickedOrderView(){
        $orders = Order::where('status' , 'picked')->orderBy('id' , 'DESC')->get();
        return view('backend.order.pickedOrder_view' , compact('orders'));
    }

    public function shippedOrderView(){
        $orders = Order::where('status' , 'shipped')->orderBy('id' , 'DESC')->get();
        return view('backend.order.shippedOrder_view' , compact('orders'));
    }

    public function deliveredOrderView(){
        $orders = Order::where('status' , 'delivered')->orderBy('id' , 'DESC')->get();
        return view('backend.order.deliveredOrder_view' , compact('orders'));
    }

    public function cancelOrderView(){
        $orders = Order::where('status' , 'cancel')->orderBy('id' , 'DESC')->get();
        return view('backend.order.cancelOrder_view' , compact('orders'));
    }

    public function PandingToComfirm($id){
        Order::findOrFail($id)->update([
            'status' => 'confirm'
        ]);
        return redirect()->route('orders.pandingOrder');
    }

    public function comfirmToprocess($id){
        Order::findOrFail($id)->update([
            'status' => 'process'
        ]);
        return redirect()->route('orders.processingOrder');
    }

    public function processTopicked($id){
        Order::findOrFail($id)->update([
            'status' => 'picked'
        ]);
        return redirect()->route('orders.pickedOrder');
    }

    public function pickedToshipped($id){
        Order::findOrFail($id)->update([
            'status' => 'shipped'
        ]);
        return redirect()->route('orders.shippedOrder');
    }

    public function shippedTodelivered($id){
        Order::findOrFail($id)->update([
            'status' => 'delivered'
        ]);
        return redirect()->route('orders.delivered');
    }

    public function deliveredTocancel($id){
        Order::findOrFail($id)->update([
            'status' => 'cancel'
        ]);
        return redirect()->route('orders.cancelOrder');   
    }

    public function OrderInvoiceDownlod($id){
        $order = Order::where('id' , $id)->first();
        $orderItem = OrderItem::where('order_id' , $id)->orderBy('id' , 'DESC')->get();

        $pdf = PDF::loadView('backend.order.orderInvoice_download' , compact('order' , 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
