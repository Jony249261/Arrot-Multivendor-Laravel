@extends('layouts.seller-app')

@section('product-create','active')
@section('title','Create')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2 class="text-center">Create Product</h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Product Image') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>Discription</th>
                                <th>{{ __('Unit') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>


                            </tr>
                            </thead>

                            <tbody>

                                <form action="{{ route('seller.product.create') }}" method="post">
                                    @csrf
                                    @forelse ($products as $i => $product)
                                    <tr role="row" class="odd">
                                        <td>{{ $i + 1 }}</td>
                                        <td><img src="{{ asset('products/' . $product->image) }}"
                                                 width="60" height="60" alt=""></td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>{{ Str::limit($product->product_description, 50) }}</td>
                                        <td>{{ $product->unit->name }}</td>

                                        <td>
                                            <input type="hidden" name="products[]" value="{{ $product->id }}" id="">

                                            <input type="number" min="0" name="quantites[]" style="width: 80px" placeholder="Ex: XXX"  id="qty">


                                        </td>
                                        <td ><input type="number" min="0" name="prices[]" style="width: 80px"  placeholder="Ex:00.00" id="price">

                                        </td>


                                    </tr>
                                        @endforeach
                                    <tr>
                                        <td colspan="7">
                                            <button type="submit" class="pull-right btn btn-success">Propose</button>
                                        </td>
                                    </tr>
                                </form>


                            </tbody>
                            @if(session('cart'))
                                <tfoot>
                                <tr>
                                    <form action="{{ route('seller.propose.store') }}" method="POST">
                                        @csrf
                                        <td colspan="8" class="text-right"><strong><button type="submit" class="btn btn-success btn-info" style="float: right">Propose</button></strong></td>
                                    </form>

                                </tr>
                                </tfoot>
                            @endif



                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script>
        function calculateAmount(val,price) {
            var tot_price = val * price;
            /*display the result*/
            var divobj = document.getElementById('tot_amount');
            divobj.value = tot_price;
        }
    </script>
@endsection
