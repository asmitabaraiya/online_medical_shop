 <!--================ Start Header Menu Area =================-->
 <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          @php
             $settings =  App\Models\SiteSetting::findOrFail(1);
          @endphp
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{asset($settings->logo)}}" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar">aa</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}"> Home  </a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">  Category  </a>
                <ul class="dropdown-menu">
                    @php  
                         $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                    @foreach ($categorys as $category )
                        <li class="nav-item subsubmenu dropdown"><a class="nav-link" href="{{url('/product/categorywise/'.$category->id.'/'.$category->category_slug_en)}}">   {{$category->category_name_en}}  </a>
                        </li>
                    @endforeach

                  
                </ul>
              </li>

            

             <li class="nav-item submenu dropdown">
                <a href="{{route('blogPage.view')}}" class="nav-link dropdown-toggle"> Blog  </a>                        
              </li>
              
            
              <li class="nav-item"><a class="nav-link" href="{{route('contact.page')}}">Contact </a></li> 

              <li class="nav-item"><a class="nav-link" data-bs-toggle="modal" href="" data-bs-target="#OrderTrack" >Order Track </a></li> 

            
              

              {{-- MINI Cart ==================================================================================================== --}}
              {{-- <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false"><i class="ti-shopping-cart"></i> </a>
            
                <ul class="dropdown-menu" id="miniCart" >

                </ul>
              </li> --}}

              
            </ul>
            <div class="search-area">
            <ul class="nav-shop nav navbar-nav " >
             
                <form action="{{route('product.search')}}" method="POST">
                  @csrf
                  <li class="nav-item" style="margin-right: 5px;" > <input type="text" name="search" id="search" class="form-control" onfocus="search_show()" onblur="search_hide()" placeholder="Search" ></li>

                  <li class="nav-item" style="margin-left: 5px; margin-top: 10px; margin-right: 40px; " ><button type="submit"><i class="ti-search"></i></button></li>
                </form>
             
              
              <div id="SearchList" class="my-4">

              </div>

              <li class="nav-item"  style="margin-right: 10px;  margin-top: 10px;"> <a href="{{route('myCart')}}"> <button><i class="ti-shopping-cart"></i><span class="nav-shop__circle" id="cart_qty">  </span></button></a> </li>
              <li class="nav-item" style="margin-top: 10px;"><a href="{{route('wishlist')}}"><button><i class="ti-heart"></i></button></a></li>              
            </ul>
            </div>
           
            
                        
          </div>          
        </div>  


        


        <ul class="nav navbar-nav menu_nav ml-auto mr-auto" style="float: right;">
          @auth
            <li class="nav-item" style="margin-right: 10px;"><a class="nav-link" href="{{ route('dashboard') }}">{{ Auth::user()->name }}</a></li> 
            <li class="nav-item" style="margin-right: 10px; margin-top: 20px; "> 
              <img class="author_img rounded-circle" style="border-radius: 50%"  width= "45px" height="45px" src="{{ (!empty(Auth::user()->profile_photo_path))?url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}" alt="">            
            </li>  


            @else
            <li class="nav-item" style="margin-right: 4px;"><a class="nav-link" href="{{route('login')}}">Login </a></li> 
            <li class="nav-item" style="margin-right: 4px;"><a class="nav-link"> / </a></li>
            <li class="nav-item"><a class="nav-link" href="{{route('register')}}"> Registration </a></li>
          @endauth
        </ul>   

      </nav>





       
    </div>
</header>
	<!--================ End Header Menu Area =================-->

  <style>
    .search-area{
      position: relative;
    }
  
  
    #SearchList{
      position: absolute;
      top: 100%;
      left : 0;
      width:100%;
      background: #ffffff;
      z-index: 999;
      border-radius: 8px;
      margin-top: 5px;
    }
  </style>

<script>
  function search_show(){
   $("#SearchList").slideDown();
   
  }

  function search_hide(){

   $("#SearchList").slideUp();
  }
</script>
  