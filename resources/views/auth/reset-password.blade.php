@extends('castomer.main_master')
@section('title')

@if(session()->get('language') == 'hindi')  Reset Password  @else Reset Password @endif     
@endsection

@section('body')


<section class="login_box_area section-margin">

	<div class="body-content">
	
		<div class="container">
			<div class="sign-in-page">
				<div class="row">
					<!-- Sign-in -->
					<div class="col-md-6 col-sm-6 ">
						
						<h4 class="my-4">Reset Password</h4>
						<br><br>

            <!-- form==================================================================                         -->
                        <form method="POST" action="{{ route('password.update') }}">
                          @csrf
                          
                          <input type="hidden" name="token" value="{{ $request->route('token') }}">


						  <div class="col-md-12 form-group ">
							<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
							@error('email')
							<span style="color:Tomato;"> {{ $message }}  </span>
							@enderror
						
						</div>

						

						<div class="col-md-12 form-group ">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
							@error('password')
							<span style="color:Tomato;"> {{ $message }}  </span>
							@enderror
						
						</div>


							<div class="col-md-12 form-group ">
								<input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="password confirmation" onfocus="this.placeholder = ''" onblur="this.placeholder = 'password confirmation'">
								@error('password_confirmation')
								<span style="color:Tomato;"> {{ $message }}  </span>
								@enderror
							
							</div>


							<button type="submit" class="button button-login w-50">Password Reset </button>
						</form>



					</div>
					<!-- Sign-in -->

					
				</div><!-- /.row -->
			</div><!-- /.sigin-in-->
			
		</div><!-- /.container -->
	</div><!-- /.body-content -->
</section>

    @endsection