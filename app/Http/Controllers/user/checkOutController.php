<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class checkOutController extends Controller
{
    public function CheckOuteStore(Request $request){


        $request->validate([
            'shipping_name' => 'required|max:30',
            'shipping_email' => 'required|email',
            'shipping_phone' => 'required|digits:10',
            'post_code' => 'required|numeric',
            'division_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'payment_method' => 'required'
        ]);
        
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        
        if($request->payment_method == 'stripe'){
            return view('castomer.payment.stripe' , compact('data' , 'carts' , 'cartQty' , 'cartTotal'));
        }
        elseif($request->payment_method == 'cash'){
            return view('castomer.payment.cash' , compact('data' , 'cartTotal'));
        }
        else{
            return 'cash';
        }

    }
}
