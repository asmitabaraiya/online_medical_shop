<!DOCTYPE html>
<html lang="en">

<head>
    <title> @yield('title') </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Google Font -->
     <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

     <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('frontend/assets_new')}}/css/style.css" type="text/css">

    <!-- ============================================== -->


    <link href=" https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('user_assets/fonts/icomoon/style.css')}}">

    <link rel="stylesheet" href=" {{ asset('user_assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href=" {{ asset('user_assets/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href=" {{ asset('user_assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href=" {{ asset('user_assets/css/jquery-ui.css')}}">
    <link rel="stylesheet" href=" {{ asset('user_assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href=" {{ asset('user_assets/css/owl.theme.default.min.css')}}">


    <link rel="stylesheet" href=" {{ asset('user_assets/css/aos.css')}}">

    <link rel="stylesheet" href=" {{ asset('user_assets/css/style.css')}}">




    <!-- Vendors Style-->
    <link rel="stylesheet" href=" {{ asset('backend/css/slider.css') }} ">

   

</head>

<body>

    <div class="site-wrap">
    @include ('user.body.header')


    @yield('content')
        
      @include('user.body.footer')
    </div>

    <script src="{{asset('user_assets/js/jquery-3.3.1.min.js')}} "></script>
    <script src="{{asset('user_assets/js/jquery-ui.js')}} "></script>
    <script src="{{asset('user_assets/js/popper.min.js')}} "></script>
    <script src="{{asset('user_assets/js/bootstrap.min.js')}} "></script>
    <script src="{{asset('user_assets/js/owl.carousel.min.js')}} "></script>
    <script src="{{asset('user_assets/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{asset('user_assets/js/aos.js')}} "></script>

    <script src="{{asset('user_assets/js/main.js')}} "></script>

    <!-- ========================================= -->

     <!-- Js Plugins -->
    <script src="{{asset('frontend/assets_new')}}/js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/bootstrap.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/jquery.nice-select.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/jquery-ui.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/jquery.slicknav.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/mixitup.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/owl.carousel.min.js"></script>
    <script src="{{asset('frontend/assets_new')}}/js/main.js"></script>


    {{-- slider JS --}}

    
  <script src="{{asset('assets/vendor_plugins/bootstrap-slider/bootstrap-slider.js')}}"></script>
  <script src="{{asset('assets/vendor_components/OwlCarousel2/dist/owl.carousel.js')}}"></script>
  <script src="{{asset('assets/vendor_components/flexslider/jquery.flexslider.js')}}"></script>
  <script src="{{asset('backend')}}/js/pages/slider.js"></script>

</body>

</html>