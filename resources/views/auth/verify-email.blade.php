@extends('castomer.main_master')
@section('title')

Pharmative - Email Verify  
@endsection

@section('body')


<section class="login_box_area section-margin">

	<div class="body-content">
	
		<div class="container">
			<div class="sign-in-page">
				<div class="row">
					<!-- Sign-in -->
					<div class="col-md-6 col-sm-6">
						
						
						<br><br>


                        <div class="mb-4 text-sm text-gray-600">
                            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                        </div>

           					 <!-- form==================================================================                         -->
                       
                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-success-600" style="color: rgb(26, 187, 26);">
                                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                </div>
                            @endif

                        



					</div>
					<!-- Sign-in -->

					
				</div><!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" class="row login_form" action="{{ route('verification.send') }}" id="contactForm">
                            @csrf													
                    <button type="submit" class="button button-login w-50">Resend Link</button>
                </form>
                    </div>
                
                
                
                    <div class="col-md-6">
                
                
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                
                            <button type="submit" class="button button-login w-10">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
			</div><!-- /.sigin-in-->
			
		</div><!-- /.container -->
	</div><!-- /.body-content -->
</section>
    @endsection