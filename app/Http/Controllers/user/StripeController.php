<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use App\Models\OrderItem;
use App\Models\Order;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;
use Stripe;


class StripeController extends Controller
{
    public function StripeOrder(Request $request){

       

        // if(Session::has('coupon')){
        //     $total_amount = Session::get('coupon')['total_amount'];
        // }
        // else{
        //     $total_amount = round(Cart::total());
        // }

        \Stripe\Stripe::setApiKey('sk_test_51KSdXYSFs6w1cHmvH1MCRZrv92du8T6kwxhKsdb5EI0zj6F7VBw00GRlS9ynTrscGpBneQJec8hY0vnVqPL4uGWc00lzxhS8O6');

	 
        $token = $_POST['stripeToken'];
        $charge = \Stripe\Charge::create([
        'amount' => 200*100,
        'currency' => 'usd',
        'description' => 'Easy Online Store',
        'source' => $token,
        'metadata' => ['order_id' => uniqid()],
        ]);

          dd($charge);

    //     $order_id = Order::insertGetId([
    //         'user_id' => Auth::id(),
    //         'division_id' => $request->division_id,
    //         'district_id' => $request->district_id,
    //         'state_id' => $request->state_id,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'post_code' => $request->post_code,
    //         'phone' => $request->phone,
    //         'notes' => $request->notes,
    //         'payment_type' => 'Stripe' ,
    //         'payment_method' => 'Stripe',

    //         'payment_method' => $charge->payment_method ,
    //         'transaction_id' => $charge->balance_transaction,
    //         'currency' => $charge->currency,
    //         'amount' => $total_amount,

    //         'order_number' => $charge->metadata->order_id,
    //         'invoice_no' => 'EOS'.mt_rand(10000000,99999999),
    //         'order_date' => Carbon::now()->format('d F Y'),
    //         'order_month' => Carbon::now()->format('F'),
    //         'order_year' => Carbon::now()->format('Y'),
    //         'status' => 'pending',
    //         'created_at' => Carbon::now(),	       
            
    //     ]);


    //     // start send email
    //     $invoice = Order::findOrFail($order_id);
    //     $data = [
    //         'invoice_no' => $invoice->invoice_no,
    //         'amount' => $total_amount,
    //         'name' => $request->name,
    //         'email' => $request->email,
    //     ];

    //     Mail::to($request->email)->send(new OrderMail($data));

    //     // end send email

    //     $carts = Cart::content();
    //     foreach ($carts as $cart ) {
    //         OrderItem::insert([
    //             'order_id' => $order_id,
    //             'product_id' => $cart->id,
    //             'color' => $cart->options->color,
    //             'size' => $cart->options->size,
    //             'qty' => $cart->options->qty,
    //             'size' => $cart->options->size,
    //             'price' => $cart->price,
    //             'created_at' => Carbon::now()
    //         ]);
    //     }

    //     if(Session::has('coupon')){
    //         Session::forget('coupon');
    //     }
    //     Cart::destroy();
    


    //    $notification = array(
    //     'message' => 'Order place Successfully',
    //     'alert-type' => 'success'
    //     );

    //     return redirect()->back()->with($notification);

    }

    

}
