@extends('layouts.supplier-app')

@section('product', 'active')
@section('title', 'Edit product')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2>Edit Product</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('products.index') }}" class="btn btn-default">View</a>
                    </ul>

                </div>
                <form id="form_validation" action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                            name="product_name" value="{{ old('product_name',$product->product_name) }}" required>
                                        {{-- <label class="form-label">Product Name</label> --}}
                                        @error('product_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize"
                                            required>{{ old('description',$product->product_description) }}</textarea>
                                        
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Unit</label><br>
                                    @foreach ($units as $unit)
                                    <input type="radio" name="unit_id" @if($unit->id == $product->unit_id) checked @endif value="{{ $unit->id }}" id="unit_id{{ $unit->id }}" class="with-gap">
                                    <label for="unit_id{{ $unit->id }}">{{ ucfirst($unit->name) }}</label>
                                    @endforeach

                                </div>
                               
                               
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image">

                                        @error('image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="number" class="form-control @error('sales_rate') is-invalid @enderror"
                                            name="sales_rate" value="{{ old('sales_rate') }}" required>
                                        {{-- <label class="form-label">Sales Rate</label> --}}
                                        @error('sales_rate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 100px">
                                    <label for="">Product Type</label><br>
                                    <input type="radio" @if($product->product_type == 'vagetable') checked @endif name="product_type" value="vegetable" id="Vegetable" class="with-gap">
                                    <label for="Vegetable">Vegetable</label>

                                    <input type="radio" name="product_type" @if($product->product_type == 'fish') checked @endif value="fish" id="Fish" class="with-gap">
                                    <label for="Fish" class="m-l-20">Fish</label>

                                    <input type="radio" name="product_type" value="meat" @if($product->product_type == 'meat') checked @endif id="meat" class="with-gap">
                                    <label for="meat" class="m-l-20">Meat</label>
                                </div>

                            </div>
                        </div>
                         <button class="btn btn-primary waves-effect" type="submit">UPDATE</button>
                 </form>
            </div>

        </div>

    </div>
@endsection


@section('page-scripts')
    
@endsection