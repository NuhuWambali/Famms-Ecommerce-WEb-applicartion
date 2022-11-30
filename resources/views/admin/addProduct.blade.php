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
    .headProductCss{
        font-size:2rem;
    }
    .addproductdiv{
        text-align:center;
    }
    .formCss{
        padding:5% 15%;
    }
    #productFormColor{
        color:#fff;
        background-color:#000;
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
             <!-- to display message after adding product to database -->
             @if(session()->has('message'))
                 <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" arial-hidden="true">x</button>
                    {{session()->get('message')}}
                 
                 </div>
             @endif
               <div class="addproductdiv">
                    <h2 class="headProductCss">Add Product</h2>
               </div>
               <form action="{{url('add_product')}}" method="post" enctype="multipart/form-data">
                @csrf
               <div class="formCss">
                        <div class="mb-3">
                            <label for="exampleInputProductTitle" class="form-label">Product Title</label>
                            <input type="text" class="form-control" id="productFormColor" placeholder="Enter a title" name="title" required="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputProductDescription" class="form-label">Product Description</label>
                            <input type="text" class="form-control" id="productFormColor" placeholder="Enter a description" name="description" required="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputProductPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="productFormColor" placeholder="Enter a price" name="price" required="">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputProductDiscount" class="form-label">Product Discount</label>
                            <input type="number" class="form-control"  id="productFormColor" placeholder="Enter a discount" name="discount_price">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputProductDiscount" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control"  min="1" id="productFormColor" placeholder="Enter a quantity" name="quantity" required="">
                        </div>
                        <div class="mb-3">
                        <label for="exampleInputProductCategory" class="form-label">Product Category</label><br>
                        <select class="form-select" aria-label="Default select example" id="productFormColor" name="product_category" required="">
                             <option selected disabled>Add Category here</option>
                             <!-- at this start foreach loop we want to display category fo=rom database and this return the code at admin controller
                             that select all category value from database -->
                             @foreach($category as $category)
                            <option value=" {{$category->category_name}} ">{{$category->category_name}}</option>  <!-- this responsible for display all data fetched -->
                            @endforeach
                        </select>
                        </div>
                       <div class="mb-3">
                            <label for="formFile" class="form-label">Image Product</label>
                            <input class="form-control" type="file" id="formFile" name="image" required="">
                        </div>
                   
                         
                        <button type="submit" class="btn btn-primary">Submit</button>
               </div>
            </form>
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