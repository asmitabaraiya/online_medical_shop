<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>Easy Ecommerce Admin - Dashboard</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Vendors Style-->
    <link rel="stylesheet" href=" {{ asset('backend/css/vendors_css.css') }} ">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }} ">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}  ">
    <!-- toster js -->
    {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> --}}

    
    
   
</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

      
        

        @include('admin.body.header')

        <!-- Left side column. contains the logo and sidebar -->
        
        @include('admin.body.sider')

         <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            
         
        @yield('admin')

        <div class="jq-toast-wrap top-right">
            <div class="jq-toast-single jq-has-icon jq-icon-info" style="text-align: left; display: none;">
                <span class="jq-toast-loader jq-toast-loaded" style="-webkit-transition: width 2.6s ease-in;                       
                -o-transition: width 2.6s ease-in;                       
                transition: width 2.6s ease-in;                       
                background-color: #ff6849;">
                </span>
                <span class="close-jq-toast-single">×</span>
                <h2 class="jq-toast-heading">Welcome to my Sunny Admin</h2>
                Use the predefined ones, or specify a custom position object.
            </div>
        </div>



        </div>
        <!-- /.content-wrapper -->
        @include('admin.body.footer')

        

       

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- ./wrapper -->


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }} "></script>
    <script src="{{ asset('assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/easypiechart/dist/jquery.easypiechart.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/irregular-data-series.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/apexcharts-bundle/dist/apexcharts.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   

    <!-- Sunny Admin App -->
    <script src="{{ asset('backend/js/template.js') }} "></script>
    <script src="{{ asset('backend/js/pages/dashboard.js') }} "></script>

    <!-- toster -->
     {{-- <script rel="stylesheet" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>  --}}
    
    <script src="{{ asset('assets/vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>
    <script src="{{ asset('backend/js/pages/toastr.js') }}"></script>
    <script src="{{ asset('backend/js/pages/notification.js') }}"></script> 

     <!-- Validation form JS -->
    <script src="{{ asset('backend/js/pages/validation.js') }}"></script>
    <script src="{{ asset('backend/js/pages/form-validation.js') }}"></script>

    <!-- Data Table -->
    <script src="{{ asset('assets/vendor_components/datatable/datatables.min.js')}}"></script>
    <script src="{{ asset('backend/js/pages/data-table.js')}}"></script>
    <script src="{{asset('assets/vendor_components/datatable/datatables.js')}}"></script>
    
    

     <!-- input tags -->
	<script src="{{ asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>

    <!-- form editor -->
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
	<script src="{{ asset('assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
	<script src="{{ asset('backend/js/pages/editor.js')}}"></script>

    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
   
	
    {{-- Comment Js --}}
    <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js')}}"></script>
    <script src="{{ asset('assets/vendor_components/perfect-scrollbar-master/perfect-scrollbar.jquery.min.js')}}"></script>
	<script src="{{ asset('backend/js/pages/app-chat.js')}}"></script>
	<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
	<script src="{{ asset('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>


    {{-- Gallery --}}

<script type="text/javascript" src="{{asset('assets/vendor_components/gallery/js/animated-masonry-gallery.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendor_components/gallery/js/jquery.isotope.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/vendor_components/lightbox-master/dist/ekko-lightbox.js')}}"></script>
<script src="{{asset('backend/js/pages/gallery.js')}}"></script>    


    
    

    <script >
        function notiInfo(){
            $.toast({                 
                text: '{{ Session::get('message') }}',             
                heading: 'Pharmative',
                position: 'top-right',
                loaderBg: '#ff6849',
                icon: 'info',
                hideAfter: 4000,
                stack: 6
            });
        }


     </script>



<script>

    function notiSucc(){
        $.toast({
        text: '{{ Session::get('message') }}',             
        heading: 'Pharmative',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'success',
        hideAfter: 4000,
        stack: 6
        });
    }
    
    </script>
    
    
    <script>
    
    function notiWarning(){
        $.toast({
        text: '{{ Session::get('message') }}',             
        heading: 'Pharmative',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'warning',
        hideAfter: 4000,
        stack: 6
        });
    }
    
    </script>
    
    
    <script>
    
    function notiError(){
        $.toast({
        text: '{{ Session::get('message') }}',             
        heading: 'Pharmative',
        position: 'top-right',
        loaderBg: '#ff6849',
        icon: 'error',
        hideAfter: 4000,
        stack: 6
    });
    }
    
    </script>



      

<script>
        @if(Session::has('message'))
            var type= "{{ Session::get('alert-type' , 'info') }}";
            switch(type){
                case 'info': 
                    notiInfo();
                    break;

                case 'success':
                    notiSucc();
                    break;

                case 'warning':
                    notiWarning();
                    break;

                case 'error':
                    notiError();
                    break;

            }

        @endif
    </script>





<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    




</body>

</html>





