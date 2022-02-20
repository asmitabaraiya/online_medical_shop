<?php

namespace App\Http\Controllers\Backend;
use App\Models\BlogCategory;
use App\Models\BlogPost;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;

class BlogController extends Controller
{
    public function BlogCategoryView(){
        $blogs = BlogCategory::latest()->get();
        return view('backend.Blogs.blog_category_view',compact('blogs'));
    }

    public function BlogCategoryStore(Request $request){

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',
           
        ]);

        BlogCategory::insert([
            'blog_category_name_en' => $request->blog_category_name_en,
            'blog_category_name_hin' => $request->blog_category_name_hin,
            'blog_category_slug_en' => strtolower(str_replace(' ' , '-' , $request->blog_category_name_en)) ,
            'blog_category_slug_hin' => str_replace(' ' , '-' , $request->blog_category_name_hin) ,          
        ]);
        $notification = array(
            'message' => 'Category inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogCategoryEdit($id){
        $blogcategory = BlogCategory::findOrFail($id);
        return view('backend.Blogs.blog_category_edit' , compact('blogcategory'));
    }

    public function BlogCategoryUpdate(Request $request){

        $request->validate([
            'blog_category_name_en' => 'required',
            'blog_category_name_hin' => 'required',
           
        ]);
        $category_id = $request->id;
        echo $category_id;
        BlogCategory::findOrFail($category_id)->update([
                'blog_category_name_en' => $request->blog_category_name_en,
                'blog_category_name_hin' => $request->blog_category_name_hin,
                'blog_category_slug_en' => strtolower(str_replace(' ' , '-' , $request->blog_category_name_en)) ,
                'blog_category_slug_hin' => str_replace(' ' , '-' , $request->blog_category_name_hin) ,               
            ]);
            $notification = array(
                'message' => 'Category update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('blog.category')->with($notification);

    }


    public function BlogCategoryDelete($id){
        
        BlogCategory::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }


    public function BlogPostView(){
        $blogcategory = BlogCategory::latest()->get();
        return view('backend.Blogs.blog_post_add' , compact('blogcategory'));
    }

    public function BlogPostStore(Request $request){
        $request->validate([
            'category_id' => 'required',
            'poast_title_en' => 'required',
            'poast_title_hin' => 'required',
            'poast_details_en' => 'required',
            'poast_details_hin' => 'required',  
            'post_image' => 'required',                      
        ]);

        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/blogPost/'.$name_gen);
        $save_url = 'upload/blogPost/'.$name_gen;

        BlogPost::insert([
            'category_id' => $request->category_id,
            'poast_title_en' => $request->poast_title_en,
            'poast_title_hin' => $request->poast_title_hin,
            'poast_slug_en' => strtolower(str_replace(' ' , '-' , $request->poast_title_en)) ,
            'poast_slug_hin' => str_replace(' ' , '-' , $request->poast_title_hin) , 
            'post_image' => $save_url, 
            'poast_details_en' => $request->poast_title_en,
            'poast_details_hin' => $request->poast_title_hin,        
        ]);
        $notification = array(
            'message' => 'Category inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function BlogPostStoreView(){
        $blogs = BlogPost::latest()->get();
        return view('backend.Blogs.blog_post_view' , compact('blogs'));
    }




    public function BlogPostEdit($id){

        $blogcategory = BlogCategory::latest()->get();
        $blogPost = BlogPost::findOrFail($id);
        //echo $brand->id;
        return view('backend.Blogs.blog_post_edit' , compact('blogPost' , 'blogcategory'));
    }

    
    public function BlogPostUpdate(Request $request){
        $request->validate([
            'category_id' => 'required',
            'poast_title_en' => 'required',
            'poast_title_hin' => 'required',
            'poast_details_en' => 'required',
            'poast_details_hin' => 'required',                                    
        ]);
        
        $blog_id = $request->id;
       // echo $brand_id;
        $old_image = $request->old_image;
        if($request->file('post_image')){

            @unlink($old_image);
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/blogPost/'.$name_gen);
            $save_url = 'upload/blogPost/'.$name_gen;

            BlogPost::findOrFail($brand_id)->update([
                'category_id' => $request->category_id,
                'poast_title_en' => $request->poast_title_en,
                'poast_title_hin' => $request->poast_title_hin,
                'poast_slug_en' => strtolower(str_replace(' ' , '-' , $request->poast_title_en)) ,
                'poast_slug_hin' => str_replace(' ' , '-' , $request->poast_title_hin) ,
                'poast_details_en' => $request->poast_details_en,
                'poast_details_hin' => $request->poast_details_hin,
                'post_image' => $save_url
            ]);
            $notification = array(
                'message' => 'Brand update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('blog.post.view')->with($notification);
            
        }
        else{

            BlogPost::findOrFail($brand_id)->update([
                'category_id' => $request->category_id,
                'poast_title_en' => $request->poast_title_en,
                'poast_title_hin' => $request->poast_title_hin,
                'poast_slug_en' => strtolower(str_replace(' ' , '-' , $request->poast_title_en)) ,
                'poast_slug_hin' => str_replace(' ' , '-' , $request->poast_title_hin) ,
                'poast_details_en' => $request->poast_details_en,
                'poast_details_hin' => $request->poast_details_hin,
               
               
            ]);
            $notification = array(
                'message' => 'Brand update Successfully',
                'alert-type' => 'info'
            );

            return redirect()->route('blog.post.view')->with($notification);
        }
    }

    public function BlogPostDelete($id){
        $BlogPost = BlogPost::findOrFail($id);
        $img = $BlogPost->post_image;
        unlink($img);

        BlogPost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Brand delete Successfully',
            'alert-type' => 'info'
        );

        return redirect()->back()->with($notification);
    }

}
