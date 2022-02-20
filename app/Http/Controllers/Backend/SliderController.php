<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Carbon\Carbon;
use Image; 

class SliderController extends Controller
{
    public function SliderView(){
        $slider = Slider::latest()->get();
        return view('backend.slider.slider_view' , compact('slider'));
    }

    public function SliderStore(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slider_img' => 'required'
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.slider')->with($notification);

    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function SliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('backend.slider.slider_edit' , compact('slider'));
    }

    public function SliderUpdate(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slider_img' => 'required'
        ]);
        
        $id = $request->id;

        if($request->file('slider_img')){

                $delImg = $request->old_image;
                @unlink('delImg');

                $image = $request->file('slider_img');
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                Image::make($image)->resize(917,1000)->save('upload/slider/'.$name_gen);
                $save_url = 'upload/slider/'.$name_gen;

                Slider::findOrFail($id)->update([
                    'title' => $request->title,
                    'description' => $request->description,
                    'slider_img' => $save_url,
                ]); 
        }
        
        else{
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
               
            ]); 

        }

        $notification = array(
            'message' => ' Product Edit Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.slider')->with($notification);
    }

    public function SliderDelete($id){
        $img = Slider::findOrFail($id);
        $delImg = $img->slider_img;
        @unlink($delImg);

        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => ' Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('manage.slider')->with($notification);
    }

}
