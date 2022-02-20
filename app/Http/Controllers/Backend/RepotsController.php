<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;
use App\Models\User;

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
}
