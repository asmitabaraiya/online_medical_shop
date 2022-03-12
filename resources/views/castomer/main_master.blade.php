<!DOCTYPE html>
<html lang="en">
  @php
    $seo = App\Models\SEOsetting::find(1);
  @endphp
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">

  <meta name="description" content="{{$seo->meta_description}}">
  <meta name="author" content="{{$seo->meta_author}}">
  <meta name="keywords" content="{{$seo->meta_keyword}}">
  
  <script>
    {{$seo->google_analytics}}
  </script>
  
   {{-- sweet alert style --}}
   <style>
     .notify-badge{
    position: absolute;
    background: rgb(236 77 69);
    height:3rem;
    top:0rem;
    right:-0.5rem;
    width:3rem;
    text-align: center;
    line-height: 3rem;;
    font-size: 1rem;
    border-radius: 50%;
    color:white;
    border:1px solid rgb(236 77 69);
}
   </style>
  <style>
    .Toast-modal{
      background-color: rgba(255, 255, 255, 0.979);
    }
  </style>



  <title> @yield('title') </title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  
  
	<link rel="icon" href="{{asset('castomer')}}/img/Fevicon.png" type="image/png">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="{{asset('castomer')}}/vendors/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/nice-select/nice-select.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/owl-carousel/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('castomer')}}/vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="{{asset('castomer')}}/css/style.css">

  {{-- css of oragani --}}
    <!-- Css Styles -->
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/bootstrap.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/font-awesome.min.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/elegant-icons.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/nice-select.css" type="text/css"> --}}
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/slicknav.min.css" type="text/css"> --}}
    
    {{-- <link rel="stylesheet" href="{{asset('castomer/assets_new')}}/css/style.css" type="text/css"> --}}
   {{-- css of oragani --}}
    <!-- ============================================== -->

    {{-- script for stripe gatway --}}
    <script src="https://js.stripe.com/v2/"></script>

    
</head>
<body>
  <!--================ Start Header Menu Area =================-->
    @include('castomer.body.header')
	<!--================ End Header Menu Area =================-->
  @include('castomer.comman.order_track')
    {{-- bodysection --}}
    
    @yield('body')

  
  <!--================ Start footer Area  =================-->	
	@include('castomer.body.footer')
	<!--================ End footer Area  =================-->



  <script src="{{asset('castomer')}}/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/skrollr.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/jquery.ajaxchimp.min.js"></script>
  <script src="{{asset('castomer')}}/vendors/mail-script.js"></script>
  <script src="{{asset('castomer')}}/js/main.js"></script>
  <script src="{{asset('castomer/js/search.js')}}"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
 
 
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  
  {{-- js of oragani --}}
  <!-- Js Plugins -->
      {{-- <script src="{{asset('castomer/assets_new')}}/js/jquery-3.3.1.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/bootstrap.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/jquery.nice-select.min.js"></script>
       <script src="{{asset('castomer/assets_new')}}/js/jquery-ui.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/jquery.slicknav.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/mixitup.min.js"></script>
      <script src="{{asset('castomer/assets_new')}}/js/owl.carousel.min.js"></script> 
      <script src="{{asset('castomer/assets_new')}}/js/main.js"></script>  --}}
 {{-- js of oragani --}}


<script type="text/javascript">
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
  })

// start product view with modal
function productView(id){
  $.ajax({
    type: 'GET' ,
    url: '/product/view/modal/'+id ,
    dataType : 'json' ,
    success:function(data){
      console.log(data);
      $('#pname').text(data.product.product_name_en);
      $('#pcode').text(data.product.product_code);
      $('#pcat').text(data.product.category.category_name_en);
      $('#pimg').attr('src', '/'+data.product.product_thumbnail);
      
      $('#product_id').val(id);
      $('#qty').val(1);

     
      if(data.product.discount_price == null ){
        $('#oldprice').text(data.product.selling_price);

      }
      else{
        $('#pprice').text(data.product.discount_price);
        $('#oldprice').text(data.product.selling_price);
      }

      if(data.product.product_qty <= 0 ){
        $('#pstock').text('Out of Stock');
      }
      else{
        $('#pstock').text('Available');
      }

      $('select[name="size"]').empty();
      $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value=" '+value+' "> '+value+' </option>')

        if(data.size == ""){
            $("#sizeArea").hide();
        }
        else{
          $("#sizeArea").show();

        }

      })

    }
  })
}

