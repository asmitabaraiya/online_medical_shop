@extends('frontend.main_master')
@section('content')


<div class="body-content">
    <div class="container">
        <div class="row">
            <div class="col-md-2 my-4"><br><br>
                <img class="card-img-top " id="showimage" style="border-radius: 50%"  width= "100px" height="100px"  src="{{ (!empty(Auth::user()->profile_photo_path))?url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}">
                <ul class="list-group list-group-flush"><br><br>
                    <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Home</a>
                    <a href="{{ route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
                    <a href="{{route('user.changePassword')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
                    <a href=" {{ route('user.logout') }} " class="btn btn-danger btn-sm btn-block">Logout</a>
                </ul> 
            </div>

            <div class="col-md-2 my-4">
                
            </div>

            <div class="col-md-6">
                <div class="card">
                   
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data" action="{{ route('user.profile.change_password') }}" >
                            @csrf


                            <div class="form-group my-4"><br><br>
								<label class="info-title" for="exampleInputEmail1">Current Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" name="oldpassword"
									id="exampleInputEmail1">
							</div>


                            <div class="form-group">
								<label class="info-title" for="exampleInputEmail1">New Password <span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" name="password"
									id="exampleInputEmail1">
                                @error('password')
                                <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</storng></span>
                                @enderror
							</div>

							<div class="form-group">
								<label class="info-title" for="exampleInputEmail1">Confirm Password
									<span>*</span></label>
								<input type="password" class="form-control unicase-form-control text-input" name="password_confirmation"
									id="exampleInputEmail1">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">  <strong>{{ $message }}</storng></span>
                                @enderror
							</div>

                            <div class="form-group">
                                <button class="btn btn-success" type="submit"> Update </button>
                            </div>


                        </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection