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

    <style>
      .heading{
        text-align:center;
        padding-top:30px;
      }
      .h2_style{
        font-size:2rem;
        padding-bottom:35px;
      }
      .input_color{
        color:black;
        margin-right:20px;
        margin-bottom:10px;
      }
      .tableCss{
        padding:5% 15%;
      }
      #thcss{
        color:#fff;
      }
      .tdCss{
        color:#fff;
      }
    </style>
  </head>
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
            <!-- displaying alert mesaage for displaying message -->
            @if(session()->has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" arial-hidden="true">x</button>
              {{session()->get('message')}}
            </div>
            @endif
              <div class="heading">
                  <h2 class="h2_style"> Add Category</h2>
                  <form action="{{url('add_category')}}" method="post">
                    @csrf
                    <input class="input_color" type="text" name="category" placeholder="Enter Category name" >
                    <input type="submit" class="btn btn-success" name="submit" value="Add category">
                  </form>
              </div>
              <div class="tableCss">  
              <table class="table table-dark table-striped">
                  <thead>
                    <tr>
                      <th scope="col" id="thcss">Id</th>
                      <th scope="col" id="thcss">Category Name</th>
                      <th scope="col" id="thcss">Created At</th>
                      <th scope="col" id="thcss">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $data)
                    <tr>
                      <td class="tdCss">{{$data->id}}</td>
                      <td class="tdCss">{{$data->category_name}}</td>
                      <td class="tdCss">{{$data->created_at}}</td>
                      <td>
                        <a onclick="return confirm('Are You Sure You Want To Delete This Category?')" 
                           class="btn btn-danger" href="{{url('/delete_category',$data->id)}}">Delete</a>
                      </td>
                    </tr> 
                    @endforeach
                  </tbody>
               </table>
              </div>
          
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