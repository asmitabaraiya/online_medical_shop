<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function CouponView(){
        $coupons = Coupon::orderBy('id' , 'DESC')->get();
        return view('backend.coupon.coupon_view' , compact('coupons'));
    }

    public function CouponStore(Request $request){

        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coipon_validity' => 'required'
        ]);

        Coupon::insert([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coipon_validity' => $request->coipon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.coupon')->with($notification);

    }

    public function CouponInactive($id){
        Coupon::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function CouponActive($id){
        Coupon::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.coupon_edit' , compact('coupon'));
    }

    public function CouponUpdate(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coipon_validity' => 'required'
        ]);
        
        $id = $request->id;                
        Coupon::findOrFail($id)->update([
                'coupon_name' => $request->coupon_name,
                'coupon_discount' => $request->coupon_discount,
                'coipon_validity' => $request->coipon_validity,
            ]); 
        
        $notification = array(
            'message' => ' Product Edit Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.coupon')->with($notification);
    }

    public function CouponDelete($id){      
        Coupon::findOrFail($id)->delete();
        $notification = array(
            'message' => ' Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.coupon')->with($notification);
    }




}
