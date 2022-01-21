<div class="site-navbar py-2">

<div class="search-wrap">
    <div class="container">
        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        <form action="#" method="post">
            <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
        </form>
    </div>
</div>

<div class="container">
    <div class="d-flex align-items-center justify-content-between">
        <div class="logo">
            <div class="site-logo">
                <a href="index.html" class="js-logo-clone"><strong
                        class="text-primary">Pharma</strong>tive</a>
            </div>
        </div>
        <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="active"><a href="index.html">
                                    @if(session()->get('language') == 'hindi')
                                        घर
                                    @else
                                        Home
                                    @endif   
                                       </a></li>
                    <li><a href="shop.html">  @if(session()->get('language') == 'hindi')  दुकान  @else Store @endif</a></li>
                    <li class="has-children">
                        <a href="#">@if(session()->get('language') == 'hindi')  उत्पादों  @else  Products @endif </a>
                        <ul class="dropdown">
                            @php  
                            $categorys = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                            @endphp
                            @foreach ($categorys as $category )
                                <li><a href="#"> @if(session()->get('language') == 'hindi')  {{$category->category_name_hin}}  @else {{$category->category_name_en}} @endif </a></li>
                            @endforeach
                           
                            
                        </ul>
                    </li>
                    <li><a href="about.html"> @if(session()->get('language') == 'hindi')  हमारे बारे में  @else About @endif </a></li>
                    <li><a href="contact.html">@if(session()->get('language') == 'hindi')  संपर्क  @else Contact @endif </a></li>

                    <li class="has-children">
                        <a href="#"> @if(session()->get('language') == 'hindi')  हिंदी  @else  English  @endif    </a>
                        <ul class="dropdown">                           
                            @if(session()->get('language') == 'hindi')
                                <li><a href="{{route('english.language')}}">English</a></li>
                             @else
                                <li><a href="{{route('hindi.language')}}">हिंदी</a></li>
                             @endif                                                     
                        </ul>
                    </li>

                   

                </ul>
            </nav>
        </div>
        <div class="icons">
            <a href="#" class="icons-btn d-inline-block js-search-open"><span
                    class="icon-search"></span></a>
            <a href="cart.html" class="icons-btn d-inline-block bag">
                <span class="icon-shopping-bag"></span>
                <span class="number">2</span>
            </a>
            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                    class="icon-menu"></span></a>
        </div>
    </div>
</div>
</div>