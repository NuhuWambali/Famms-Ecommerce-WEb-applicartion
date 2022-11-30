<!DOCTYPE html>
<html>
   <head>
    <base href="/public">
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
   </head>
   <style>
    #buttonCss:hover{
           color:black;
    }
   </style>
   <body>
    @include('home.header')
      <div class="hero_area" style="background-color:rgb(234, 221, 221)">
         <!-- header section strats -->
         <!-- end header section -->
         <div class="bodyProduct_details" style="margin:auto; width:25rem;">
            <div class="card-body">
                <h2 style="text-align:center; color:#000">Product Details</h2>
                </div>
            <div class="" style="width: 16rem; margin:auto;">
                <img src="products/{{$product->image}}" class="card-img-top" alt="{{'$product->title'}}">
              </div>
              <div class="" style="text-align:center; margin:auto; padding-top:3rem;">
              <h5 class="card-title">Product Name : {{$product->title}}</h5>
              <h5 class="card-title">Product Description : {{$product->description}}</h5>
              <h5 class="card-title">Available Quantity : {{$product->quantity}}</h5>
              <h5 class="card-title">Product Category : {{$product->product_category}}</h5>
                @if($product->discount_price!=null)   <!--{{--for checking discount price --}} -->
               <h5>Product price : Tsh. <span style="color:red; text-decoration:line-through;">{{$product->price}}</span></h5>
               <h5 class="card-title"> <span style="color:green">Tsh.{{$product->discount_price}}</span></h5>
              @endif
              <div style="padding:2rem 0;">
                <form action="{{url('add_cart',$product->id)}}" method="post">
                    @csrf
                    <div clas="row">
                        <div style="margin:auto">
                        <input type="number" name="quantity" value="1" min="1" style="border-radius:15px 15px ; width:170px">
                         </div>
                         <div style="margin:auto">
                        <input id="buttonCss" style="background-color:green; border-radius:15px 15px ; width:170px"  type="submit" value="Add To Cart"  >
                         </div>
                    </div>
                   </form>
            </div>
            </div>
        </div>
      <!-- footer start -->
     @include('home.footer')
      <!-- footer end -->


      <div class="cpy_">
         <p class="mx-auto">© 2022 All Rights Reserved By <a href="https://html.design/">Orange Softwares</a><br>

            Backend Design <a href="https://themewagon.com/" target="_blank">Nuhu Wambali</a>

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
