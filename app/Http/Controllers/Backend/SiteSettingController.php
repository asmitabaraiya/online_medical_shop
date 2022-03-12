<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Image;
use App\Models\SEOsetting;

class SiteSettingController extends Controller
{
    public function SettingUpdate(){
        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update' , compact('setting'));
    }

    public function SettingEdit(Request $request){
        $request->validate([
            'company_name' => 'required',
            'email' => 'required|email',
            'phone_one' => 'required|numeric|digits:10',
            'phone_two' => 'required|numeric|digits:10',
            'company_address' => 'required',           
            'facebook' => 'required',
            'twitter' => 'required',            
            'youtube' => 'required',            
            'linkedin' => 'required',            
        ]);

       

        $old_image = $request->old_image;
        if($request->file('logo')){

            @unlink($old_image);
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(139,36)->save('upload/setting_logo/'.$name_gen);
            $save_url = 'upload/setting_logo/'.$name_gen;

            SiteSetting::findOrFail(1)->update([
                'company_name' => $request->company_name,
                'email' => $request->email, 
                'phone_one' => $request->phone_one,                
                'phone_two' => $request->phone_two,                
                'company_address' => $request->company_address,                
                'facebook' => $request->facebook,                
                'twitter' => $request->twitter,  
                'youtube' => $request->youtube,                
                'linkedin' => $request->linkedin,                
                'logo' => $save_url
            ]);
            $notification = array(
                'message' => 'Settings update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('setting.manage')->with($notification);
            
        }
        else{

            SiteSetting::findOrFail(1)->update([
                'company_name' => $request->company_name,
                'email' => $request->email, 
                'phone_one' => $request->phone_one,                
                'phone_two' => $request->phone_two,                
                'company_address' => $request->company_address,                
                'facebook' => $request->facebook,                
                'twitter' => $request->twitter,  
                'youtube' => $request->youtube,                
                'linkedin' => $request->linkedin, 
               
            ]);
            $notification = array(
                'message' => 'Settings update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('setting.manage')->with($notification);
        }        
    }

    public function SettingSEO(){
            $seo = SEOsetting::findOrFail(1);
            return view('backend.setting.seo_update', compact('seo'));
    }

    
    public function SEOEdit(Request $request){
        $id = $request->id;
        $request->validate([
            'meta_title' => 'required',                     
            'meta_author' => 'required',
            'meta_keyword' => 'required',            
            'meta_description' => 'required',            
            'google_analytics' => 'required',            
        ]);
 
            SEOsetting::findOrFail($id)->update([
                'meta_title' => $request->meta_title,
                'meta_author' => $request->meta_author, 
                'meta_keyword' => $request->meta_keyword,                
                'meta_description' => $request->meta_description,                
                'google_analytics' => $request->google_analytics,                                                
            ]);
            $notification = array(
                'message' => 'Settings update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('setting.seo')->with($notification);
                
    }

}
