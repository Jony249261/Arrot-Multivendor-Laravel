<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductPrice;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use Image;
use Illuminate\Support\Str;

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
        // $product = Product::find(5);
        // dd($product->productPrices->sortByDesc('updated_date')->first()->sales_rate); 
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
        $product = new Product();
        if($request->product_type == 'vegetable'){
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'veg');
        }elseif($request->product_type == 'fish'){
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'fis');
        }else{
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'met');
        }
        $product->product_id = $product_id;
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
       
        Session::flash('success','Product created successfully!!');
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
        $product = Product::findOrFail($id);
        $units = Unit::all();
        return view('supplier.product.edit',compact('product','units'));
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
        // $limit = Str::limit($data['product_type'], 3);
        $product = Product::findOrFail($id);
        if($request->product_type == 'vegetable'){
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'veg');
        }elseif($request->product_type == 'fish'){
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'fis');
        }else{
            $product_id = Helper::IDGenerator(new Product,'product_id',3,'met');
        }
        $product->product_id = $product_id;
        $product->product_name = $data['product_name'];
        $product->product_description = $data['description'];
        $product->unit_id = $data['unit_id'];
        $product->product_type = $data['product_type'];
        $path = 'products/'.$product->image;
        if($request->has('image')){
            if(file_exists(public_path($path))){
                unlink($path);
            }
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('products/'.$name_gen);
            $product->image = $name_gen;
        }
        $product->save();

        $product_price =new ProductPrice();
        $product_price->sales_rate = $data['sales_rate'];
        $product_price->updated_date = date('Y-m-d');
        $product->productPrices()->save($product_price);
       
        Session::flash('info'.'Product updated successfully!!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($product->id);
        // $product = Product::findOrFail($id);
        // $product->productPrices()->delete();
        // $path = 'products/'.$product->image;
        // if(file_exists(public_path($path))){
        //     unlink($path);
        // }
        // $product->delete();
        // Session::flash('success'.'Product deleted successfully!!');
        // return redirect()->back();
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->productPrices()->delete();
        $path = 'products/'.$product->image;
        if(file_exists(public_path($path))){
            unlink($path);
        }
        $product->delete();
        Session::flash('warning'.'Product deleted successfully!!');
        return redirect()->back();
    }
}
