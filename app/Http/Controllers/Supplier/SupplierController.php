<?php

namespace App\Http\Controllers\Supplier;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{

    public function index(){
        $orders = Order::all();
        $users = User::all();
        $billings = Billing::all();
        $products=Product::latest()->limit(6)->get();
        $chart=Product::with('orders')->withCount(['orders'=>function($query){
            $query->orderBy('orders_count', 'asc');
        }])->take(5)->get();
        $chartData="";
        foreach ($chart as $list){
            $chartData.="['".$list->product_name."', ".$list->orders_count."],";
        }
        $arr['chartData']=rtrim($chartData,",");


        return view('supplier.index',$arr,compact('orders','users','billings','products'));
    }
}
