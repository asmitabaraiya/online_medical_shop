<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\User;
use App\Models\Review;

class RepotsController extends Controller
{
    public function RepotsView(){
        return view('backend.repots.repots_view');
    }

    public function RepotsByDate(Request $request){
        $request->validate([
            'date' => 'required',
        ]);

        $date = new DateTime($request->date);
        $formateDate = $date->format('d F Y');
        $orders = Order::where('order_date' , $formateDate)->latest()->get();
        return view('backend.repots.report_detail' , compact('orders'));
    }

    public function RepotsByMonth(Request $request){
        $request->validate([
            'month' => 'required',
            'year' => 'required',

        ]);

        $orders = Order::where('order_month' , $request->month )->where('order_year' , $request->year)->latest()->get();
        return view('backend.repots.report_detail' , compact('orders'));
    }

    public function RepotsByYear(Request $request){
        $request->validate([           
            'year' => 'required',
        ]);


        $orders = Order::where('order_year' , $request->year)->latest()->get();
        return view('backend.repots.report_detail' , compact('orders'));
    }

    public function AllUserView(){
        $users = User::latest()->get();
        return view('backend.users.allUsers', compact('users'));
    }

    public function reviewView($id){
        $item = Review::where('product_id' , $id)->latest()->get();
        return view('backend.review.review_view' , compact('item'));
    }

    public function reviewApprove($id){
        Review::findOrFail($id)->update([
            'status' => 1
        ]);

       return redirect()->back();
    }

    public function reviewDelete($id){
        Review::findOrFail($id)->delete();
        return redirect()->back();
    }



    public function RepotsDashByDate($id){
        
        $orders = Order::where('order_date' , $id)->latest()->get();
        return view('backend.repots.report_detail' , compact('orders'));
    }

    public function RepotsDashByMonth($id){
        $year = date('Y');
        $orders = Order::where('order_month' , $id)->where('order_year' , $year)->latest()->get();
        return view('backend.repots.report_detail' , compact('orders'));
    }

    public function RepotsDashByYear($id){
     
     
        $orders = Order::where('order_year' , $id)->latest()->get();
       return view('backend.repots.report_detail' , compact('orders'));
    }

}
