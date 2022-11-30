<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.metaTags')
    @include('admin.styleCSS')
  </head>
  <style>
    #tableCss{
        background-color:azure;
        color:#000;
    }
    #tdcolor{
        color:#fff;
    }
    #border{
        border:1px solid #fff;
    }
  </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
      @include('admin.navbar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div style="text-align:center; font-size:1.6rem; padding:10px 0;">
                <h1 style="padding-bottom:30px">All Order</h1>
            </div>
             <div style="margin-left:40%;padding-bottom:40px; ">
              <form action="{{url('search')}}" method="get">
                @csrf
                <input style="color:#000; margin-bottom:15px;" type="text" name="search" placeholder=" Search Something">
                <input style="margin-left:45px;" type="submit" value="Search" class="btn btn-primary">
              </form>
             </div>
            <table class="table" id="border">
                    <thead>
                        <tr>
                        <th scope="col" id="tableCss">Name</th>
                        <th scope="col" id="tableCss">Email</th>
                        <th scope="col" id="tableCss">Address</th>
                        <th scope="col" id="tableCss">Phone</th>
                        <th scope="col" id="tableCss">Title</th>
                        <th scope="col" id="tableCss">Quantity</th>
                        <th scope="col" id="tableCss">Price</th>
                        <th scope="col" id="tableCss">Payment</th>
                        <th scope="col" id="tableCss">Delivery</th>
                        <th scope="col" id="tableCss">Image</th>
                        <th scope="col" id="tableCss">Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($order as $order)
                        <tr>
                        <td id="tdcolor">{{$order->name}}</td>
                        <td  id="tdcolor">{{$order->email}}</td>
                        <td  id="tdcolor">{{$order->address}}</td>
                        <td  id="tdcolor">{{$order->phone}}</td>
                        <td  id="tdcolor">{{$order->product_title}}</td>
                        <td  id="tdcolor">{{$order->quantity}}</td>
                        <td  id="tdcolor">Tsh.{{number_format($order->price)}}</td>
                        <td  id="tdcolor">{{$order->payment_status}}</td>
                        <td  id="tdcolor">{{$order->delivery_status}}</td>
                        <td  id="tdcolor">
                            <img style="width:140px;height:160px; border-radius:0px;" src="/products/{{$order->image}}">
                        </td>
                        <td>
                            @if($order->delivery_status=='processing')
                            <a href="{{url('delivered', $order->id)}}" class="btn btn-primary" onclick="return confirm('Are You Sure This Product  is delivered ? ');">Delivered</a>
                            @elseif($order->delivery_status=='Order Cancelled')
                            <p style="color:red; font-weight:bold";">Cancelled</p>
                            @else
                            <p style="color:green; font-weight:bold";">Delivered</p>
                            @endif
                        </td>
                        </tr>
                        @empty
                        <tr>
                          <td colspan="16" style="text-align:center; font-size:1.2rem; color:#fff;"> No Data Found</td>
                        </tr>
                        @endforelse
                    </tbody>
            </table>
          </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
   @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>