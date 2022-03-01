@extends('castomer.main_master')

@section('title')

 {{ $title->category_name_en }} 
@endsection
@section('body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{{-- <script src="https://mdbootstrap.com/docs/b4/jquery/getting-started/cdn/"></script> --}}

<!-- ================ start banner area ================= -->	
    <div class="main_menu ">

        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page"> {{ $title->category_name_en }}   </li>
          
        </ol>      
    </div>
<!-- ================ end banner area ================= -->



 <!-- ================ category section start ================= -->
 <section class="section-margin--small mb-5">
    <div class="container">
      <div class="row">
        @include('castomer.comman.tag')
        <div class="col-xl-9 col-lg-8 col-md-7">
          <!-- Start Filter Bar -->
          
          <!-- End Filter Bar -->
          <!-- Start Best Seller -->
          <section class="lattest-product-area pb-40 category-list">
            <div class="row" id="product_loadmore_with_ajax">
              
@include('castomer.product_loadmore_with_ajax')
              
            </div>


            <div class="ajax-load-product text-center" >
              <img src="{{asset('castomer/img/loading.gif')}}" alt="" srcset="">
            </div>




          </section>
          <!-- End Best Seller -->
         
        </div>
      </div>
    </div>
  </section>
  <!-- ================ category section end ================= -->
  

 
  
  <script>
    function loadAjax(page){
      $.ajax({
        type: "get",
        url: "?page="+page,
        beforSend: function(response){
          $('.ajax-load-product').show();
        }
      })

      .done(function(data){
        if(data.product_view == " " ){
          return;
        }
        $('.ajax-load-product').hide();
        $('#product_loadmore_with_ajax').append(data.product_view);
      })
      .fail(function(){
        alert('SomeThing Went to wrong');
      })
    }

    var page = 1;
    $(window).scroll(function (){
      if($(window).scrollTop() +$(window).height() >= $(document).height() ){
        page ++;
        loadAjax(page);
      }
    });
  </script>
  

@endsection