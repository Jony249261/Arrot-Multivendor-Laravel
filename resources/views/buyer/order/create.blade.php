@extends('layouts.supplier-app')
@section('title','Create order')

@section('order', 'active')
@section('order-create', 'active')

@section('page-styles')

@endsection

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
    @section('page-scripts')


    @endsection
