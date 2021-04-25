<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Seller;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\SellerPropose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public  function  index(){
        $products=Product::all();
        return view('seller.product.index',compact('products'));
    }
    public  function store(Request  $request){



        $products = $request->products;
        $quantities = $request->quantites;
        $prices = $request->prices;
        $sellerpro=new SellerPropose();
        foreach($products as $key => $product_id)
        {
            $sellerpro->product_id=$product_id;
            $sellerpro->price=$prices[$key];
            $sellerpro->quantity=$quantities[$key];
            $sellerpro->seller_id=Auth::user()->seller_id;
            $sellerpro->save();
            return redirect()->back();

        }



    }
}
