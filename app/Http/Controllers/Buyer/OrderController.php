<?php

namespace App\Http\Controllers\Buyer;

use App\Billing;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderProduct;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id',auth()->user()->id)->latest()->paginate(15);
        return view('buyer.order.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::latest()->paginate(15);
        return view('buyer.order.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $products = $request->input('products');
        $quantities = $request->input('quantites');
        $prices = $request->input('prices');

        //insert data in orders table
        $order = Order::create(
            [
                'user_id' => auth()->user()->id,
                'buyer_id' => auth()->user()->buyer_id,
                'amount' => 1000,
            ]
        );
        $order->delivery_date = $order->created_at->addDays(3);
        $order->save();
        //insert data in order_product table
        foreach($quantities as $id => $qty){
            if($products[$id] && $qty > 0){
                // echo $products[$id]." qty". $qty."<br>";
                OrderProduct::create([
                    'product_id' => $products[$id],
                    'order_id' => $order->id,
                    'qty' => $qty
                ]);

            }

        }
        Session::flash('success','Order created successfully!!');
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $billings = Billing::where('order_id',$order->id)->get();
        return view('buyer.order.show',compact('order','billings'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('buyer.order.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($request->has('delivery_date') || $request->has('amount')){
            $order->update($request->all());
        }
        $products = $request->input('products');
        $quantities = $request->input('quantites');
        foreach($quantities as $id => $qty){
            $order_product = OrderProduct::where('order_id',$order->id)->where('product_id',$products[$id])->first();

            if($products[$id] && $qty > 0 ){

                $order_product->product_id = $products[$id];
                $order_product->order_id = $order->id;
                $order_product->qty = $qty;
                $order_product->save();

            }
        }
        Session::flash('info','Order has been updated successfully!!');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}