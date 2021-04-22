@extends('layouts.buyer-app')
@section('title','Edit order')


@section('order', 'active')
@section('edit-order', 'active')

@section('page-styles')

@endsection

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2 class="text-center">Edit order</h2>

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
                                <form action="{{ route('orders.update',$order->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <tbody>
                                        @forelse ($order->items as $i => $item)
                                        <tr role="row" class="odd">
                                            <td>{{ $i + 1 }}</td>
                                            <td><img src="{{ asset('products/' . $item->product->image) }}"
                                                    width="60" height="60" alt=""></td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ ucfirst($item->product->unit->name) }}</td>
                                            <td>{{ number_format($item->product->price, 2) }}</td>
                                            <td>
                                                <input type="number" name="quantites[]" style="width: 70px" value="{{ $item->qty }}" id="">
                                                <input type="hidden" name="products[]" value="{{ $item->product->id }}" >
                                            </td>

                                            <td>--</td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No data found!</td>
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
                            <button class="btn btn-sm btn-info" style="float: right">Update order</button>
                            </form>

                            </table>
                        </div>
                        {{-- {{ $order->links() }} --}}
                </div>

            </div>

        </div>
    </div>
    @endsection
    @section('page-scripts')


    @endsection