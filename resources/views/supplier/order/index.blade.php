@extends('layouts.supplier-app')
@section('title', 'Orders')

@section('supplier-order', 'active')

@section('content')

    <div class="container-fluid">
        <div class="block-header">

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-red text-center">
                        <h2>
                            ALL Order

                        </h2>
                        {{-- <ul class="header-dropdown m-r--5">
                            <a href="{{ route('orders.create') }}" class="btn btn-default">Create</a>

                        </ul> --}}
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Buyer Name') }}</th>
                                        <th>{{ __('Delivery Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Payment Status') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($orders as $i => $order)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $order->ShowId }}</td>
                                            <td>@if(isset($order->user->name )) {{ $order->user->name }} @endif</td>
                                            <td>@if(isset($order->delivery_date)) {{ date('d-M-Y', strtotime($order->delivery_date)) }} @endif</td>
                                            <td><span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                            <td><span
                                                    class="badge badge-primary">{{ ucfirst($order->payment_status) }}</span>
                                            </td>
                                            <td>
                                            @php
                                                $grant_total = 0;
                                            @endphp
                                            @foreach($order->items as $item)
                                                @php
                                                    $grant_total +=$item->unite_price * $item->qty ;
                                                @endphp
                                            @endforeach
                                            {{ number_format($grant_total,2) }}    
                                            </td>
                                            <td>
                                                <div class="icon-button-demo">

                                                    <a href="{{ route('order.show', $order->id) }}"
                                                        class="btn btn-info waves-effect" title="Active"
                                                        style="float: left">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                   @empty
                                        <tr>
                                            <td colspan="7" class="text-center">No data found!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                            {{-- <a href="{{ route('order.index.pdf') }}" class="btn btn-info" style="float: right">PDF</a> --}}
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