// end product cart=================================

// start Add to cart product===============================

function addToCart(){
    var product_name = $('#pname').text();
    var id = $('#product_id').val();
    var size = $('#size option:selected').text();
    var quantity = $('#qty').val();
    $.ajax({
      type: "POST" ,
      dataType: 'json' ,
      data:{
        size:size , quantity:quantity , product_name:product_name
      },
      url: "/cart/data/store/"+id ,
      success:function(data){
        miniCart();
        $('#closeModel').click();
       // console.log(data)
        const Toast = Swal.mixin({
                      toast: true,
                      position: 'bottom-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }

                    })
        if($.isEmptyObject(data.error)){
                      Toast.fire({
                        type: 'success',
                        title: data.success,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
        }
        else{
                  Toast.fire({
                        type: 'error',
                        title: data.error,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
        }                    
      }
    })
}

// end Add to cart product================================


</script>

<script type="text/javascript">

  function miniCart(){
    $.ajax({
      type: 'GET',
      url: '/product/mini/cart',
      dataType: 'json',
      success:function(response){
       console.log();
        var miniCart = ""
        $.each(response.carts, function(key , value){
          miniCart += `<li class="nav-item">
                          <div class="card mb-2 " style="max-width: 300px; max-height: 100px; " >                            
                            <div class="row g-0">

                                <div class="col-md-4 ">
                                  <img  src="/${value.options.image}" class="img-fluid rounded-start" alt="..." height="100px" width="100%">
                                  <button type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="ti-trash"></i></button> 
                                </div>

                                <div class="col-md-8">
                                  <div class="card-body">
                                    <p  class="card-title">${value.name}</p>
                                    <p class="card-text">${value.price} X ${value.qty} </p>
                                  </div>
                                </div>

                            </div>                              
                          </div> 
                       </li>`;
          
        });
        $('#miniCart').html(miniCart);
        $('#cart_qty').text(response.cartQty);
      }
    })
  }
  miniCart();

</script>

<script type="text/javascript">


  /// mini cart remove start/=---------------------------------------
  function miniCartRemove(rowId){
        $.ajax({
            type: 'GET',
            url: '/minicart/product-remove/'+rowId,
            dataType:'json',
            success:function(data){
            miniCart();
            couponCalculation();
            MyCart();
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'bottom-end',
                      icon: 'success',
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }

                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        title: data.success,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        title: data.error,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
                }
                // End Message 
            }
        });
    }
  /// mini cart remove end/=---------------------------------------
</script>



<script type="text/javascript">
    
  function addToWishList(product_id){
      $.ajax({
          type: "POST",
          dataType: 'json',
          url: "/add-to-wishlist/"+product_id,
          success:function(data){
               // Start Message 
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',
                        
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }

                      })
                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }
                  // End Message 
          }
      })
  } 
  </script> 

