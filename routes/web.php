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
    return view('layouts.admin-app');
});

Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');


//admin route
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/admin','Admin\AdminController@index')->name('admin.index');
});



//supplier route
Route::prefix('supplier')->middleware('supplier')->group(function(){
    Route::get('/supplier','Supplier\SupplierController@index')->name('supplier.index');

    //all admin route will gose here


});


//buyer route
Route::prefix('buyer')->middleware('buyer')->group(function(){
    Route::get('/buyer','Buyer\BuyerController@index')->name('buyer.index');


    //all supplier route will gose here

});

//seller route
Route::prefix('seller')->middleware('seller')->group(function(){
    Route::get('/seller','Seller\SellerController@index')->name('seller.index');


    //all supplier route will gose here
    
});


