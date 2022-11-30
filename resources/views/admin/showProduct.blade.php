<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Ecommerce</title>
    <!-- plugins:css -->
   @include('admin.styleCSS')
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <style>

    #th_color{
      color:#000;
      background-color:#fff;
    }
    #table_border{
      border:1px solid #fff;
    }
    .imageCss{
      width:200px;
      height:250px;
    }
    .font_colorTd{
      color:azure;
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
      <div class="main-panel">
          <div class="content-wrapper">
          <!-- this is for displaying message if product is deleted successfully -->
         @if(session()->has('message'))
         <div class="alert alert-success">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
           {{session()->get('message')}}
         </div>
         @endif

            <h2 style="text-align:center; font-size:2rem; padding:15px 0; margin-bottom:7px;">All Products</h2>
            <div class="tableCss">
            <table class="table" id="table_border">
                  <thead>
                    <tr>
                      <th scope="col" id="th_color">Id</th>
                      <th scope="col" id="th_color">Title</th>
                      <th scope="col" id="th_color">Description</th>
                      <th scope="col"  id="th_color">Price</th>
                      <th scope="col" id="th_color">Discount Price</th>
                      <th scope="col" id="th_color">Quantity</th>
                      <th scope="col" id="th_color">Product Category</th>
                      <th scope="col" id="th_color">Image</th>
                      <th scope="col" id="th_color">Edit</th>
                      <th scope="col" id="th_color">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach($data as $data)
                    <tr>
                      <td class="font_colorTd">{{$data->id}}</td>
                      <td class="font_colorTd">{{$data->title}}</td>
                      <td class="font_colorTd">{{$data->description}}</td>
                      <td class="font_colorTd">{{$data->price}}</td>
                      <td class="font_colorTd">{{$data->discount_price}}</td>
                      <td class="font_colorTd">{{$data->quantity}}</td>
                      <td class="font_colorTd">{{$data->product_category}}</td>
                      <td>
                        <img style="width:140px; height:160px; border-radius:0px;" src="/products/{{$data->image}}">
                      </td>
                      <td>
                         <a  class="btn btn-primary" href="{{url('update_product',$data->id)}}">Edit</a>
                      </td>
                      <td>
                        <a onclick="return confirm ('Are You Sure You Want To Delete This Product?')" class="btn btn-danger" href="{{url('/delete_product',$data->id)}}">Delete</a>
                      </td>
                    </tr>
                    @endforeach
            </tbody>
          </table>
          </div>









          </div>
      </div>
        <!-- partial -->
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
