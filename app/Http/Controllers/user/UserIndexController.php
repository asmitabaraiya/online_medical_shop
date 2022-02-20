<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\MultiImg;
use App\Models\Brand;
use App\Models\MedicinCategory;
use App\Models\Medicine;

class UserIndexController extends Controller
{
    public function Index(){
        
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $slider = Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
        $products = Product::where('status' , 1)->where('special_deals' , 1)->orderBy('id' , 'DESC')->limit(8)->get();
        $brands = Brand::orderBy('brand_name_en', 'ASC')->get();

    //    $active_medicine_cat = MedicinCategory::orderBy('id' , 'DESC')->limit(3)->get();

        $active_medicine_cat = MedicinCategory::inRandomOrder()->limit(3)->get();

        $active_cat = Category::where('category_status' , 1)->get()->first();  
        $active_products = Product::where('category_id' , $active_cat->id)->get();
        return view('castomer.index' , compact('slider' , 'products' , 'categorys' ,'brands' , 'active_products' , 'active_cat' , 'active_medicine_cat'));
    }

    public function ProductDetail($id , $slug){

        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id' , $product->id)->get();
        $color = $product->product_color_en;
        $product_color_en = explode(',' , $color);           
        return view('castomer.product_detail' , compact('product' , 'multiImg' , 'product_color_en') );
        
    }

    public function ProductCatwise($id){
        $title = Category::findOrFail($id);
       // $brands = Product::where('category_id' , $id)->orderBy('id' , 'DESC')->get();
        $subcat = SubCategory::where('category_id' , $id)->orderBy('id' , 'DESC')->get();
        //$subsubcat = SubSubCategory::where('category_id' , $id)->orderBy('id' , 'DESC')->get();
        $products = Product::where('category_id' , $id)->orderBy('id' , 'DESC')->paginate(9);
        return view('castomer.categorywise_product' , compact('products' , 'title' , 'subcat'  ));
    }

    public function ProductSubCatwise($id){
         $sub_id = SubCategory::findOrFail($id);
         $title = Category::findOrFail($sub_id->category_id);
         $subcat = SubCategory::where('category_id' , $sub_id->category_id)->orderBy('id' , 'DESC')->get();
         $products = Product::where('subcategory_id' , $id)->orderBy('id' , 'DESC')->paginate(9);
         return view('castomer.categorywise_product' , compact('products' , 'title' , 'subcat'  ));
    
    }

    public function BrandAll($id){
        $brand = Brand::findOrFail($id);
        $id = $brand->id;
        $products = Product::where('brand_id' , $id)->orderBy('id' , 'DESC')->get();
        $categorys = Category::orderBy('id' , 'DESC')->get();
        return view('castomer.brand_all' , compact('id' , 'brand' , 'products' , 'categorys'));
    }

    public function login(){
        return view('castomer.login');
    }

    public function registration(){
        return view('castomer.registration');
    }

    // product view with ajax 
    public function ProductViewAjax($id){
        $product = Product::with('category')->findOrFail($id);

        $color = $product->product_color_en;
        $product_color_en = explode(',' , $color);

        return response()->json(array(
            'product' => $product,
            'color' => $product_color_en,
         ));


    }

}
