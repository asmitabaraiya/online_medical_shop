@extends('castomer.main_master')

@section('title')
 Pharmative - Change Password       
@endsection
@section('body')


<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page">Change Password       
    </li>
    </ol>      
</div>



<section  class="section-margin calc-60px">
    <div class="container">
        <div class="row">
          
          @include('castomer.comman.profile_banner')
          
          <div class="col-lg-8">
            <div class="blog_left_sidebar">
                
                    <form method="post" enctype="multipart/form-data" action="{{ route('user.profile.change_password') }}" class="row login_form"  id="register_form">
                        @csrf


                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="Current Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Current Password'">
                        </div>
                        @error('oldpassword')
                                        <span style="color:Tomato;" >  {{ $message }}</span>
                        @enderror

                        
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password" name="password" placeholder="New Password " onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
                        </div>
                        @error('password')
                                        <span style="color:Tomato;" >  {{ $message }}</span>
                        @enderror

                        
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                        </div>
                        @error('password_confirmation')
                                        <span style="color:Tomato;" >  {{ $message }}</span>
                        @enderror

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100"> Update       </button>
                            <a href="#">Forgot Password?</a>
                        </div>

                    </form>
                </div>
            </div>

          </div>
        </div>
    </div>
</section>



@endsection