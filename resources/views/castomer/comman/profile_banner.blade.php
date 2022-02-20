@php
     $route = Route::current()->getName();
@endphp

<div class="col-lg-4">
    <div class="blog_right_sidebar"> 

        <aside class="single_sidebar_widget author_widget">
            <img class="author_img rounded-circle" id="showimage" style="border-radius: 50%"  width= "100px" height="100px" src="{{ (!empty(Auth::user()->profile_photo_path))?url('upload/user_images/'.Auth::user()->profile_photo_path):url('upload/no_image.jpg') }}" alt="">
            {{-- <div class="br"></div> --}}
                <h4>{{ Auth::user()->name }}</h4>
                <p>{{ Auth::user()->email }}</p>
                 <div class="br"></div>
        </aside>

        <aside class="single_sidebar_widget author_widget">
            <aside class="single_sidebar_widget post_category_widget">
                <ul class="list cat-list">

                    <li >
                        <a  href="{{route('dashboard')}}" class="d-flex justify-content-between">
                            <p style="{{ ($route == 'dashboard') ? 'color: blue;' : '' }}"  >@if(session()->get('language') == 'hindi') डैशबोर्ड   @else Dashbord  @endif     </p>
                            <p style="{{ ($route == 'dashboard') ? 'color: blue;' : '' }}"><i class="ti-home"></i></i></p>
                        </a>
                    </li>

                    <li >
                        <a  href="{{route('myOrder')}}" class="d-flex justify-content-between">
                            <p style="{{ ($route == 'myOrder') ? 'color: blue;' : '' }}"  >@if(session()->get('language') == 'hindi') ऑर्डर   @else My Order  @endif     </p>
                            <p style="{{ ($route == 'myOrder') ? 'color: blue;' : '' }}"><i class="ti-bag"></i></i></p>
                        </a>
                    </li>

                    <li >
                        <a href="{{ route('user.profile')}}" class="d-flex justify-content-between">
                            <p style="{{ ($route == 'user.profile') ? 'color: blue;' : '' }}">@if(session()->get('language') == 'hindi') प्रोफ़ाइल अपडेट    @else Profile Update @endif  </p>
                            <p style="{{ ($route == 'user.profile') ? 'color: blue;' : '' }}"> <i class="ti-user"></i> </p>
                        </a>
                    </li>

                    <li >
                        <a  href="{{route('user.changePassword')}}" class="d-flex justify-content-between">
                            <p style="{{ ($route == 'user.changePassword') ? 'color: blue;' : '' }}" >@if(session()->get('language') == 'hindi') पासवर्ड चैनेज    @else Change Password  @endif  </p>
                            <p style="{{ ($route == 'user.changePassword') ? 'color: blue;' : '' }}" > <i class="ti-key"></i> </p>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user.logout') }}" class="d-flex justify-content-between">
                            <p> @if(session()->get('language') == 'hindi') लॉगआउट   @else Logout  @endif  </p>
                            <p> <i class="ti-lock"></i> </p>
                        </a>
                    </li>
                   
                </ul>
                <div class="br"></div>
            </aside>
        </aside>
    
    </div>
</div>
