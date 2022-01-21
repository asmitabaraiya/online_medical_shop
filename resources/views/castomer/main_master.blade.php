<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> @yield('title') </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


	<link rel="icon" href="{{asset('castomer')}}/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{asset('castomer')}}/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="{{asset('castomer')}}/css/style.css">

  {{-- css of oragani --}}
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/style.css" type="text/css">
   {{-- css of oragani --}}
    <!-- ============================================== -->

</head>
<body>
  <!--================ Start Header Menu Area =================-->
    @include('castomer.body.header')
	<!--================ End Header Menu Area =================-->

    {{-- bodysection --}}
    
    @yield('body')
  <!--================ Start footer Area  =================-->	
	@include('castomer.body.footer')
	<!--================ End footer Area  =================-->



  <script src="{{asset('castomer')}}/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/skrollr.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/mail-script.js"></script>
  <script src="{{asset('castomer')}}/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  {{-- js of oragani --}}
  <!-- Js Plugins -->
      <script src="{{asset('castomer/assets_new')}}/js/jquery-3.3.1.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/bootstrap.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/jquery.nice-select.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/jquery-ui.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/jquery.slicknav.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/mixitup.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/owl.carousel.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/main.js"></script>
 {{-- js of oragani --}}

</body>
</html>