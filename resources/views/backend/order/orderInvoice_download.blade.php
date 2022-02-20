<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Invoice</title>

<style type="text/css">
    * {
        font-family: Verdana, Arial, sans-serif; 
    }
    table{
        font-size: x-small;
    }
    tfoot tr td{
        font-weight: bold;
        font-size: x-small;
    }
    .gray {
        background-color: lightgray
    }
    .font{
      font-size: 15px;
      margin-top: 30px;
    }
    
    .authority {
        /*text-align: center;*/
        float: right
    }
    .authority h5 {
        margin-top: -10px;
        color: #384aeb;
        /*text-align: center;*/
        margin-left: 35px;
    }
    .thanks p {
        color: #384aeb;;
        font-size: 16px;
        font-weight: normal;
        font-family: serif;
        margin-top: 20px;
    }
</style>

</head>
<body>

  <table width="100%" style="background: #F7F7F7; padding:0 20px 0 20px;">
    <tr>
        <td valign="top">
          <!-- {{-- <img src="" alt="" width="150"/> --}} -->
          <h2 style="color: #4e5eeb; font-size: 26px;"><strong>Pharmative</strong></h2>
        </td>
        <td align="right">
            <pre class="font" >
               Pharmative Head Office
               Email:pharmative@gmail.com 
               Mob: 1245454545 
               Gujarat 395006,Surat:#4 <br>
              
            </pre>
        </td>
    </tr>

  </table>


  <table width="100%" style="background:white; padding:2px;""></table>

  <table width="100%" style="background: #F7F7F7; padding:0 5 0 5px;" class="font">
    <tr>
        <td>
          <p class="font" style="margin-left: 20px;  ">
          <br> <strong >Name:</strong> {{$order->name}} <br>
           <strong >Email:</strong> {{$order->email}} <br>
           <strong >Phone:</strong> {{$order->phone}} <br>
           <strong >Address:</strong> {{$order->state->state_name}} , {{$order->district->district_name}} , {{$order->division->division_name}} <br>
           <strong >Post Code:</strong> {{$order->post_code}}
         </p>
        </td>
        <td>
          <p class="font">
            <h3><span style="color: #384aeb;">Invoice:</span> {{$order->invoice_no}} </h3>
            Order Date: {{$order->order_date}} <br>
            Delivery Date: {{$order->delivered_date}} <br>
            Payment Type : {{$order->payment_type}} </span>
         </p>
        </td>
    </tr>
  </table>
  <br/>
<h2>Orders</h2>


  <table width="100%">
    <thead style="background-color: #384aeb; color:#FFFFFF;">
      <tr class="font">
        <th></th>
        <th>Product </th>
        <th>Size</th>
        <th>Color</th>
        <th>Code</th>
        <th>Quantity</th>
        <th>Unit Price </th>
        <th>Total </th>
      </tr>      
    </thead>
    <tbody style="margin-bottom: 20px">

    @foreach ($orderItem as $item )
         
      <tr class="font">
        <td align="center">
            <img src="{{asset($item->product->product_thumbnail)}}" height="60px;" width="60px;" alt="">
        </td>
        <td align="center">{{$item->product->product_name_en}}</td>
        
        @if ($item->size == NULL)
            <td align="center">-</td>
        @else
            <td align="center">{{$item->product->size}}</td>
        @endif


        @if ($item->color == NULL)
            <td align="center">-</td>
        @else
            <td align="center">{{$item->color}}</td>
        @endif

       
       
        <td align="center">{{$item->product->product_code}}</td>
        <td align="center">{{$item->qty}}</td>    
        <td align="center">&#8377; {{$item->price}}.00</td> 
        <td align="center">&#8377; {{($item->qty * $item->price)}}.00</td>
       
      </tr>
     
    @endforeach
      
    </tbody>
  </table>
  <br>
  <hr>
  <table width="100%" style=" padding:0 10px 0 10px;">
    <tr>
        <td align="right" >
            <h2><span style="color: #384aeb;">Subtotal:</span> &#8377; {{$order->amount}}.00</h2>
            <h2><span style="color: #384aeb;">Total:</span> &#8377; {{$order->amount}}.00</h2>
            {{-- <h2><span style="color: #384aeb;">Full Payment PAID</h2> --}}
        </td>
    </tr>
  </table>
  <div class="thanks mt-3">
    <p>Thanks For Buying Products..!!</p>
  </div>
  <div class="authority float-right mt-5">
      <p>-----------------------------------</p>
      <h5>Authority Signature:</h5>
    </div>
</body>
</html>