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
    //all Supplier route will gose here
    Route::get('/','Supplier\SupplierController@index')->name('supplier.index');

    //    Supplier Buyer Route
    Route::get('/buyer/index','Supplier\BuyerController@index')->name('supplier.buyer.index');
    Route::get('/buyer/create','Supplier\BuyerController@create')->name('supplier.buyer.create');
    Route::post('/buyer/store','Supplier\BuyerController@store')->name('supplier.buyer.store');
    Route::post('/buyer/delete/{id}','Supplier\BuyerController@delete')->name('supplier.buyer.delete');
    Route::get('/buyer/edit/{id}','Supplier\BuyerController@edit')->name('supplier.buyer.edit');
    Route::post('/buyer/update/{id}','Supplier\BuyerController@update')->name('supplier.buyer.update');

    // unite route
    Route::get('/unit/index','Supplier\UnitController@index')->name('unit.index');
    Route::post('/unit/store','Supplier\UnitController@store')->name('supplier.unit.store');
    Route::get('/unit/delete/{id}','Supplier\UnitController@delete')->name('supplier.unit.delete');
    Route::post('/unit/update/{id}','Supplier\UnitController@update')->name('supplier.unit.update');

    //products route
    Route::resource('/products','Supplier\ProductController');

    //support user
    Route::resource('/users', 'Supplier\UserController');

    //Supplier seller route

    Route::get('/seller/index','Supplier\SellerController@index')->name('supplier.seller.index');
    Route::get('/seller/create','Supplier\SellerController@create')->name('supplier.seller.create');
    Route::post('/seller/store','Supplier\SellerController@store')->name('supplier.seller.store');
    Route::post('/seller/delete/{id}','Supplier\SellerController@delete')->name('supplier.seller.delete');



});


//buyer route
Route::prefix('buyer')->middleware('buyer')->group(function(){
    //all Buyer route will gose here
    Route::get('/','Buyer\BuyerController@index')->name('buyer.index');

    //order
    Route::resource('/orders', 'Buyer\OrderController');

    //buyer user
    Route::resource('/buyer-users', 'Buyer\UserController');


});

//seller route
Route::prefix('seller')->middleware('seller')->group(function(){
    Route::get('/','Seller\SellerController@index')->name('seller.index');


    //all Seller route will gose here

});


