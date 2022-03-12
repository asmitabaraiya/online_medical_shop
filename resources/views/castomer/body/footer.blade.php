 <!--================ Start footer Area  =================-->	
 <footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">Our Mission</h4>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no 
                            divided deep moved us lan Gathering thing us land years living.
                        </p>
                        <p>
                            So seed seed green that winged cattle in. Gathering thing made fly you're no divided deep moved 
                        </p>
                    </div>
                </div>
                @php
                    $settings =  App\Models\SiteSetting::findOrFail(1);
                @endphp
                <div class="col-md-4">
                    <div class="single-footer-widget tp_widgets text-center">
                        <h4 class="footer_title text-center">Quick Links</h4>
                        <ul class="list">
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="">Shop</a></li>
                            <li><a href="{{route('blogPage.view')}}">Blog</a></li>
                            <li><a href="">Product</a></li>
                            <li><a href="">Brand</a></li>
                            <li><a href="{{route('contact.page')}}">Contact</a></li>
                        </ul>
                    </div>
                </div>
             
                <div class="col-md-4">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">Contact Us</h4>
                        <div class="ml-40">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                Head Office
                            </p>
                            <p>{{$settings->company_address}}</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                Phone Number
                            </p>
                            <p>
                                +91 {{$settings->phone_one}} <br>
                                +91 {{$settings->phone_two}}
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                {{$settings->email}} 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

   
</footer>
<!--================ End footer Area  =================-->
