<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use Carbon\Carbon;
use Image; 
use App\Models\MultiImg;

class ProductController extends Controller
{
    public function AddProduct(){
        $category = Category::latest()->get();
        $brand = Brand::latest()->get();
        return view('backend.product.product_add' , compact('category' , 'brand'));
        }

      // drop down subCategory
    public function GetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en' , 'ASC')->get();
        return json_encode($subcat); 
    }

    // drop down subsubCategory
    public function GetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en' , 'ASC')->get();
        return json_encode($subsubcat); 
    }

    public function ProductStore(Request $request){

        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subsubcategory_id' => 'required',
            'subcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_size_en' => 'required',
            'discount_price' => 'numeric',
            'selling_price' => 'required|numeric',
            'product_thumbnail' => 'required',
            'short_descp_en' => 'required',
        ]);


        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
        $save_url = 'upload/product/thambnail/'.$name_gen;

        $product_id=Product::insertGetId([
                    'brand_id' => $request->brand_id,
                    'category_id' => $request->category_id,
                    'subcategory_id' => $request->subcategory_id,
                    'subsubcategory_id' => $request->subsubcategory_id,
                    'product_name_en' => $request->product_name_en,
                    'product_slug_en' => strtolower(str_replace(' ' , '-' , $request->product_name_en)) ,
                    'product_code' => $request->product_code,
                    'product_qty' => $request->product_qty,
                    'product_size_en' => $request->product_size_en,
                    'product_color_en' => $request->product_color_en,
                    'selling_price' => $request->selling_price,
                    'discount_price' => $request->discount_price,
                    'product_thumbnail' => $save_url,
                    'short_descp_en' => $request->short_descp_en,
                    'long_descp_en' => $request->long_descp_en,
                    'hot_deals' => $request->hot_deals,
                    'featured' => $request->featured,
                    'special_offer' => $request->special_offer,
                    'special_deals' => $request->special_deals,
                    'status' => 1,
                    'created_at' => Carbon::now(),
                ]);

        // multiple image upload 
        $images = $request->file('multi_image');
        foreach ($images as $img) {
            $name_make = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$name_make);
            $upload_url = 'upload/product/multi-img/'.$name_make;
            MultiImg::insert([
                'product_id' => $product_id ,
                'photo_name' => $upload_url,
                'created_at' => Carbon::now(),
            ]);   
        }
        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductManage(){
        $products = Product::latest()->get();
        return view('backend.product.product_view' , compact('products'));
    }

    public function ProductEdit($id){
        $brand = Brand::latest()->get();
        $category  = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id' , $id)->get();
        return view('backend.product.product_edit', compact('brand' , 'category' , 'subcategory' , 'subsubcategory' ,'product' ,'multiImg' ));
    }

    // drop down subCategory Edit
    public function EditGetSubCategory($category_id){
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en' , 'ASC')->get();
        return json_encode($subcat); 
    }

    // drop down subCategory Edit
    public function EditGetSubSubCategory($subcategory_id){
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en' , 'ASC')->get();
        return json_encode($subsubcat); 
    }

   
    public function ProductUpdate(Request $request){

        $request->validate([
            'brand_id' => 'required',
            'category_id' => 'required',
            'subsubcategory_id' => 'required',
            'subcategory_id' => 'required',
            'product_name_en' => 'required',
            'product_code' => 'required',
            'product_qty' => 'required',
            'product_size_en' => 'required',
            'discount_price' => 'numeric|numeric',
            'selling_price' => 'required|numeric',           
            'short_descp_en' => 'required',
        ]);

        $id = $request->id;
        Product::findOrFail($id)->update([
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ' , '-' , $request->product_name_en)) ,
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_size_en' => $request->product_size_en,
            'product_color_en' => $request->product_color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_descp_en' => $request->short_descp_en,
            'long_descp_en' => $request->long_descp_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductMultiImgUpdate(Request $request){
        $imgs = $request->multi_img;

        foreach ($imgs as $id => $img) {
            $imgDel = MultiImg::findOrFail($id);
            @unlink($imgDel->photo_name);
           
            $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/product/multi-img/'.$name_gen);
            $save_url = 'upload/product/multi-img/'.$name_gen;

            MultiImg::where('id' , $id)->update([
                'photo_name' => $save_url,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product Image Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

    public function ProductThumbImgUpdate(Request $request){
        $pro_id = $request->id;
        $oldImage = $request->old_img;
        $img = $request->file('product_thumbnail');
        @unlink($oldImage);

        $name_gen = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('upload/product/thambnail/'.$name_gen);
        $save_url = 'upload/product/thambnail/'.$name_gen;

        Product::where('id' , $pro_id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Product Image Update Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.manage')->with($notification);
  
    }

    //  Multi Image Delete
    public function ProductMultiImgDelete($id){
        $oldImg = MultiImg::findOrFail($id);
        @unlink($oldImage->photo_name);
        MultiImg::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Product Image Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductInactive($id){
        Product::findOrFail($id)->update([
            'status' => 0
        ]);
        $notification = array(
            'message' => 'Product Inactive Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('product.manage')->with($notification);
    }

    public function ProductActive($id){
        Product::findOrFail($id)->update([
            'status' => 1
        ]);
        $notification = array(
            'message' => 'Product Active Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }


    public function ProductDelete($id){
        $product = Product::findOrFail($id);
        @unlink($product->product_thumbnail);
        Product::findOrFail($id)->delete();

        $image = MultiImg::where('product_id' , $id)->get();
        foreach ($image as $img) {
            @unlink($img->photo_name);
            MultiImg::where('product_id' , $id)->delete();
        }
        $notification = array(
            'message' => 'Product Delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);

    }

    public function ProductPreview($id){
        $brand = Brand::latest()->get();
        $category  = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        $subsubcategory = SubSubCategory::latest()->get();
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id' , $id)->get();
        return view('backend.product.product_preview', compact('brand' , 'category' , 'subcategory' , 'subsubcategory' ,'product' ,'multiImg' ));   

    }
}
