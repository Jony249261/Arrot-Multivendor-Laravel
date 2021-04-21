@extends('layouts.buyer-app')

@section('order', 'active')
@section('all-order', 'active')
@section('title', 'Orders')

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Order

            </h2>

        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-orange text-center">
                        <h2>
                            ALL Order

                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('orders.create') }}" class="btn btn-default">Create</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Order ID') }}</th>
                                        <th>{{ __('Delivery Date') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Amount') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $i => $order)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $order->ShowId }}</td>
                                            <td>{{ date('d-M-Y', strtotime($order->delivery_date)) }}</td>
                                            <td><span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                            </td>
                                            <td>{{ number_format($order->amount, 2) }}</td>
                                            <td>
                                                <a href="{{ route('buyer.order.show', $order->id) }}"
                                                    class="btn btn-sm btn-primary ">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                @if (auth()->user()->role !== 7)
                                                    <a href="{{ route('buyer.order.edit', $order->id) }}"
                                                        class="btn btn-sm btn-info ">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('buyer.order.destroy', $order->id) }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No data found!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
