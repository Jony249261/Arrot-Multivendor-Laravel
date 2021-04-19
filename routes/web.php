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
});



//supplier route
Route::prefix('supplier')->middleware('supplier')->group(function(){
    Route::get('/','Supplier\SupplierController@index')->name('supplier.index');


//    Supplier Buyer Route

Route::get('/buyer/index','Supplier\BuyerController@index')->name('supplier.buyer.index');

    //all Supplier route will gose here


});


//buyer route
Route::prefix('buyer')->middleware('buyer')->group(function(){
    Route::get('/','Buyer\BuyerController@index')->name('buyer.index');


    //all Buyer route will gose here

});

//seller route
Route::prefix('seller')->middleware('seller')->group(function(){
    Route::get('/','Seller\SellerController@index')->name('seller.index');


    //all Seller route will gose here

});


