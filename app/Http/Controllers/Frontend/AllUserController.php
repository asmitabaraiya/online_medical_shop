<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Order;
use Auth;
use App\Mail\OrderMail;
use PDF;
use Carbon\Carbon;


class AllUserController extends Controller
{
    public function MyOrders(){
            $orders = Order::where('user_id' , Auth::id())->orderBy('id' , 'DESC')->get();
            return view('castomer.profile.order.order_view' , compact('orders'));
    }

    public function MyOrderView($order_id){
        $order = Order::where('id' , $order_id)->where('user_id' , Auth::id())->first();
        $orderItem = OrderItem::where('order_id' , $order_id)->orderBy('id' , 'DESC')->get();
        return  view('castomer.profile.order.orde_detail' , compact('order' , 'orderItem'));
    }

    public function MyOrderDownload($order_id){
        $order = Order::where('id' , $order_id)->where('user_id' , Auth::id())->first();
        $orderItem = OrderItem::where('order_id' , $order_id)->orderBy('id' , 'DESC')->get();

        $pdf = PDF::loadView('castomer.profile.order.order_download' , compact('order' , 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
     
    }

    public function ReturnMyOrder(Request $request , $id){
        Order::findOrFail($id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
        ]);

        return redirect()->route('myOrder');

    }

    public function ReturnMyOrderView(){
        $orders = Order::where('user_id' , Auth::id())->where('return_reason' , '!=' , NULL)->orderBy('id' , 'DESC')->get();

        
        return  view('castomer.profile.order.orde_return_view' , compact('orders' ));

    }
}
