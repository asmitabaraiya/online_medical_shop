<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
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
        $multiImg = MultiImg::where('product_id' , $product->id)->get();;              
        return view('castomer.product_detail' , compact('product' , 'multiImg') );
        
    }
}
