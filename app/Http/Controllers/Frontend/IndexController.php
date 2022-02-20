<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\MultiImg;

use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $slider = Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
        $products = Product::where('status' , 1)->orderBy('id' , 'DESC')->limit(6)->get();
        return view('castomer.index' , compact('slider' , 'products' , 'categorys' ));
    }

    public function UserLogout(){
        Auth::logout();
        return Redirect()->route('login');
    }

    public function UserProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('castomer.profile.user_profile', compact('user'));
    }

    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'User Profile Update Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);
    }

    public function UserProfileChangePassword(){
        return view('castomer.profile.change_password');
    }

    public function UserPasswordUpdate(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        $validatedata = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed|min:8', 
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword , $hashedPassword)){
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

            $notification = array(
                'message' => 'New Password Update Successfully',
                'alert-type' => 'success'
            );    
            return redirect()->route('user.logout')->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Please type valid password',
                'alert-type' => 'success'
            ); 
            return redirect()->back()->with($notification);
        }

    }

    

   
}

