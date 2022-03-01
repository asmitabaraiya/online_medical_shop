<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Auth;
use Carbon\Carbon;

class ReviewController extends Controller
{
    public function ReviewStore(Request $request){
        $request->validate([
            'subject' => 'required', 
            'message' => 'required',            
        ]);

        Review::insert([
            'product_id' => $request->product_id ,
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->back();
    }
}
