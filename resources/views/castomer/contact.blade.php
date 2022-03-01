@include('castomer.comman.product_modal')

@extends('castomer.main_master')

@section('title')
  Pharmative - Contact Us
@endsection

@section('body')


	<!-- ================ contact section start ================= -->
  <section class="section-margin--small">
    <div class="container">
      <div class="d-none d-sm-block mb-5 pb-4">
        <div id="map" style="height: 420px;" class="col-md-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.0080692193424!2d80.29172299999996!3d13.098675000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a526f446a1c3187%3A0x298011b0b0d14d47!2sTransvelo!5e0!3m2!1sen!2sin!4v1412844527190" 
          width="1100" height="450" style="border:0"></iframe>
        
        </div>         
      </div>


      <div class="row">
      
        <div class="col-md-8 col-lg-9 mb-md-0 my-5">
          <form action="{{route('contact.store')}}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
            @csrf
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
                  @error('name')
                  <span style="color:Tomato;"> {{ $message }}  </span>
                  @enderror
                </div>
               
                <div class="form-group">
                  <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
                  @error('subject')
                  <span style="color:Tomato;"> {{ $message }}  </span>
                  @enderror
                </div>
              </div>
              <div class="col-lg-7">
                <div class="form-group">
                    <textarea class="form-control different-control w-100" name="message" id="message" cols="30" rows="3" placeholder="Enter Message"></textarea>
                    @error('message')
                    <span style="color:Tomato;"> {{ $message }}  </span>
                    @enderror
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Send Message</button>
            </div>
          </form>
        </div>
        <div class="col-md-4 col-lg-3 mb-4 my-5">
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-home"></i></span>
              <div class="media-body">
                <h3>California United States</h3>
                <p>Santa monica bullevard</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-headphone"></i></span>
              <div class="media-body">
                <h3><a href="tel:454545654">00 (440) 9865 562</a></h3>
                <p>Mon to Fri 9am to 6pm</p>
              </div>
            </div>
            <div class="media contact-info">
              <span class="contact-info__icon"><i class="ti-email"></i></span>
              <div class="media-body">
                <h3><a href="mailto:support@colorlib.com">support@colorlib.com</a></h3>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>

      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
  
  

@endsection