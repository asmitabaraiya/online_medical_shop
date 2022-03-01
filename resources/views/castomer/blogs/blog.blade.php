@include('castomer.comman.product_modal')

@extends('castomer.main_master')

@section('title')
  Pharmative - Blog 
@endsection

@section('body')

<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">  Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Blogs </li>
    </ol>      
</div>

 <!--================Blog Area =================-->
 <section class="blog_categorie_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_left_sidebar">
                    @foreach ($blogs as $blogPost )                                            
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">                                      
                                        <a class="active" href="{{route('blogPage.category.view' , $blogPost->category_id)}}">{{$blogPost->blogPostName->blog_category_name_en}}</a>                                       
                                    </div>
                                    <ul class="blog_meta list">
                                        <li>
                                            <a href="#">By Admin
                                                <i class="ti-user"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">{{Carbon\Carbon::parse($blogPost->created_at)->diffForHumans()}}
                                                <i class="ti-calendar"></i>
                                            </a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{asset($blogPost->post_image)}}" style="width: 540px; height:272.43px;"  alt="">
                                    <div class="blog_details">
                                        <a href="{{route('blogPage.detail.view' , $blogPost->id)}}">
                                            <h2>{{$blogPost->poast_title_en}}</h2>
                                        </a>
                                        <p>{!! Str::limit($blogPost->poast_details_en , 200) !!}</p>
                                        <a class="button button-blog " href="{{route('blogPage.detail.view' , $blogPost->id)}}">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                   
                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            {{ $blogs->links('vendor.pagination.custom')}}
                                                      
                        </ul>
                    </nav>
                    


                </div>
            </div>


            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="lnr lnr-magnifier"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                 

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        @foreach ($popular as $item )
                            <div class="media post_item">
                                <img src="{{asset($item->post_image)}}" alt="post" style="width: 100; height:60px;">
                                <div class="media-body">
                                    <a href="{{route('blogPage.detail.view' , $item->id)}}">
                                        <h3>{{$item->poast_title_en}}</h3>
                                    </a>
                                    <p>{{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}</p>
                                </div>
                            </div>
                        @endforeach 
                        <div class="br"></div>
                    </aside>

                  
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            @foreach ($blogCat as $BlogCategory )                                                            
                                <li>
                                    <a href="{{route('blogPage.category.view' , $BlogCategory->id)}}" class="d-flex justify-content-between">
                                        <p>{{$BlogCategory->blog_category_name_en}}</p>                                       
                                    </a>
                                </li>
                            @endforeach                                
                        </ul>
                        <div class="br"></div>
                    </aside>

                   
                </div>
            </div>


        </div>
    </div>
</section>
<!--================Blog Area =================-->




@endsection
