@extends('castomer.main_master')
@section('title')

@if(session()->get('language') == 'hindi')  Forget password  @else Forget password @endif     
@endsection

@section('body')


<section class="login_box_area section-margin">

	<div class="body-content">
	
		<div class="container">
			<div class="sign-in-page">
				<div class="row">
					<!-- Sign-in -->
					<div class="col-md-6 col-sm-6 ">
						
						<h4 class="my-4">Forgot Password</h4>
						<br><br>

           					 <!-- form==================================================================                         -->
                        <form method="POST" class="row login_form" action="{{ route('password.email') }}"  id="contactForm">
                                 @csrf
                            
							

							<div class="col-md-12 form-group ">
								<input type="email" class="form-control" id="email" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
								@error('email')
								<span style="color:Tomato;"> {{ $message }}  </span>
								@enderror
							
							</div>


							<button type="submit" class="button button-login w-50">Password Reset Link</button>
						</form>
					</div>
					<!-- Sign-in -->

					
				</div><!-- /.row -->
			</div><!-- /.sigin-in-->
			
		</div><!-- /.container -->
	</div><!-- /.body-content -->
</section>
    @endsection