@extends('castomer.main_master')

@section('title')
 Pharmative - Profile Update       
@endsection
@section('body')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="main_menu ">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}"> Home </a></li>
      <li class="breadcrumb-item active" aria-current="page"> Profile Update       
    </li>
    </ol>      
</div>

<section  class="section-margin calc-60px">
    <div class="container">
        <div class="row">
          
            @include('castomer.comman.profile_banner')
          
          <div class="col-lg-8">
            <div class="blog_left_sidebar">

                
                <form class="row login_form" id="contactForm" method="post" enctype="multipart/form-data" action="{{ route('user.profile.store') }}">
                    @csrf   
                    
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                                @error('name')
                                    <span style="color:Tomato;"> {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                @error('email')
                                    <span style="color:Tomato;">  {{ $message }}</span>
                                @enderror
                            
                            </div>

                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }} " placeholder="Phone no" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Phone no'">
                                @error('phone')
                                    <span style="color:Tomato;" > {{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 form-group">
								<input type="file" class="form-control unicase-form-control text-input" 
                                id="image" name="profile_photo_path" >
							</div>
                        

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100">Update       
                            </button>
                        </div>
                </form>
                
            </div>

          </div>
        </div>
    </div>
</section>








<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src' , e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection