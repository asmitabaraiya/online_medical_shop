<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;

class SubCategoryController extends Controller
{
    
    public function SubCategoryView(){
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
       return view('backend.category.subcategory_view' , compact('subcategory' , 'category'));
    }

    public function SubCategoryStore(Request $request){
            $request->validate([
                'subcategory_name_en' => 'required',
                'subcategory_name_hin' => 'required',
                'category_id' => 'required'
            ]);
           
            SubCategory::insert([
                'subcategory_name_en' => $request->subcategory_name_en,
                'subcategory_name_hin' => $request->subcategory_name_hin,
                'subcategory_slug_en' => strtolower(str_replace(' ' , '-' , $request->subcategory_name_en)) ,
                'subcategory_slug_hin' => str_replace(' ' , '-' , $request->subcategory_name_hin) ,
                'category_id' => $request->category_id
            ]);
            $notification = array(
                'message' => 'Category inserted Successfully',
                'alert-type' => 'success'
            );
            
           return redirect()->back()->with($notification);
    }

    public function SubCategoryEdit($id){
        $category = Category::latest()->get();
        $subcategory = SubCategory::findOrFail($id);
        return view('backend.category.subcategory_edit' , compact('subcategory' , 'category'));
    }

    public function SubCategoryUpdate(Request $request){
      
        $id = $request->id;       
        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' =>  $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' =>  strtolower(str_replace(' ' , '-' , $request->subcategory_name_en)) ,
            'subcategory_slug_hin' => str_replace(' ' , '-' , $request->subcategory_name_hin) ,
        ]);
        $notification = array(
            'message' => 'Category update Successfully',
            'alert-type' => 'info'
        );

      return redirect()->route('all.subcategory')->with($notification);

    }

    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    // ================================== Sub SubCategory ==================================================================

    public function SubSubCategoryView(){
        $category = Category::latest()->get();
        $sub_subcategory = SubSubCategory::latest()->get();
       return view('backend.category.subsubcategory_view' , compact('category' , 'sub_subcategory'));

    }

    // drop down subCategory
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en' , 'ASC')->get();
        return json_encode($subcat); 
    }

    public function SubSubCategoryStore(Request $request){
        $request->validate([
            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_hin' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required'
        ]);
       
        SubSubCategory::insert([
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' => strtolower(str_replace(' ' , '-' , $request->subsubcategory_name_en)) ,
            'subsubcategory_slug_hin' => str_replace(' ' , '-' , $request->subsubcategory_name_hin) ,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
       return redirect()->back()->with($notification);
    }

    public function SubSubCategoryEdit($id){

        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::findOrFail($id);
        return view('backend.category.subsubcategory_edit' , compact('subsubcategory' , 'subcategory' ,'category' ));
    }

     // drop down subCategory Edit
     public function EditGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en' , 'ASC')->get();
        return json_encode($subcat); 
    }

    public function SubSubCategoryUpdate(Request $request){
        $id = $request->id;
        
        SubSubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_name_en' =>  $request->subsubcategory_name_en,
            'subsubcategory_name_hin' => $request->subsubcategory_name_hin,
            'subsubcategory_slug_en' =>  strtolower(str_replace(' ' , '-' , $request->subsubcategory_name_en)) ,
            'subsubcategory_slug_hin' => str_replace(' ' , '-' , $request->subsubcategory_name_hin) ,
            
        ]);
        $notification = array(
            'message' => 'Product inserted Successfully',
            'alert-type' => 'success'
        );
        
        return redirect()->route('all.subsubcategory')->with($notification);
    }

    public function SubSubCategoryDelete($id){
        SubSubCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'SubCategory delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }
}
