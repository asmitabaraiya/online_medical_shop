@extends('castomer.main_master')

@section('title')

Pharmative - Registration       
@endsection
@section('body')



<!-- ================ start banner area ================= -->	
<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Registration       
    </li>
    </ol>      
</div>
<!-- ================ end banner area ================= -->



<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>Already have an account?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{route('login')}}">Login Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner register_form_inner">
                    <h3>Create an account</h3>
                    
                    <form class="row login_form" id="contactForm" method="POST" action="{{ route('register') }}">
                        @csrf   
                            <div style="text-align: left;">
                        
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                    @error('name')
                                        <span style="color:Tomato;"> {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                    @error('email')
                                        <span style="color:Tomato;">  {{ $message }}</span>
                                    @enderror
                                
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                                    @error('password')
                                        <span style="color:Tomato;" >  {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
                                    @error('password_confirmation')
                                        <span style="color:Tomato;">  {{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone no" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone no'">
                                    @error('phone')
                                        <span style="color:Tomato;" > {{ $message }}</span>
                                    @enderror
                                </div>

                                

                                <div class="col-md-12 form-group">
                                    <div class="creat_account">
                                        <input type="checkbox" id="f-option2" name="terms">
                                        <label for="f-option2">Accept terms and Condditions</label>
                                    </div>
                                    @error('terms')
                                        <span style="color:Tomato;">  {{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->



@endsection




