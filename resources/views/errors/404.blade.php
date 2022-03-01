@include('castomer.comman.product_modal')

@extends('castomer.main_master')

@section('title')
  Pharmative - Page Not Found
@endsection

@section('body')

<section class="blog_area single-post-area py-80px section-margin--small">
    <div class="container">
        <div class="body-content outer-top-bd">
            <div class="container">
                <div class="x-page inner-bottom-sm">
                    <div class="row">
                        <div class="col-md-12 x-text text-center">
                            <h1 style="font-size: 168px;">404</h1>
                            <p>We are sorry, the page you've requested is not available. </p>
                            
                            <a href="{{url('/')}}"><i class="fa fa-home"></i> Go To Homepage</a>
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.sigin-in-->
            </div><!-- /.container -->
        </div>
    </div>
</section>        

@endsection