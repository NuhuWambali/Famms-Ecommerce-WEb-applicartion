<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;

class HomeController extends Controller
{
    //here we create public function to return view
    public function index(){
        $product=product::paginate(12); //this will take all data from product table
        return view('home.userpage',compact('product'));
    }

    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1')
        {

            // this codes here is for showing admin dashbord data
            $total_products=product::all()->count();
            $total_orders=order::all()->count();
            $total_customers=user::all()->count();
            $order_delivered=order::where('delivery_status', '=', 'delivered')->get()->count();
            $order_processing=order::where('delivery_status', '=', 'processing')->get()->count();
            $order_cancelled=order::where('delivery_status', '=', 'Order Cancelled')->get()->count();
            // to show total revenue code
            $order=order::all();
            $total_revenue=0;
        
            foreach($order as $order){
                $total_revenue=$total_revenue+$order->price;
               }
            return view('admin.adminpage',compact('total_products','total_orders','total_customers','order_delivered','order_processing','total_revenue','order_cancelled',));
        }
        else
        {
            $product=product::paginate(12); //this will take all data from product table
            $user=Auth::user();
            $userId=$user->id;
            $total_cart=cart::where('user_id', '=', $userId)->count();
            return view('home.userpage',compact('product','total_cart'));
        }
      
    }
    // this function will return view product details
    public function product_details($id){
        $product=product::find($id);
        return view('home.product_details',compact('product'));
    }
//    this function will be able to add products to cart
    public function add_cart(Request $request,$id)
    {
            //check if user have logged in
            if(Auth::user())
            {
                //getting specific user data
                $user=Auth::user();
                // dd($user); to check if things are catched from database
                $product=product::find($id); //this will get product details
                //add products to cart
                $cart=new Cart;
                // first we get the user details
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                // now get product data
                $cart->product_id=$product->id;
                $cart->product_title=$product->title;
                // if product has discount price we store as price
                if($product->discount_price!=null)
                {
                    $cart->price=$product->discount_price * $request->quantity; //multiplication is to multiply quantity with the price to get total price
                }
                else
                {
                    $cart->price=$product->price * $request->quantity;
                }

                $cart->image=$product->image;
                $cart->quantity=$request->quantity;
                $cart->save();
                return redirect()->back();
            }
            else
            {
            return redirect('login');
            }
    }

    // this public function return show_cart view page
    public function show_cart()
    {

        if(Auth::id()) //if user with specific id has logged in
        {
            //$id=Auth::user()->id; //to catch user id from database users table
            $cart= Auth::user()->cart; //cart::where('user_id', '=', $id)->get();// this will catch specific user who adds cart
             return view('home.showCart', compact('cart')); //send user id for cart data to showcart page
        }
        else
        {
            return redirect('login');
        }

    }

    // this function wil remove cart from the list of Cart added
    public function remove_cart($id)
    {
      $cart=cart::find($id);
      $cart->delete();
      return redirect()->back();
    }
    // this function will add order to database
    public function cash_order()
    {
        $user=Auth::user();  //this will get current user logged in
        $userid=$user->id;   // this will get curent user logged in id
        $CartData=cart::where('user_id', '=', $userid)->get(); //this try to get data from current loggedin user id and match it to userid in cart table

        // inorder to use to upload multiplr data from cart and anywhere else use foreach loop
        foreach($CartData as $cartdata)
        {
           $order= new order;
            // getting data from cart table and store to order table
           $order->name=$cartdata->name;
           $order->email=$cartdata->email;
           $order->phone=$cartdata->phone;
           $order->address=$cartdata->address;
           $order->user_id=$cartdata->user_id;
           $order->product_title=$cartdata->product_title;
           $order->price=$cartdata->price;
           $order->quantity=$cartdata->quantity;
           $order->image=$cartdata->image;
           $order->product_id=$cartdata->product_id;
        //    order data added not from cart but to show status
           $order->payment_status='cash on delivery';
           $order->delivery_status='processing';
           $order->save();
        //    after submiting order to order table we must delete products in cart
           $cart_id=$cartdata->id; //this catch cart id by specific user;
           $cart=cart::find($cart_id); //this takes cart id and find it in cart table   
           $cart->delete(); //delete the cart data for this id
       }
    return redirect()->back()->with('message','We Have Received Your Order! we will connect with you soon...!');
   }

//    this public function will retun show order view page
   public function show_order(){
    if(Auth::id()){ //if the system has login id only login user must be able to see orders

        //to show specific products to specific user
        $user=Auth::user(); //catch logged in user data
        $userId=$user->id;  //catch user id from user table
        $order=order::where('user_id', '=', $userId)->get(); //this will compare btn userId from user table and ordertable
        return view('home.order', compact('order'));
    }
   else{
    return redirect('login');
    }
   }

   //this public function will be used to cancel order
    public function cancel_order($id){
        $order=order::find($id); //this find specific id to update data
        $order->delivery_status='Order Cancelled'; //this will fill the row after cancel order
        $order->save();
        return redirect()->back();
    }
}