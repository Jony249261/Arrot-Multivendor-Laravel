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
Route::get('/admin','Admin\AdminController@index')->name('admin.index')->middleware('admin');
Route::get('/buyer','Buyer\BuyerController@index')->name('buyer.index')->middleware('buyer');
Route::get('/seller','Seller\SellerController@index')->name('seller.index')->middleware('seller');
Route::get('/supplier','Supplier\SupplierController@index')->name('supplier.index')->middleware('supplier');

Route::get('/home', 'HomeController@index')->name('home');
