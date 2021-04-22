<?php

namespace App\Http\Controllers\Supplier;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->paginate(15);
        return view('supplier.order.index',compact('orders'));
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        $billings = Billing::where('order_id',$id)->get();
        return view('supplier.order.show',compact('order','billings'));
    }

    public function status(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->status;
        $order->update(['status' => $status]);
        Session::flash('info','Order status updated successfully!!');
        return back();
    }
}
