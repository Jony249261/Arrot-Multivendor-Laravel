<?php

namespace App\Http\Controllers\Supplier;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    
    public function index(){
        $orders = Order::all();
        $users = User::all();
        $billings = Billing::all();
        return view('supplier.index',compact('orders','users','billings'));
    }
}
