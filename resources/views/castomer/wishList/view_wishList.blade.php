@extends('castomer.main_master')

@section('title')

@if(session()->get('language') == 'hindi')  My WishList Page  @else My WishList Page @endif     
@endsection
@section('body')
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