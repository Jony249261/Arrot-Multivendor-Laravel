<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Seller;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\SellerPropose;
use Illuminate\Database\Eloquent\Model;
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
//      dd($request->all());
        $products = $request->products;
        $quantities = $request->quantites;
        $prices = $request->prices;

        foreach($products as $key => $product)
        {
            $sellerpro=new SellerPropose();
            if($products[$key] && $product > 0){

                $sellerpro->product_id=$product;
                $sellerpro->price=$prices[$key];
                $sellerpro->quantity=$quantities[$key];
                $sellerpro->seller_id=Auth::user()->seller_id;
                $sellerpro->save();
            }

        }
        Session::flash('success','Propsoe successfully!!');
        return redirect()->back();
    }
}
