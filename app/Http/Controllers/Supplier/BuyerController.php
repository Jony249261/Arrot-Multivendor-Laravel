<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public  function index(){
        return view('supplier.buyer.index');
    }
    public  function  create(){
        return view('supplier.buyer.create');
    }
    public  function  store(Request $request){
        dd($request->all());
    }
}