<script type="text/javascript">
// get wishlist with ajax

  function wishList(){
    $.ajax({
      type: 'GET',
      url: '/user/product/wishList',
      dataType: 'json',
      success:function(response){
        //console.log(response)
        var wishList = ""
        $.each(response , function(key , value){
          wishList += `
                        <tr>
                            <td>
                                <div class="media">
                                    <div class="d-flex">                                     
                                        <img src="/${value.product.product_thumbnail}" alt="" width="100px" hieght="100px">
                                    </div>
                                    <div class="media-body">
                                        <p>${value.product.product_name_en}</p> <br>
                                        ${value.product.discount_price == null
                                        ? `${value.product.selling_price}`
                                        :
                                        `₹${value.product.discount_price}.00  &nbsp;  <del>₹${value.product.selling_price}.00<del>`}

                                    </div>
                                </div>
                            </td>
                            <td>
                            
                            </td>
                            <td>
                              <button  class="button button--active" data-bs-toggle="modal" data-bs-target="#exampleModal" id="${value.product.id}" onclick="productView(this.id)">Add To Cart</button>             
                            </td>
                            <td>
                                
                            </td>
                            <td close-btn>
                              <button aria-label="Close" class="btn-close" type="submit" id="${value.id}" onclick="wishlistRemove(this.id)" > </button>
                            <td>
                        </tr>
                      `;
          
        });
        $('#wishList').html(wishList);
      }
    })
  }
  wishList();

  // end wish list===========================================================


   /// wish list remove start/=---------------------------------------
   function wishlistRemove(id){
        $.ajax({
            type: 'GET',
            url: '/user/wishlist/product-remove/'+id,
            dataType:'json',
            success:function(data){
            wishList()
             // Start Message 
                const Toast = Swal.mixin({
                      toast: true,
                      position: 'bottom-end',                     
                      showConfirmButton: false,
                      timer: 3000,
                      timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }


                    })
                if ($.isEmptyObject(data.error)) {
                    Toast.fire({
                        type: 'success',
                        icon: 'success',
                        title: data.success,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
                }else{
                    Toast.fire({
                        type: 'error',
                        icon: 'error',
                        title: data.error,
                        background: 'rgba(255, 255, 255, 0.979)'
                    })
                }
                // End Message 
            }
        });
    }
  /// end wishlist remove end/=---------------------------------------

</script> 

{{-- My cart all script ========================================================================================================--}}

<script type="text/javascript">
  // get MyCart with ajax
  
    function MyCart(){
      $.ajax({
        type: 'GET',
        url: '/user/product/MyCart',
        dataType: 'json',
        success:function(response){
          //console.log(response)
          var CartPage = ""
          $.each(response.carts, function(key , value){
            CartPage += `
                          <tr>
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="/${value.options.image}" alt="" width="100px" hieght="100px">
                                      </div>
                                      <div class="media-body">
                                          <p>${value.name}</p><br>
                                          <h5>₹${value.price}.00</h5>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  
                              </td>
                              <td>
                                  
                                  
                                    ${value.qty > 1
                                          ? `<button type="submit" class="btn button--active btn-sm" id="${value.rowId}" onclick="cartDecrement(this.id)" >-</button> `
                                          : `<button type="submit" class="btn button--active btn-sm" disabled >-</button> `
                                          }                                      
                                      <input type="text" value="${value.qty}" min="1" max="100" disabled="" style="width:25px;" >  
                                      <button type="submit" class="btn button--active btn-sm" id="${value.rowId}" onclick="cartIncrement(this.id)" >+</button>                                                       
                                  
                                  
                              </td>
                              <td>
                                  <h5>₹${value.subtotal}.00</h5>
                              </td>
                              <td close-btn>
                                <button aria-label="Close" class="btn-close" type="submit" id="${value.rowId}" onclick="MyCartRemove(this.id)" > </button>
                              <td>
                          </tr>
                        `;
            
          });
          $('#CartPage').html(CartPage);
        }
      })
    }
    MyCart();
  
    // end wish list===========================================================
  
  
     /// wish list remove start/=---------------------------------------
     function MyCartRemove(id){
          $.ajax({
              type: 'GET',
              url: '/user/MyCartRemove/product-remove/'+id,
              dataType:'json',
              success:function(data){
                couponCalculation();
                $('#CouponApply').show();
                $('#coupon_name').val('');
                miniCart();
                MyCart();
               // Start Message 
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',                     
                        showConfirmButton: false,                        
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }

                      })
                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }
                  // End Message 
              }
          });
      }
    /// end wishlist remove end/=---------------------------------------


     // -------- CART INCREMENT --------//
     function cartIncrement(id){
        $.ajax({
            type:'GET',
            url: "/cart/increment/"+id,
            dataType:'json',
            success:function(data){
               couponCalculation();
                MyCart();
                miniCart();
            }
        });
    }
 // ---------- END CART INCREMENT -----///


 // -------- CART Decrement  --------//
 function cartDecrement(rowId){
        $.ajax({
            type:'GET',
            url: "/cart/decrement/"+rowId,
            dataType:'json',
            success:function(data){
                couponCalculation();
                MyCart();
                miniCart();
            }
        });
    }
 // ---------- END CART Decrement -----///

  
  </script> 

