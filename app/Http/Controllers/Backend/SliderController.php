<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Contact;
use Carbon\Carbon;
use Image; 
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

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
            'message' => 'Slider inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('manage.slider')->with($notification);

    }

    public function SliderInactive($id){
        Slider::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Slider Inactive Successfully',
            'alert-type' => 'warning'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderActive($id){
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Slider Active Successfully',
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
            'message' => ' Slider Update Successfully',
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
            'message' => ' Slider Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('manage.slider')->with($notification);
    }

    public function ContactView(){
        $contacts = Contact::orderBy('id' , 'DESC')->get();
        return view('backend.Contact.contact_view' , compact('contacts'));
    }

    public function ContactDelete($id){
        Contact::findOrFail($id)->delete();

        $notification = array(
            'message' => ' Contact Massage Delete Successfully',
            'alert-type' => 'error'
        );

        return redirect()->route('manage.contact')->with($notification);
    }

    public function ContactShow($id){
        $massage = Contact::findOrFail($id);
        return view('backend.Contact.contactMass_view' , compact('massage'));

    }

    public function ContactReply($id){

        $contact = Contact::findOrFail($id);
        return view('backend.Contact.contact_reply' , compact('contact'));
    }

    public function ContactEmail(Request $request){
             
                $data = [                   
                    'subject' => $request->subject,
                    'massage' => $request->massage,
                ];

                Mail::to($request->email)->send(new ContactMail($data));

                $notification = array(
                    'message' => ' Massage Send Successfully',
                    'alert-type' => 'success'
                );
        
                return redirect()->route('manage.contact')->with($notification);

    }
}
