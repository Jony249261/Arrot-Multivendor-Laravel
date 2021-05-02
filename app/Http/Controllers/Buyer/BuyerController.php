<?php

namespace App\Http\Controllers\Buyer;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class BuyerController extends Controller
{

    public function index(){
        if(auth()->user()->role == 'warehouse'){
            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->latest()->get();
        }

        elseif(auth()->user()->role == 'accounts'){
            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->where('status','received')->Orwhere('status','received')->latest()->get();

        }
        else{

            $orders = Order::where('buyer_id',auth()->user()->buyer_id)->latest()->get();
        }
        $user = User::where('parent_id',auth()->user()->id)->count();
        $products=Product::latest()->limit(6)->get();
        return view('buyer.index',compact('user','orders','products'));
    }
}
