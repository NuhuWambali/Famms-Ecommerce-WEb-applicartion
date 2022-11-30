<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// this route wiill automaticall call home controller and use the function which deside user and his/her spesific page after authentication
Route::get('/redirect',[HomeController::class, 'redirect']);

// this return index fuction in home controller
Route::get('/',[HomeController::class, 'index']);

// route to return view catagory
Route::get('/view_category', [AdminController::class, 'view_category']);

// this route return add catagory functionalities
Route::post('/add_category', [AdminController::class, 'add_category']);

// this route return delete function from the Admincontroller
Route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);

// this route will call adminController to return view_addProductPage
Route::get('/view_addProduct',[AdminController::class, 'view_addProduct']);


// this route will call adminController to return addProductfunctionality
Route::post('add_product',[AdminController::class, 'add_Product']);


// this route will call adminController to return show_addProductPage
Route::get('/view_showProduct',[AdminController::class, 'view_showProduct']);

// this route aim to delete products from showproduct page
Route::get('/delete_product/{id}', [AdminController::class, 'delete_product']);

// this route will call admincontroller to use update function to return update(edit) page
Route::get('update_product/{id}', [AdminController::class, 'update_product']);

// this route wil call adminController and then update the products
Route::post('/update_product_edit/{id}', [AdminController::class, 'update_products_edit']);

// this route will contact admin controler to deals with orders
Route::get('/order', [AdminController::class, 'order']);


//this route is for update the deliver and payment status 
Route::get('/delivered/{id}', [AdminController::class, 'delivered']);

//this route will call admin controller and return seacrh
Route::get('/search', [AdminController::class, 'search']);



// homeRoutes start here


// this will return a product details view
Route::get('product_details/{id}',[HomeController::class, 'product_details']);

// this route will add products to cart
Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

// this route will be able to call Homecontroller and return viewpage of showCart
Route::get('/show_cart',[HomeController::class, 'show_cart']);

// this route will call remove cart function in home controller
Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart']);

// this route will use function cash order in home controller to order
Route::get('/cash_order', [HomeController::class, 'cash_order']);


//this route will automatically call homeController and return show order view page
Route::get('/show_order', [HOmeController::class, 'show_order']);


// this route will use homecontroller and function cancel order to cancel order
Route::get('/cancel_order/{id}', [HomeController::class, 'cancel_order']);



