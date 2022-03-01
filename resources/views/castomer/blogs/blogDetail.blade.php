@include('castomer.comman.product_modal')

@extends('castomer.main_master')

@section('title')
  Pharmative - Detail Blog 
@endsection

@section('body')

<div class="main_menu ">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">  Home  </a></li>
          <li class="breadcrumb-item" aria-current="page"> <a href="{{url('/blog')}}">  Blogs  </a>  </li>
          <li class="breadcrumb-item" aria-current="page">   {{$post->poast_title_en}}   </li>
        </ol>      
    </div>


  <!--================Blog Area =================-->
  <section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
            <div class="row">
                    <div class="col-lg-8 posts-list">
                            <div class="single-post row">
                                    <div class="col-lg-12">
                                            <div class="feature-img">
                                                    <img class="img-fluid" src="{{asset($post->post_image)}}" alt="" style="width: 730; height:340.66px;">
                                            </div>
                                    </div>
                                    <div class="col-lg-3  col-md-3">
                                            <div class="blog_info text-right">
                                                    <div class="post_tag">                                                            
                                                            <a class="active mx-4" >{{$post->blogPostName->blog_category_name_en}}</a>                                                           
                                                    </div>
                                                    <ul class="blog_meta list">
                                                            <li>
                                                                    <a href="#">By Admin
                                                                            <i class="ti-user"></i>
                                                                    </a>
                                                            </li>
                                                            <li>
                                                                    <a href="#">{{Carbon\Carbon::parse($post->created_at)->diffForHumans()}}
                                                                            <i class="ti-calendar"></i>
                                                                    </a>
                                                            </li>
                                                           
                                                            <li>
                                                                    <a href="#">{{count($comments)}} Comments
                                                                            <i class="ti-comment"></i>
                                                                    </a>
                                                            </li>
                                                    </ul>
                                                    
                                            </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 blog_details">
                                            <h2>{{$post->poast_title_en}}</h2>
                                            <p class="excert">
                                                    {!! $post->poast_details_en !!}
                                            </p>                                            
                                    </div>
                                    <ul class="social-links" >                                                               
                                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                        <div class="addthis_inline_share_toolbox_8ojg" style="float: right;"></div>
                                    </ul>
                            </div>
                           

                            <div class="comments-area">
                                    <h4>{{count($comments)}} Comments</h4>

                                @foreach ($comments as $item )                                                                        
                                        <div class="comment-list" >
                                                <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                                <div class="thumb">
                                                                        @if ($item->users->profile_photo_path)
                                                                                <img src="{{asset('upload/user_images/'.$item->users->profile_photo_path)}}" style="height: 60px; width:60px;" alt="">       
                                                                        @else
                                                                                <img src="{{asset('upload/no_image.jpg')}}" style="height: 60px; width:60px;" alt="">                                                                                
                                                                        @endif
                                                                </div>
                                                                <div class="desc">
                                                                        <h5>
                                                                                <a href="">{{$item->users->name}}</a>
                                                                        </h5>
                                                                        <p class="date">{{ Carbon\Carbon::parse($item->created_at)->format('D , d M Y')}}  </p>
                                                                        <p class="comment">
                                                                                {{$item->message}}
                                                                        </p>
                                                                </div>
                                                        </div>

                                                </div>
                                        </div>

                                        @if ($item->reply != 0)
                                                <div class="comment-list left-padding">
                                                        <div class="single-comment justify-content-between d-flex">
                                                                <div class="user justify-content-between d-flex" style="padding-left: 100px;">
                                                                        <div class="thumb">
                                                                                <img src="{{asset('upload/no_image.jpg')}}" style="height: 50px; width:50px;" alt="">                                                                                

                                                                        </div>
                                                                        <div class="desc">
                                                                                <h5>
                                                                                        <a href="#">By Admin</a>
                                                                                </h5>
                                                                                <p class="date">{{ Carbon\Carbon::parse($item->reply_date)->format('D , d M Y')}}  </p>
                                                                                <p class="comment">
                                                                                        {{$item->reply}}
                                                                                </p>
                                                                        </div>
                                                                </div>
                                                                
                                                        </div>
                                                </div><hr><div class="br"></div>
                                        @endif        
                                @endforeach
                                                                      
                            </div>

                            <div class="comment-form">
                                    <h4>Leave a Reply</h4>
                                    <form method="POST" action="{{route('blog.comment')}}">  
                                        @csrf        
                                                <input type="hidden" name="blog_post_id" value="{{$post->id}}">                                                                              
                                            <div class="form-group">
                                                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                                            ></textarea>
                                            </div>
                                            <button class="button button-postComment button--active">Post Comment</button>
                                    </form>
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



<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6215c03ec5709e90"></script>


@endsection
