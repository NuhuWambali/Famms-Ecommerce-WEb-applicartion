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
        .tablestylingDiv{
            padding:3% 5%;
        }
        #bg{
            background-color:rgb(242, 242, 242);
        }
      </style>
   </head>
   <body>
        <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
      <div class="hero_area" id="bg">
        <!-- displaying message to user if order are added -->
        <div style="padding:0 15%">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" arial-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
        </div>


<section class="product_section layout_padding" id="products">
    <div style="text-align:center;font-size:2rem;">
        <h2>My Cart Products</h2>
      </div>
    <div class="container">
        <div class="row">
            <?php
            $totalPrice=0;
            ?>
            @foreach($cart as $cart)
             <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                   <div class="img-box">
                      <img src="/products/{{$cart->image}}" alt="">
                   </div>
                   <div>
                    <h2 style="font-size:1.4rem">Product Name : {{$cart->product_title}}</h2>
                    <h2 style="font-size:1.4rem;">Quantity: {{$cart->quantity}}</h2>
                    <h2 style="color:green;font-size:1.4rem;">Price: Tsh.{{$cart->price}}</h2>
                    <div style="padding-left:33%; padding-top:8px;">
                        <a href="{{url('remove_cart',$cart->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are You Sure You Want To Delete This Product from Cart?')" >Remove</a>
                    </div>

                  </div>
             </div>
        </div>
        <?php
        $totalPrice=$totalPrice+$cart->price
        ?>
        @endforeach
        </div>
        <div style="padding:5% 17%; background-color:rgb(241, 239, 236)">
            <div style="text-align:center; background-color:#000; padding:2% 2%; border-radius:12px 12px;">
                <h2 style="color:#fff; font-size:1.3rem;">The Total Price is Tsh.{{$totalPrice}}</h2>
            </div>
            <div style="margin:auto; text-align:center; padding:3% 25%;">
                <h1 style="font-size:20px; margin:25px 0;border-radius:5px 5px;color:green">Proceed To Order</h1>
                <a style="margin-right:0;" href="{{url('cash_order')}}" class="btn btn-outline-primary">Cash On Delivery</a>
               
            </div>
        </div>
</section>

      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->


      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="#">Orange Softwares</a><br>

            Backend Design <a href="#" target="_blank">Nuhu Wambali</a>

         </p>
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
