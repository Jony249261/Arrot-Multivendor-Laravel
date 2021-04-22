@extends('layouts.buyer-app')
@section('title', 'Order show')

@section('order', 'active')
@section('show-order', 'active')

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
               Show Order

            </h2>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-orange text-center">
                        <h2>
                            Order Details - {{ $order->showId }}

                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('orders.index') }}" class="btn btn-default">View</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <tr>
                                    <td>Delivery Date</td>
                                    <td>{{ date('d-M-Y',strtotime($order->delivery_date)) }}</td>
                                </tr>
                               
                                <tr>
                                    <td>Order Status</td>
                                    <td>
                                        <span class="badge badge-soft-info">{{ ucfirst($order->status)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Payment Status</td>
                                    <td><span class="badge badge-soft-info">{{ ucfirst($order->payment_status)}}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Products</td>
                                    <td><span class="badge badge-info">{{ $order->items->count() }}</span></td>
                                </tr>
                                <tr>
                                    <td>Total Amount</td>
                                    <td>{{ number_format($order->amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Due Amount</td>
                                    {{-- @php
                                        $due_amount = $order->amount - $order->transactions()->sum('amount');
                                    @endphp
                                    <td>{{ number_format($due_amount,2) }}</td> --}}
                                </tr>
                               
                                <tr>
                                    <td>Payment</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target=".make_payment">Make Payment</a>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-orange text-center">
                        <h2>
                            Product Details - {{ $order->showId }}

                        </h2>
                        {{-- <ul class="header-dropdown m-r--5">
                            <a href="{{ route('orders.index') }}" class="btn btn-default">View</a>

                        </ul> --}}
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
                                    <th>{{ __('Quantity') }}</th>
                                    <th>{{ __('Price') }}</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @forelse ($order->items as $i => $item)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td><img src="{{ asset('products/' . $item->product->image) }}"
                                                    width="60" height="60" alt=""></td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->unit->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->product->price, 2) }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No data found!!</td>
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


    <div class="modal fade make_payment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <h2 class="modal-title" id="exampleModalLabel">Make Payment</h2>
                        
                    </div>
                    <div class="modal-body">
                        <form action="{{route('buyer.order.payment',$order->id)}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Payment Method</label>
                                           <select name="account_id" class="form-control @error('account_id') is-invalid @enderror" id="">
                                            <option value="">Select One</option>
                                            {{-- @foreach ($accounts as $account)
                                                <option value="{{ $account->id }}">{{ $account->name }}</option>
                                            @endforeach --}}
                                           </select>
                                            @error('account_id')
                                            <span class="invalid-feedback text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Proof Of Payment</label>
                                            <input type="file" name="proof" value="{{ old('proof') }}" class="form-control @error('proof') is-invalid @enderror" >
                                            @error('proof')
                                            <span class="invalid-feedback text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="number" name="amount" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror"  placeholder="Enter amount">
                                            @error('amount')
                                            <span class="invalid-feedback text-red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        
                                    </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>

                </div>



            </div>
        </div>

    </div>

@endsection
