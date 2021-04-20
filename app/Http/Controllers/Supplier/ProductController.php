<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPrice;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
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
        $products = Product::latest()->paginate(10);
        $prices = ProductPrice::where('updated_at',Carbon::now())->where('product_id',3);
        dd($prices); 
        return view('supplier.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $units = Unit::all();
        return view('supplier.product.create',compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request->all());
         $data = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'purchase_rate' => 'sometimes|nullable|numeric',
            'sales_rate' => 'required|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'unit_id' => 'required|numeric',
            'product_type' => 'required|string',
        ]);
        $data['product_id'] = '0001';
        $product = new Product();
        $product->product_id = $data['product_id'];
        $product->product_name = $data['product_name'];
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
        // $product_price->purchase_rate = $data['purchase_rate'];
        $product_price->sales_rate = $data['sales_rate'];
        $product->productPrices()->save($product_price);
        // $product_price->save();
       
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
    public function edit($id)
    {
        $productPrice = ProductPrice::findOrFail($id);
        $units = Unit::all();
        return view('supplier.product.edit',compact('productPrice','units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         dd($request->all());
        $data = $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'purchase_rate' => 'required|numeric',
            'sales_rate' => 'required|numeric',
            'image' => 'sometimes|nullable|mimes:jpeg,jpg,png,gif|required|max:10000',
            'unit_id' => 'required|numeric',
            'product_type' => 'required|string',
        ]);
        $data['product_id'] = '0001';
        $product = new Product();
        $product->product_id = $data['product_id'];
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
