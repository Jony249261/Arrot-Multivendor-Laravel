
@extends('layouts.buyer-app')

@section('buyer_order','active')
@section('order_create','active')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-red">

                    <h2 class="text-center">Create order</h2>

                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data" >
                        @csrf


                    </form>


                </div>

            </div>

        </div>
    @endsection
