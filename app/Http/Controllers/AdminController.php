<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
// this fetch and return category and view category page
    public function view_category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
  //  this function is for posting category to a database
    public function add_category(Request $request){
      $data=new Category;
      $data->category_name=$request->category;
      $data->save();
      return redirect()->back()->with('message','Category added successfully!');
    }
    // this function delete category
    public function delete_category($id){
    $data=Category::find($id);
    $data->delete();
    return redirect()->back()->with('message','Category Deleted Successfully!');
    }
    // this function return addproduct view page
    public function view_addProduct(){
      $category=Category::all();
      return view('admin.addProduct',compact('category'));
    }
// this function will add products to the database
    public function add_Product(Request $request){
      // to post data to database with multiple rows go with this codes
       $product=new product;
       $product->title=$request->title;
       $product->description=$request->description;
       $product->price=$request->price;
       $product->discount_price=$request->discount_price;
       $product->quantity=$request->quantity;
       $product->product_category=$request->product_category;
      //  to store image in database the codes are here
      $image=$request->image;
      $imageName=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('products',$imageName);
      $product->image=$imageName;
      // end image storing code
       $product->save();   // to save all data to database
      return redirect()->back()->with('message','Product Added Successfully!');
    }
      // this function return showproduct view page
      public function view_showProduct(){
        // this will fetch all data fro database and return it to blade page
        $data=Product::all();
        return view('admin.showProduct',compact('data'));
      }

      // this is a function to delete product from show product page
      public function delete_product($id){
        $data=Product::find($id);
        $data->delete();
        return redirect()->back()->with('message','Product Deleted Successfully!');

      }
      // this public function is able to return a view page for edit products
      public function update_product($id){
        $data=product::find($id);
        $category=category::all();
        return view('admin.editProduct',compact('data','category'));
      }

    //   this function will confirm the update product
    public function update_products_edit(Request $request,$id){
        $data=product::find($id);
        $data->title=$request->title;
        $data->description=$request->description;
        $data->price=$request->price;
        $data->discount_price=$request->discount_price;
        $data->quantity=$request->quantity;
        $data->product_category=$request->product_category;
        $image=$request->image;
        if($image){ //this will only execute when there is image and if no image is present the code wil be skipped
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('products',$imageName);
        $data->image=$imageName;
         }
        $data->save();
        return redirect()->back()->with('message','Product Successfully Edited!');
    }

    // this function will deals with orders
    public function order()
    {
      $order=order::all(); //this takes all data from order table and  send it to order view using compact
      return view('admin.Orders',compact('order'));
    }

    //this function will update delivered status
    public function delivered($id)
    {
      $order=order::find($id); //this will find specific id in order table
      $order->delivery_status='Delivered'; //this will update  delivered status to delivered
      $order->payment_status='Paid';
      $order->save();
      return redirect()->back();
    }

    //this function will make search order in order.blade.php
    public function search(Request $request){
      $searchText=$request->search;
      $order=order::where('name','LIKE',"%$searchText%")->orWhere('email','LIKE',"%$searchText%")->orWhere('address','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->
      orWhere('product_title','LIKE',"%$searchText%")->orWhere('price','LIKE',"%$searchText%")->orWhere('delivery_status','LIKE',"%$searchText%")->get();
      return view('admin.Orders',compact('order'));
    }
}
