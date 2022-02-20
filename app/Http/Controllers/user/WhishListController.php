<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhishList;
use Auth;
use Carbon\Carbon;

class WhishListController extends Controller
{

    public function ViewWishList(){
        $whishList_item = WhishList::where('user_id' , Auth::id())->get();
        return view('castomer.wishList.view_wishList' , compact('whishList_item'));
    }



    // add to wish list with ajax
    public function AddToWishList(Request $request , $product_id){
        if(Auth::check()){
            $exists = WhishList::where('user_id' , Auth::id())->where('product_id' , $product_id)->first();
            if (!$exists) {
                WhishList::insert([
                 'user_id' => Auth::id(), 
                 'product_id' => $product_id, 
                 'created_at' => Carbon::now(), 
                ]);
                return response()->json(['success' => 'successfuly add into wishlist']);
            }
            else{
                return response()->json(['error' => 'This Product has Already on Your Wishlist']);
            }    

        }
        else{
            return response()->json(['error' => 'Please login Your account']);
        }
    }

    public function AddWishList(){
        $wishlist = WhishList::with('product')->where('user_id' , Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function RemoveWishList($id){
        WhishList::where('user_id' , Auth::id())->where('id' , $id)->delete();
        return response()->json(['error' => 'Product Remove from wishlist']);
    }



}
