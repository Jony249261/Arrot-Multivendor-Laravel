@extends('layouts.supplier-app')
@section('title', 'Orders')

@section('supplier-order', 'active')

@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>
                Orders

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
                                        {{-- <th>{{ __('Buyer Name') }}</th> --}}
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
                                            {{-- <td>{{ $order->user->name }}</td> --}}
                                            <td>{{ date('d-M-Y', strtotime($order->delivery_date)) }}</td>
                                            <td><span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                            </td>
                                            <td>{{ number_format($order->amount, 2) }}</td>
                                            <td>
                                                <div class="icon-button-demo">
                                                   
                                                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-info waves-effect" title="Active" style="float: left">
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
                        </div>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
