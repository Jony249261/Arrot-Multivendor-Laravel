
@extends('layouts.buyer-app')

@section('buyer_order','active')
@section('order_create','active')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2 class="text-center">Create order</h2>

                </div>
                <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Product Image') }}</th>
                                        <th>{{ __('Product Name') }}</th>
                                        <th>{{ __('Unit') }}</th>
                                        <th>{{ __('Price') }}</th>
                                        <th>{{ __('Quantity') }}</th>
                                        <th>{{ __('Total Price') }}</th>
                                    </tr>
                                </thead>
                                <form action="{{ route('orders.store') }}" method="post">
                                    <tbody>
                                        @csrf
                                        @forelse ($products as $i => $product)
                                            <tr role="row" class="odd">
                                                <td>{{ $i + 1 }}</td>
                                                <td><img src="{{ asset('products/' . $product->image) }}"
                                                        width="60" height="60" alt=""></td>
                                                <td>{{ $product->product_name }}</td>
                                                <td>{{ $product->unit->name }}</td>
                                                <td >{{ number_format($product->price, 2) }}

                                                </td>
                                                <td>
                                                    <input type="hidden" name="products[]" value="{{ $product->id }}" id="">
                                                    <input type="hidden" min="0" name="prices[]"  value="{{ $product->price }}" id="price">
                                                    <input type="number" min="0" name="quantites[]" data-id="{{ $product->id }}" placeholder="00.00" id="qty">


                                                </td>
                                                <td >--</td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No data found!</td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            {{-- <td><strong>Delivery Date</strong></td>
                                            <td><input type="date" name="delivery_date"></td> --}}
                                            <td colspan="6" class="text-right"><strong>Grand Total:</strong></td>
                                            <td colspan="2">000</td>
                                        </tr>
                                    </tfoot>
                            </table>
                            <button class="btn btn-sm btn-info" style="float: right">Create order</button>
                            </form>

                            </table>
                        </div>
                        {{ $products->links() }}
                </div>

            </div>

        </div>
    </div>
    @endsection
