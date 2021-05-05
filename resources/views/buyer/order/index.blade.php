@extends('layouts.buyer-app')

{{-- AuthChekd for active menu --}}
@if (Auth::user()->role == 'buyer')
    @section('order', 'active')
    @section('all-order', 'active')
    @else
    @section('all-order', 'active')
    @endif


    @section('title', 'Orders')

    @section('content')

        <div class="container-fluid">
           
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red text-center">
                            <h2>
                                ALL Order

                            </h2>
                            <ul class="header-dropdown m-r--5 m-t--2">
                                <a href="{{ route('orders.create') }}" class="btn btn-grad"><i class="material-icons">library_add</i>Create</a>

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
                                            <th>{{ __('Payment Status') }}</th>
                                            <th>{{ __('Amount') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $i => $order)
                                            <tr>
                                                <td>{{ $i + 1 }}</td>
                                                <td>{{ $order->ShowId }}</td>
                                                <td>
                                                    @if(isset($order->delivery_date)) {{ date('d-M-Y', strtotime($order->delivery_date)) }} @endif
                                                </td>
                                                <td><span class="badge badge-primary">{{ ucfirst($order->status) }}</span>
                                                <td><span
                                                        class="badge badge-primary">{{ ucfirst($order->payment_status) }}</span>
                                                </td>
                                                <td>
                                                    @php
                                                        $grant_total = 0;
                                                    @endphp
                                                    @foreach ($order->items as $item)
                                                        @php
                                                            $grant_total += $item->unite_price * $item->qty;
                                                        @endphp
                                                    @endforeach
                                                    {{ number_format($grant_total, 2) }}
                                                </td>
                                                <td>
                                                    <div class="icon-button-demo">
                                                        @if (Auth::user()->role == 'procurement' && $order->status == 'processing')
                                                            <a href="{{ route('orders.show', $order->id) }}"
                                                                class="btn btn-success waves-effect" title="Active"
                                                                style="float: left">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                        @else

                                                            @if (auth()->user()->role != 'warehouse')
                                                                @if($order->status == 'pending')
                                                                <a href="{{ route('orders.edit', $order->id) }}"
                                                                    class="btn btn-info waves-effect" style="float: left"
                                                                    {{ Auth::user()->role == 'procurement' && $order->status == 'processing' ? 'disabled' : '' }}>
                                                                    <i class="material-icons">edit</i>
                                                                </a>
                                                                @endif
                                                            @endif

                                                            <a href="{{ route('orders.show', $order->id) }}"
                                                                class="btn btn-success waves-effect" title="Active"
                                                                style="float: left">
                                                                <i class="material-icons">visibility</i>
                                                            </a>
                                                        @endif

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
