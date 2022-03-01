@extends('castomer.main_master')

@section('title')

 My WishList Page      
@endsection
@section('body')
<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> My WishList      
    </li>
    </ol>      
</div>
@include('castomer.comman.product_modal')
 <!--================Cart Area =================-->
 <section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody id = "wishList">                                                                          
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->



@endsection