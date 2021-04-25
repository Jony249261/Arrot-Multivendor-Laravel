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
        $products=Product::latest()->paginate(15);
        return view('seller.product.index',compact('products'));
    }
    public  function addToCart(Request $request,$id){


        // dd($request->all());
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
        if(!$cart){
            $cart = [
                $product->id => [
                    'product_id' => $product->id,
                    'quantity' => $request->quantity,
                    'price' => $product->price,
                    'user_id' => auth()->user()->seller_id
                    ]
                ];
                session()->put('cart',$cart);
                return redirect()->back()->with('success','Added to cart');
        }
        
        $cart[$product->id] = [
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'user_id' => auth()->user()->seller_id
        ];
        session()->put('cart',$cart);

        return back();












        // $products = $request->products;
        // $quantities = $request->quantites;
        // $prices = $request->prices;
        // $sellerpro=new SellerPropose();
        // foreach($prices as $key => $price)
        // {
            
        //         echo $products[$key].' price '.$price.' qty '.$qty.'<br>';
            
            // $sellerpro->product_id=$products[$key];
            // $sellerpro->price=$prices[$key];
            // $sellerpro->quantity=$quantities[$key];
            // $sellerpro->seller_id=Auth::user()->seller_id;
            // $sellerpro->save();
            // return redirect()->back();

        // }



    }

    public function store(Request $request)
    {
        // dd($request->all());
        foreach(session('cart') as $cart){
            SellerPropose::create([
                'product_id' => $cart['product_id'],
                'quantity' =>$cart['quantity'],
                'price' => $cart['price'],
                'seller_id' => $cart['user_id']
            ]);
        }
        session()->forget('cart');
        return back();
    }
}
