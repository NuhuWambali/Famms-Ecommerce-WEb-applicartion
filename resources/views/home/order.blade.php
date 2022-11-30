<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        #buttonCss:hover{
        color:#000;
        border-radius:15px 15px;
        }
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->

         <!-- slider section -->

<section class="product_section layout_padding" id="products">
    <div style="text-align:center;font-size:2rem;">
        <h2>My Orders</h2>
      </div>
    <div class="container">
        <div class="row">
        @foreach($order as $order)
             <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                   <div class="img-box">
                      <img src="/products/{{$order->image}}" alt="">
                   </div>
                   <div>
                    <h2 style="font-size:1.4rem">name : <span style="color:#025998">{{$order->product_title}}</span></h2>
                    <h2 style="font-size:1.4rem;">Quantity : <span style="color:#025998">{{$order->quantity}}</span></h2>
                    <h2 style="font-size:1.4rem;">Price : <span style="color:#025998">{{$order->price}}</span></h2>
                    <h2 style="font-size:1.2rem;">Payment Status : <span style="color:darkgreen">{{$order->payment_status}}</span></h2>
                    @if($order->delivery_status=='processing')
                    <h2 style="font-size:1.2rem;">Delivery Status : <span style="color:orange">{{$order->delivery_status}}</span></h2>
                    @elseif($order->delivery_status=='Order Cancelled')
                    <h2 style="font-size:1.2rem;">Delivery Status : <span style="color:red">{{$order->delivery_status}}</span></h2>
                    @else
                    <h2 style="font-size:1.2rem;">Delivery Status : <span style="color:green">{{$order->delivery_status}}</span></h2>
                    @endif
                    @if($order->delivery_status=='processing')
                    <div style="padding-left:33%; padding-top:8px;">
                        <a onclick="return confirm('Do You Want to Cancel This Order?')" href="{{url('cancel_order',$order->id)}}" class="btn btn-outline-danger">Cancel Order</a>
                    </div>
                    @else
                    <div style="padding-left:33%; padding-top:8px;">
                        <a href="{{url('cancel_order',$order->id)}}" class="btn btn-outline-danger disabled" style="text-decoration:line-through">Cancel Order</a>
                    </div>
                    @endif
                  </div>
             </div>
          
        </div>
        @endforeach
    </div>
  
</section>




<div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="https://html.design/">Orange Softwares</a><br>

            Backend Design <a href="https://themewagon.com/" target="_blank">Nuhu Wambali</a>

         </p>
      </div>
         <!-- end slider section -->
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
