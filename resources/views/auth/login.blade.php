@extends('castomer.main_master')

@section('title')

 Pharmative - Login 
@endsection
@section('body')


<!-- ================ start banner area ================= -->	
<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">  Home  </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Login </li>
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
						<h4>New to our website?</h4>
						<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
						<a class="button button-account" href="register.html">Create an Account</a>
					</div>
				</div>
			</div>

            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    <form class="row login_form" method="POST" action="{{ isset($guard) ? url($guard.'/login') : route('login') }} " id="contactForm" 	 >
						@csrf
						
						<div style="text-align: left;">

						
								<div class="col-md-12 form-group ">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
									@error('email')
									<span style="color:Tomato;"> {{ $message }}  </span>
									@enderror
								
								</div>

								

								<div class="col-md-12 form-group ">
									<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
									@error('password')
									<span style="color:Tomato;">  {{ $message }}  </span>
									@enderror
								
								</div>

								<div class="col-md-12 form-group">
									<div class="creat_account">
										<input type="checkbox" id="f-option2" name="selector">
										<label for="f-option2">Keep me logged in</label>
									</div>
								</div>

								<div class="col-md-12 form-group">
									<button type="submit" value="submit" class="button button-login w-100 ">Log In</button>
									<a  href="{{ route('password.request') }}">Forgot Password?</a>
								</div>
						</div>
						
                    </form>
                </div>
            </div>

			

        </div>
    </div>
</section>
<!--================End Login Box Area =================-->

@endsection



{{-- ====================================================================================================== --}}



