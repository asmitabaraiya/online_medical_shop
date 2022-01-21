 <!--================ Start Header Menu Area =================-->
 <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="{{url('/')}}"><img src="{{asset('castomer')}}/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">@if(session()->get('language') == 'hindi')
                घर
            @else
                Home
            @endif  </a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">  @if(session()->get('language') == 'hindi')  उपकरणों  @else Devices @endif </a>
                <ul class="dropdown-menu">
                    @php  
                         $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                    @foreach ($categorys as $category )
                        <li class="nav-item nav-item subsubmenu dropdown"><a class="nav-link" href="category.html"> @if(session()->get('language') == 'hindi')  {{$category->category_name_hin}}  @else {{$category->category_name_en}} @endif </a>
                        </li>
                    @endforeach

                  
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">@if(session()->get('language') == 'hindi')  ब्लॉग  @else Blog @endif </a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
                </ul>
							</li>
              
              <li class="nav-item"><a class="nav-link" href="contact.html">@if(session()->get('language') == 'hindi')  संपर्क  @else Contact @endif</a></li>

              <li class="nav-item submenu dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> @if(session()->get('language') == 'hindi')  हिंदी  @else  English  @endif    </a>
                <ul class="dropdown-menu">                           
                    @if(session()->get('language') == 'hindi')
                        <li class="nav-item"><a class="nav-link"  href="{{route('english.language')}}">English</a></li>
                     @else
                        <li class="nav-item"><a class="nav-link" href="{{route('hindi.language')}}">हिंदी</a></li>
                     @endif                                                     
                </ul>
            </li>

            </ul>

            <ul class="nav-shop">
              <li class="nav-item"><button><i class="ti-search"></i></button></li>
              <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
</header>
	<!--================ End Header Menu Area =================-->
