@extends('layouts.supplier-app')

@section('product', 'active')
@section('title', 'Product List')

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Product list

            </h2>
            
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-orange text-center">
                        <h2>
                            ALL PRODUCT
                            
                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('products.create') }}" class="btn btn-default">Create</a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Product ID') }}</th>
                                        <th>{{ __('Product Image') }}</th>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Unit') }}</th>
                                        <th>{{ __('Type') }}</th>
                                        {{-- <th>{{ __('Purchase Rate') }}</th>
                                        <th>{{ __('Today Price') }}</th>
                                        <th>{{ __('Previous Price') }}</th> --}}
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $i => $product)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $product->product_id }}</td>
                                            <td>
                                                <img height="80" src="{{ asset('products/'.$product->image) }}" alt="">
                                            </td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ ucfirst($product->unit->name) }}</td>
                                            <td>{{ ucfirst($product->product_type) }}</td>
                                            
                                            {{-- @foreach (App\ProductPrice::where('updated_date',date('Y-m-d'))->where('product_id',$product->id)->get() as $price)
                                            <td>{{ number_format($price->purchase_rate,2) }}</td>
                                            <td>
                                                @php
                                                    $today_price = App\ProductPrice::where('updated_date',date('Y-m-d'))->where('product_id',$product->id)->first();
                                                    dd($today_price->sales_rate);
                                                @endphp 
                                                 {{ $today_price->sales_rate }}
                                            </td> 
                                             @endforeach --}}
                                            <td>
                                                <div class="icon-button-demo">
                                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info waves-effect" style="float: left">
                                                        <i class="material-icons">edit</i>
                                                    </a>

                                                    <form action="{{ route('products.destroy',$product->id) }}" onsubmit="return confirm('Are you sure?')" method="POST">
                                                        @csrf
                                                        @method('DELETE')
    
                                                        <button type="submit" class="btn btn-danger waves-effect" style="float: left;margin-left:5px">
                                                            <i class="material-icons">delete_forever</i>
                                                        </button>
                                                    </form>

                                                </div>
                                                {{-- <div class="btn-group">
                                                    <a href="{{ route('products.edit',$product->id) }}" class="btn btn-info">Edit</a>
                                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger float-left">Delete</button>
                                                    </form>
                                                </div> --}}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">No Item Found!!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection
