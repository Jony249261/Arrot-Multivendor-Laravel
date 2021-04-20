<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    public  function index(){
        return view('supplier.seller.index');
    }
    public  function  create(){
        return view('supplier.seller.create');
    }
    public  function  store(Request $request){
        dd($request->all());
    }
}
