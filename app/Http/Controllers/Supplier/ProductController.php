<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPrice;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('supplier.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.product.create');
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
         $data = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'purchase_rate' => 'required|numeric',
            'sales_rate' => 'required|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'unit_id' => 'required|numeric',
            'product_type' => 'required|string',
        ]);

        $product = new Product();
        $product->product_id = $product->id;
        $product->product_name = $data['product_name'];
        // $product->slug = $data['product_name'].'-'.'testing';
        // $product->product_code = $data['product_code'];
        $product->product_description = $data['description'];
        $product->unit_id = $data['unit_id'];
        $product->product_type = $data['product_type'];
        if($request->has('image')){
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('products/'.$name_gen);
            $product->image = $name_gen;
        }
        $product->save();

        $product_price =new ProductPrice();
        $product_price->product_id = $product->id;
        $product_price->purchase_rate = $data['purchase_rate'];
        $product_price->sales_rate = $data['sales_rate'];
        $product_price->save();
       
        Session::flash('success'.'Product created successfully!!');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
