<section class="product_section layout_padding" id="products">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">
              @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                            Product Details
                           </a>
                            <form action="{{url('add_cart',$products->id)}}" method="post">
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
                     <div class="img-box">
                        <img src="products/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                           {{$products->title}}
                        </h5>
                        @if($products->discount_price!=null)  <!-- this is for checking if there is discount price -- -->
                        <h6 style="color:green">
                            Tsh.{{$products->discount_price}}
                         </h6>
                         <h6 style="text-decoration:line-through; color:red">
                            Tsh.{{$products->price}}
                         </h6>

                         @else
                         <h6 style="color:green">
                            Tsh.{{$products->price}}
                         </h6>
                         @endif
                     </div>
                     <div style="padding:6% 0 2% 0; text-align:center">
                        <h5 style="color:#f7444e; font-size:1rem; color:#000">Available Quantity <span style="color:blue">  {{$products->quantity}}</span></h5>
                     </div>
                  </div>
               </div>
            @endforeach
             <!-- {{-- this code is to show pagination  --}} -->
             <span style="padding-top:20px">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
         </div>
      </section>
