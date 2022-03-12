<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function AddToCart(Request $request , $id){

        

        $product = Product::findOrFail($id);

        if($product->discount_price == NULL){
            Cart::add([
                'id' => $id,               
                'name' => $request->product_name, 
                'qty' => $request->quantity, 
                'price' => $product->selling_price, 
                'weight' => 1, 
                'options' => [
                    'image' => $product->product_thumbnail,
                    'size' => $request->size                                                         
                ]
            ]);
            
            return response()->json(['success' => 'successfull added on cart'] );
        }
        else{
                Cart::add([
                    'id' => $id,                    
                    'name' => $request->product_name, 
                    'qty' => $request->quantity, 
                    'price' => $product->discount_price, 
                    'weight' => 1, 
                    'options' => [
                        'image' => $product->product_thumbnail,
                        'size' => $request->size                                                         
                    ]
                ]);
            return response()->json(['success' => 'Product Add to Cart']);

        }
    }

    public function AddMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();
        $subtotal = Cart::subtotal();
        return response()->json(array(
            'carts' => $carts,
            'cartQty' => $cartQty,
           'cartTotal' => $cartTotal,
           'subtotal' => $subtotal
        ));
    }

    public function RemoveMiniCart($rowId){
        Cart::remove($rowId);
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        return response()->json(['error' => 'Product Remove from Cart']);
    }

   
}