<script type="text/javascript">
// apply copone start

function applyCoupon(){
  var coupon_name = $('#coupon_name').val()
  $.ajax({
    type: 'POST',
    dataType: 'json',
    data: {coupon_name: coupon_name},
    url: '/coupon-apply' ,
    success:function(data){

              couponCalculation();
             if(data.validitiy == true){
                $('#CouponApply').hide();
             }
               // Start Message 
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',                     
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }

                      })
                  if ($.isEmptyObject(data.error)) {
                  
                    $('#coupon_name').val('');
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }else{
                    
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }
                  // End Message

    }   
  })
}

// apply copone start end

// coupon calculation

function couponCalculation(){
  $.ajax({
        type:'GET',
        url: "{{ url('/coupon-calculation') }}",
        dataType: 'json',
        success:function(data){
            if (data.total) {
                $('#couponCalField').html(
                    `
                    <ul class="list list_2">
                      <li><a >Subtotal <span>₹${data.total}</span></a></li>
                      <li><a >Grand Total <span>₹${data.total}</span></a></li>                     
                    </ul>
                    
                    `
            )
            }else{
                 $('#couponCalField').html(
                    `
                    
                   
                    <ul class="list list_2">
                      <li><a >Subtotal <span>₹${data.subtotal}</span></a></li>
                      <li><a >Coupon <span>${data.coupon_name} <button  aria-label="Close" class="btn-close" type="submit" onclick="couponRemove()"></button></span></a></li>
                      <li><a >Discount Amount <span>₹${data.discount_amount}</span></a></li>
                      <li><a >Grand Total <span>₹${data.total_amount}</span></a></li>
                    </ul>
                    `
            )
            }
        }
    });
  }
  couponCalculation();

// coupon calculation end

</script> 

<script type="text/javascript">


// coupon remove






function couponRemove(){
 
  $.ajax({
    type: 'GET',
    dataType: 'json',   
    url: '/coupon-remove' ,
    success:function(data){
                $('#CouponApply').show();
                couponCalculation();
                $('#couponCalField').show();
                $('#coupon_name').val('');

                
               // Start Message 
                  const Toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-end',                     
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                          toast.addEventListener('mouseenter', Swal.stopTimer)
                          toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                      })
                  if ($.isEmptyObject(data.error)) {
                      Toast.fire({
                          type: 'success',
                          icon: 'success',
                          title: data.success,
                          background: 'rgba(255, 255, 255, 0.979)'
                      })
                  }else{
                      Toast.fire({
                          type: 'error',
                          icon: 'error',
                          title: data.error,
                          background: 'rgba(255, 255, 255, 0.979)'
                         
                      })
                  }
                  // End Message

    }   
  })
}

// coupon remove end
</script> 




<!-- Sub category  -->
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
           
            $.ajax({
                url: "/user/district/ajax/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                  console.log(data)
                      $('select[name="state_id"]').empty(); 
                      var d =$('select[name="district_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
                        });
                },
            });
        } else {
            alert('danger');
        }
    });




    // $('select[name="district_id"]').on('change', function(){
    //     var district_id = $(this).val();
    //     if(district_id) {
           
    //         $.ajax({
    //             url: "/user/state/ajax/"+district_id,
    //             type:"GET",
    //             dataType:"json",
    //             success:function(data) {
    //               console.log(data)
    //               var d =$('select[name="state_id"]').empty();
    //                     $.each(data, function(key, value){
    //                         $('select[name="state_id"]').append('<option value="'+ value.id +'">' + value.state_name + '</option>');
    //                     });
    //             },
    //         });
    //     } else {
    //         alert('danger');
    //     }
    // });
});



</script>  
{{-- end script for strip gatway --}}
 


</body>
</html>










