@extends('castomer.main_master')

@section('title')

@if(session()->get('language') == 'hindi') Pharmative - डैशबोर्ड   @else Pharmative - Dashboard  @endif     
@endsection
@section('body')

<!-- ================ start banner area ================= -->	
<div class="main_menu">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">@if(session()->get('language') == 'hindi')  घर @else Home @endif</a></li>
      <li class="breadcrumb-item active" aria-current="page">@if(session()->get('language') == 'hindi') डैशबोर्ड  @else Dashbord  @endif     
    </li>
    </ol>      
</div>
<!-- ================ end banner area ================= -->



  <!--================Blog Area =================-->
  <section  class="section-margin calc-60px">
      <div class="container">
          <div class="row">
            
            @include('castomer.comman.profile_banner')
            
            <div class="col-lg-8">

            </div>
          </div>
      </div>
  </section>

 

@endsection