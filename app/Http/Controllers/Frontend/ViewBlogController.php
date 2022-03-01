<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\BlogComment;
use Auth;
use Carbon\Carbon;


class ViewBlogController extends Controller
{
    public function BlogView(){
        $blogCat = BlogCategory::latest()->limit(7)->get();
        $popular = BlogPost::orderBy('id')->limit(4)->get();
        $blogs = BlogPost::latest()->orderBy('id' , 'DESC')->paginate(2);
        return view('castomer.blogs.blog',compact('blogs' , 'blogCat' ,'popular'));
    }

    public function BlogDetailView($id){
        $comments = BlogComment::where('blog_post_id' , $id)->orderBy('id')->get();
        $popular = BlogPost::orderBy('id')->limit(4)->get(); 
        $blogCat = BlogCategory::latest()->limit(7)->get();
        $post = BlogPost::findOrFail($id);
        return view('castomer.blogs.blogDetail' , compact('post' , 'blogCat' , 'popular' , 'comments'));
    }

    public function BlogCategoryView($id){
        $blogCat = BlogCategory::latest()->limit(7)->get();
        $popular = BlogPost::orderBy('id')->limit(4)->get();
        $blogs = BlogPost::where('category_id',$id)->orderBy('id' , 'DESC')->paginate(2);
        return view('castomer.blogs.blog',compact('blogs' , 'blogCat','popular'));
    }

    public function PostComment(Request $request){
        $request->validate([
            'message' => 'required',            
        ]);

        BlogComment::insert([
            'user_id' => Auth::id(),
            'blog_post_id' => $request->blog_post_id,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->back();
    }
}
