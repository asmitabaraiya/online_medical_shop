<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Auth;
use App\Models\ShippingArea;
use App\Models\ShipDistrict;
use App\Models\ShipState;


class MyCartController extends Controller
{
    public function MyCart(){
      
    //      $total = Cart::total();
    //    print_r($total);
    //    $carts = Cart::content();
    //    print_r($carts);
       return view('castomer.wishList.view_myCart');
    }

    public function GetCartProduct(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
          // 'cartTotal' => round($cartTotal),
        ));
    }

    public function RemoveMyCart($id){
        Cart::remove($id);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['error' => 'Product Remove from Cart']);
  
    }

    public function IncrementCart($id){
        $row = Cart::get($id);
        Cart::update($id, $row->qty + 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
        }
 

        return response()->json('increment');
    }

    public function DecrementCart($id){

        $row = Cart::get($id);
        Cart::update($id, $row->qty - 1);

        if (Session::has('coupon')) {

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon = Coupon::where('coupon_name',$coupon_name)->first();

           Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
            ]);
        }
 

        return response()->json('increment');
    }

    public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name' , $request->coupon_name)->where('coipon_validity' , '>=' , Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
           Session::put('coupon' , [
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
               'discount_amount' => round(Cart::total() * $coupon->coupon_discount / 100) ,
               'total_amount' => round( Cart::total() - Cart::total() * $coupon->coupon_discount / 100)

           ]);
           return response()->json([
               'validitiy' => true,
               'success' => 'Coupon Applied Successfully' 

            ]);
           
        }
        else{
            return response()->json(['error' => 'invalid Coupon']);
        }
    }

    public function couponCalculation(){
        if(Session::has('coupon')){
            return response()->json(array(
                'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' =>  session()->get('coupon')['discount_amount'],
                'total_amount' =>  session()->get('coupon')['total_amount'],
            ));
        }
        else{
            return response()->json(array(
                'total' => Cart::total()
            ));
        }
    }

    public function couponRemove(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove']);
    }


// check out

    public function CheckOutCreate(){
        if(Auth::check()){
            if(Cart::total() > 0){

                $districts = ShipDistrict::orderBy('id' , 'ASC')->get();
                $divisions = ShippingArea::orderBy('id' , 'ASC')->get();

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();

                return view('castomer.checkout.checkOut_view' , compact('carts' , 'cartQty' , 'cartTotal' , 'districts' , 'divisions'));
            }
            else{
                $notification = array(
                    'message' => 'Shopping At list One Product',
                    'alert-type' => 'error'
                );
                return redirect()->route('login')->with($notification);
            }
        }   
        else{
            $notification = array(
                'message' => 'You need to login first',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }     
    }

  
}
