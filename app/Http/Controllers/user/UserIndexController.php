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
use App\Models\Review;
use App\Models\BlogPost;
use App\Models\Contact;
use Auth;
use Carbon\Carbon;

class UserIndexController extends Controller
{
    public function Index(){
        
        $categorys = Category::orderBy('category_name_en', 'ASC')->get();
        $slider = Slider::where('status' , 1)->orderBy('id' , 'DESC')->limit(3)->get();
        $products = Product::where('status' , 1)->where('special_deals' , 1)->orderBy('id' , 'DESC')->limit(4)->get();
        $brands = Brand::orderBy('brand_name_en', 'ASC')->get();
        $blogs = BlogPost::latest()->limit(3)->get();
        $health = Product::where('category_id' ,13 )->where('status' , 1)->get();
        $medicines = Product::where('category_id' ,12 )->where('status' , 1)->get();
        $devices = Product::where('category_id' ,21 )->where('status' , 1)->get();
        return view('castomer.index' , compact('slider' ,'devices' ,'blogs' ,'products' , 'categorys' ,'brands' , 'health' , 'medicines' ));
    }

    public function ProductDetail($id , $slug){

        $reviews = Review::where('product_id' , $id)->where('status' , 1)->latest()->get();
        $product = Product::findOrFail($id);
        $multiImg = MultiImg::where('product_id' , $product->id)->get();
        $size = $product->product_size_en;
        $product_size_en = explode(',' , $size);           
        return view('castomer.product_detail' , compact('product' , 'multiImg' , 'product_size_en' , 'reviews') );
        
    }

    public function ProductCatwise(Request $request ,  $id){
        // $products = Product::query();
        // if(!empty($_GET['category'])){
        //     $slug = $_GET['category'];
        //     $cat = Category::where('category_slug_en' , $slug)->first()->get();
        //     $products = Product::where('category_id' , $cat->id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(3);
        // }
        
        
         // $brands = Product::where('category_id' , $id)->orderBy('id' , 'DESC')->get();
        // $subcat = SubCategory::where('category_id' , $id)->orderBy('id' , 'DESC')->get();
        // $subsubcat = SubSubCategory::where('category_id' , $id)->orderBy('id' , 'DESC')->get();

        $title = Category::findOrFail($id);        
        $products = Product::where('category_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(3);
        $subsubCat = SubSubCategory::where('category_id' , $id)->orderBy('subsubcategory_name_en')->get();  

        // load more with ajax
        if($request->ajax()){
            $product_view = view('castomer.product_loadmore_with_ajax' , compact('products'))->render();
            return response()->json(['product_view' => $product_view]);
        }


        return view('castomer.categorywise_product' , compact('products' , 'title' , 'subsubCat'  ));
    }

    public function ProductSubCatwise($id){
 
         $sub_id = SubCategory::findOrFail($id);
         $title = Category::findOrFail($sub_id->category_id);
         $subcat = SubCategory::where('category_id' , $sub_id->category_id)->orderBy('id' , 'DESC')->get();
         $products = Product::where('subcategory_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(3);
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

        $size = $product->product_size_en;
        $product_size_en = explode(',' , $size);

        return response()->json(array(
            'product' => $product,
            'size' => $product_size_en,
         ));


    }

    public function ProductSearch(Request $request){
        $request->validate([
            "search" => "required"
        ]);
        $item = $request->search;
        $product = Product::where('product_name_en' , 'LIKE' ,"%$item%")->get()->first();
        $products = Product::where('product_name_en' , 'LIKE' ,"%$item%")->get();
        $title = Category::findOrFail($product->category_id);
        $subcat = SubCategory::where('category_id' , $product->category_id)->orderBy('id' , 'DESC')->get();

        return view('castomer.product_search',compact('products' , 'title' , 'subcat'));

    }

    public function AdvanceProductSearch(Request $request){
        $request->validate([
            "search" => "required"
        ]);
        $item = $request->search;
        $product = Product::where('product_name_en' , 'LIKE' ,"%$item%")->get()->first();
        $products = Product::where('product_name_en' , 'LIKE' ,"%$item%")->select('product_name_en' , 'product_thumbnail')->limit(7)->get();
        $title = Category::findOrFail($product->category_id);
        $subcat = SubCategory::where('category_id' , $product->category_id)->orderBy('id' , 'DESC')->get();

        return view('castomer.product_search_product',compact('products' , 'title' , 'subcat'));
    }






    public function subcatFilter(Request $request , $cid , $sid ){
        $tid = $cid;
        $title = Category::findOrFail($tid);     
        $titleSubCat = SubCategory::findOrFail($sid);    
        $id = $sid;
        $products = Product::where('subcategory_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(3);
        $subsubCat = SubSubCategory::where('subcategory_id' , $id)->orderBy('subsubcategory_name_en')->get();  

        // dd($products->all());
        // load more with ajax
        if($request->ajax()){
            $product_view = view('castomer.product_loadmore_with_ajax' , compact('products'))->render();
            return response()->json(['product_view' => $product_view]);
        }

       return view('castomer.categorywise_product' , compact('products' , 'title' , 'subsubCat' , 'titleSubCat' ));   
    }





    public function subsubcatFilter(Request $request , $cid , $sid , $ssid){
        $tid = $cid;
        $title = Category::findOrFail($tid);     
        $titleSubCat = SubCategory::findOrFail($sid); 
        $titleSubSubCat =  SubSubCategory::findOrFail($ssid); 
        // echo  $titleSubSubCat;   
        $id = $ssid;
        $products = Product::where('subsubcategory_id' , $id)->where('status' , 1)->orderBy('id' , 'DESC')->paginate(3);
        $subsubCat = SubSubCategory::where('subcategory_id' , $sid)->orderBy('subsubcategory_name_en')->get();  

        
        // load more with ajax
        if($request->ajax()){
            $product_view = view('castomer.product_loadmore_with_ajax' , compact('products'))->render();
            return response()->json(['product_view' => $product_view]);
        }

      return view('castomer.categorywise_product' , compact('products' , 'title' , 'subsubCat' , 'titleSubCat' , 'titleSubSubCat' ));   
    }






    public function contactPage(){
        return view('castomer.contact');
    }

    public function contactStore(Request $request){
        $request->validate([
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        Contact::insert([
            'user_id' => Auth::id(),
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect('/');
    }
}
