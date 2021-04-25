<?php

use Illuminate\Support\Facades\Route;

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

//new laravel project

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


//admin route
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/','Admin\AdminController@index')->name('admin.index');
    Route::get('/profile/index','Admin\ProfileController@index')->name('admin.profile.index');
    Route::get('/profile/edit','Admin\ProfileController@edit')->name('admin.profile.edit');
    Route::post('/profile/update','Admin\ProfileController@update')->name('admin.porfile-update');
});




//supplier route
Route::prefix('supplier')->middleware('supplier')->group(function(){
    //all Supplier route will gose here
    Route::get('/','Supplier\SupplierController@index')->name('supplier.index');

    //    Supplier Buyer Route
    Route::get('/buyer/index','Supplier\BuyerController@index')->name('supplier.buyer.index');
    Route::get('/buyer/create','Supplier\BuyerController@create')->name('supplier.buyer.create');
    Route::post('/buyer/store','Supplier\BuyerController@store')->name('supplier.buyer.store');
    Route::post('/buyer/delete/{id}','Supplier\BuyerController@delete')->name('supplier.buyer.delete');
    Route::get('/buyer/edit/{id}','Supplier\BuyerController@edit')->name('supplier.buyer.edit');
    Route::get('/buyer/profile/{id}','Supplier\BuyerController@profile')->name('supplier.buyer.profile');
    Route::post('/buyer/update/{id}','Supplier\BuyerController@update')->name('supplier.buyer.update');

    // unite route
    Route::get('/unit/index','Supplier\UnitController@index')->name('unit.index');
    Route::post('/unit/store','Supplier\UnitController@store')->name('supplier.unit.store');
    Route::get('/unit/delete/{id}','Supplier\UnitController@delete')->name('supplier.unit.delete');
    Route::post('/unit/update/{id}','Supplier\UnitController@update')->name('supplier.unit.update');
// Supplier Profile

    Route::get('/profile/index','Supplier\ProfileController@index')->name('supplier.profile.index');
    Route::get('/profile/edit','Supplier\ProfileController@edit')->name('supplier.profile.edit');
    Route::post('/profile/update','Supplier\ProfileController@update')->name('supplier.porfile-update');

    //products route
    Route::resource('/products','Supplier\ProductController');

    //support user
    Route::resource('/users', 'Supplier\UserController');

    //Supplier seller route

    Route::get('/seller/index','Supplier\SellerController@index')->name('supplier.seller.index');
    Route::get('/seller/create','Supplier\SellerController@create')->name('supplier.seller.create');
    Route::post('/seller/store','Supplier\SellerController@store')->name('supplier.seller.store');
    Route::post('/seller/delete/{id}','Supplier\SellerController@delete')->name('supplier.seller.delete');
    Route::get('/seller/edit/{id}','Supplier\SellerController@edit')->name('supplier.seller.edit');
    Route::post('/seller/update/{id}','Supplier\SellerController@update')->name('supplier.seller.update');
    Route::get('/seller/profile/{id}','Supplier\SellerController@profile')->name('supplier.seller.profile');



    //order
    Route::get('/orders','Supplier\OrderController@index')->name('order.index');
    Route::get('/order/show/{id}','Supplier\OrderController@show')->name('order.show');
    Route::put('/order/status/{id}','Supplier\OrderController@status')->name('supplier.order.status');
    Route::get('/order/invoice/{id}','Supplier\OrderController@invoice')->name('order.invoice');
    Route::get('/order/index/pdf','Supplier\OrderController@generatePdf')->name('order.index.pdf');



});


//buyer route
Route::prefix('buyer')->middleware('buyer')->group(function(){
    //all Buyer route will gose here
    Route::get('/','Buyer\BuyerController@index')->name('buyer.index');

//    Profile ROute
 Route::get('/profile/index','Buyer\ProfileController@index')->name('profile.index');
 Route::get('/profile/edit','Buyer\ProfileController@edit')->name('profile.edit');
 Route::post('/profile/update/{id}','Buyer\ProfileController@update')->name('buyer.profile.update');
 Route::get('/profile/user_edit','Buyer\ProfileController@user_edit')->name('buyer.user.update');
Route::post('/profile/user_update','Buyer\ProfileController@user_update')->name('buyer.user.porfile-update');



    //order
    Route::resource('/orders', 'Buyer\OrderController');
    Route::put('/order/received/{id}', 'Buyer\OrderController@received')->name('orders.received');

    Route::post('/order/payment','Buyer\BillingController@store')->name('buyer.order.payment');

    //buyer user
    Route::resource('/buyer-users', 'Buyer\UserController');

    //support route
     Route::get('/support/index','Buyer\SupportController@index')->name('support.index');



});

//seller route
Route::prefix('seller')->middleware('seller')->group(function(){
    Route::get('/','Seller\SellerController@index')->name('seller.index');



// Seller Product
    Route::get('/product/index','Seller\ProductController@index')->name('seller.product.index');
    Route::post('/add-to-cart/{id}','Seller\ProductController@addToCart')->name('add-to.cart');
    Route::post('/seller/propose/store','Seller\ProductController@store')->name('seller.propose.store');
    //all Seller route will gose here

});



