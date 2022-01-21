<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MedicinCategory;
use App\Models\Brand;
use App\Models\MedicineMultiImg;
use App\Models\Medicine;
use Carbon\Carbon;
use Image; 

class MedicinCategoryController extends Controller
{
    public function MedicinCategoryView(){
        $medicinCategory = MedicinCategory::latest()->get();
        return view('backend.Medicine_category.medicine_category_view' , compact('medicinCategory'));
    }

    public function MedicineCategoryStore(Request $request){
        $request->validate([
            'medicine_category_name_en' => 'required',
            'medicine_category_name_hin' => 'required',
           
        ]);
        MedicinCategory::insert([
            'medicine_category_name_en' => $request->medicine_category_name_en,
            'medicine_category_name_hin' => $request->medicine_category_name_hin,
            'medicine_category_slug_en' => strtolower(str_replace(' ' , '-' , $request->medicine_category_name_en)) ,
            'medicine_category_slug_hin' => str_replace(' ' , '-' , $request->medicine_category_name_hin) ,
          
        ]);
        $notification = array(
            'message' => 'Category inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function MedicineCategoryEdit($id){
        $medicinCategory = MedicinCategory::findOrFail($id);
        return view('backend.Medicine_category.medicine_category_edit' , compact('medicinCategory'));
    }

    public function MedicineCategoryUpdate(Request $request){
        $medicine_category_id = $request->id;
       
        MedicinCategory::findOrFail($medicine_category_id)->update([
                'medicine_category_name_en' => $request->medicine_category_name_en,
                'medicine_category_name_hin' => $request->medicine_category_name_hin,
                'medicine_category_slug_en' => strtolower(str_replace(' ' , '-' , $request->medicine_category_name_en)) ,
                'medicine_category_slug_hin' => str_replace(' ' , '-' , $request->medicine_category_name_hin) ,               
            ]);
            $notification = array(
                'message' => 'Category update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('all.medicine_category')->with($notification);
    }

    public function MedicineCategoryDelete($id){
        MedicinCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function AddMedicine(){
        $medicineCategory = MedicinCategory::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.Medicine.medicine_add' ,compact('brand' , 'medicineCategory'));
    }

    public function MedicineStore(Request $request){
        $image = $request->file('medicine_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/medicine/thambnail/'.$name_gen);
        $save_url = 'upload/medicine/thambnail/'.$name_gen;

        $medicine_id=Medicine::insertGetId([
            'brand_id' => $request->brand_id,
            'medicine_category_id' => $request->medicine_category_id,
            'medicine_name_en' => $request->medicine_name_en,
            'medicine_name_hin' => $request->medicine_name_hin,
            'medicine_slug_en' => strtolower(str_replace(' ' , '-' , $request->medicine_name_en)) ,
            'medicine_slug_hin' => str_replace(' ' , '-' , $request->medicine_name_hin) ,
            'medicine_code' => $request->medicine_code,
            'medicine_qty' => $request->medicine_qty,
            'medicine_tags_en' => $request->medicine_tags_en,
            'medicine_tags_hin' => $request->medicine_tags_hin,
            'medicine_selling_price' => $request->medicine_selling_price,
            'medicine_discount_price' => $request->medicine_discount_price,
            'medicine_thumbnail' => $save_url,
            'medicine_short_descp_en' => $request->medicine_short_descp_en,
            'medicine_short_descp_hin' => $request->medicine_short_descp_hin,
            'medicine_long_descp_en' => $request->medicine_long_descp_en,
            'medicine_long_descp_hin' => $request->medicine_long_descp_hin,
            'medicine_hot_deals' => $request->medicine_hot_deals,
            'medicine_featured' => $request->medicine_featured,
            'medicine_special_offer' => $request->medicine_special_offer,
            'medicine_special_deals' => $request->medicine_special_deals,
            'medicine_px' => $request->medicine_px ,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

         // multiple image upload 
         $images = $request->file('multi_image');
         foreach ($images as $img) {
             $name_make = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
             Image::make($img)->resize(917,1000)->save('upload/medicine/multi-img/'.$name_make);
             $upload_url = 'upload/medicine/multi-img/'.$name_make;
             MedicineMultiImg::insert([
                 'medicine_id' => $medicine_id ,
                 'photo_name' => $upload_url,
                 'created_at' => Carbon::now(),
             ]);   
         }
         $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'info'
        );
    
        return redirect()->route('medicine.manage')->with($notification);
    }

    public function MedicineManage(){
        $medicines = Medicine::latest()->get();
        return view('backend.medicine.medicine_view' , compact('medicines'));
    }

    public function MedicinePreview($id){
       
            $brand = Brand::latest()->get();
            $medicinCategory  = MedicinCategory::latest()->get();
            $medicine = Medicine::findOrFail($id);
            $multiImg = MedicineMultiImg::where('medicine_id' , $id)->get();
            return view('backend.Medicine.medicine_preview', compact('brand' , 'medicinCategory'  ,'medicine' ,'multiImg' ));   
    }

    public function MedicineEdit($id){
        $brand = Brand::latest()->get();
        $medicineCategory  = MedicinCategory::latest()->get();
        $medicine = Medicine::findOrFail($id);
        $multiImg = MedicineMultiImg::where('medicine_id' , $id)->get();
        return view('backend.Medicine.medicine_edit', compact('brand' , 'medicineCategory'  ,'medicine' ,'multiImg' ));
    }

    public function MedicineUpdate(Request $request){
        $id = $request->id;

        Medicine::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'medicine_category_id' => $request->medicine_category_id,
            'medicine_name_en' => $request->medicine_name_en,
            'medicine_name_hin' => $request->medicine_name_hin,
            'medicine_slug_en' => strtolower(str_replace(' ' , '-' , $request->medicine_name_en)) ,
            'medicine_slug_hin' => str_replace(' ' , '-' , $request->medicine_name_hin) ,
            'medicine_code' => $request->medicine_code,
            'medicine_qty' => $request->medicine_qty,
            'medicine_tags_en' => $request->medicine_tags_en,
            'medicine_tags_hin' => $request->medicine_tags_hin,
            'medicine_selling_price' => $request->medicine_selling_price,
            'medicine_discount_price' => $request->medicine_discount_price,
            'medicine_short_descp_en' => $request->medicine_short_descp_en,
            'medicine_short_descp_hin' => $request->medicine_short_descp_hin,
            'medicine_long_descp_en' => $request->medicine_long_descp_en,
            'medicine_long_descp_hin' => $request->medicine_long_descp_hin,
            'medicine_hot_deals' => $request->medicine_hot_deals,
            'medicine_featured' => $request->medicine_featured,
            'medicine_special_offer' => $request->medicine_special_offer,
            'medicine_special_deals' => $request->medicine_special_deals,
            'medicine_px' => $request->medicine_px ,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('medicine.manage')->with($notification);
    }


    public function MedicineMultiImgUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MedicineMultiImg::findOrFail($id);
            @unlink($imgDel->photo_name);
           
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/medicine/multi-img/'.$name_gen);
            $save_url = 'upload/medicine/multi-img/'.$name_gen;

            MedicineMultiImg::where('id' , $id)->update([
                'photo_name' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('medicine.manage')->with($notification);
    }

    public function MedicineThumbImgUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        $img = $request->file('medicine_thumbnail');
        @unlink($oldImage);

        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/medicine/thambnail/'.$name_gen);
        $save_url = 'upload/medicine/thambnail/'.$name_gen;

        Medicine::where('id' , $pro_id)->update([
            'medicine_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Image Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('medicine.manage')->with($notification);
  
    }

    //  Multi Image Delete
    public function MedicineMultiImgDelete($id){
        $oldImg = MedicineMultiImg::findOrFail($id);
        @unlink($oldImage->photo_name);
        MedicineMultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('medicine.manage')->with($notification);
    }




    public function MedicineInactive($id){
        Medicine::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function MedicineActive($id){
        Medicine::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function MedicineDelete($id){
        $medicine = Medicine::findOrFail($id);
        @unlink($medicine->medicine_thumbnail);
        Medicine::findOrFail($id)->delete();

        $image = MedicineMultiImg::where('medicine_id' , $id)->get();
        foreach ($image as $img) {
            @unlink($img->photo_name);
            MedicineMultiImg::where('medicine_id' , $id)->delete();
        }
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

  
}
