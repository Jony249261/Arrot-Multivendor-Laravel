@extends('layouts.buyer-app')
@section('page-styles')


    <style type="text/css">
        body{
            color: #1a202c;
            text-align: left;
            background-color: #e2e8f0;
        }
        .main-body {
            padding: 15px;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);

        }
        .profilein{
            padding-left:5px;
            width:100%;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }
        .profile{
            padding:20px;
            font-size:16px;
        }
        .profilen{
            font-size:17px;
            font-weight:600;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
        }
        .addresss{
            padding-left:5px;
            padding-top:20px;
            padding-bottom:5px;

        }
        .Representive{
            background:red;
            padding: 10px;
            color:white;
            margin-top:-10px;
        }
        h4{
            margin-bottom:30px;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
        }

        .mt-3{
            margin-top:5px;
        }
        .cardbody{
            padding:10px;
            padding-left:20px;


        }
        .cardbody1{
            padding-left:20px;
            padding-bottom:10px;


        }
        .cardbody img{
            border-radius: 100px;
        }

    </style>
@endsection
@section('content')

@if(Auth::user()->role=='buyer')
    <div class="container-fluid">
        <!-- Basic Example -->
        <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="header bg-red">
                        <h2>Buyer Information</h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('profile.edit') }}" class="btn btn-success"><i class="material-icons">edit</i> Edit Profile</a>

                        </ul>
                    </div>
                    <div class="card-body cardbody">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('image_buyer/user/'.$user->image)}}" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{$buyer->buyer_name}}</h4>
                                <p class="text-secondary mb-1">{{$buyer->tagline}}</p>
                                <p class="text-muted font-size-sm">{{$buyer->buyer_address}}</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row gutters-sm">
            <div class="col-md-12 text-center">
                <div class="card">
                    <div class="header bg-red">
                        <h2>Buyer Information</h2>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Name</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Phone</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_telephone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Website</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_website}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Buyer Type</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_type}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->buyer_address}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0 profilen">Buyer Tagline</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{$buyer->tagline}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row gutters-sm">


            <div class="col-md-6 ">
                <div class="card">
                    <div class="header bg-red">
                        <h2 class="text-center">Trade Licence</h2>
                    </div>
                    <br>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0 profilen"></h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                <img src="{{asset('image_buyer/user/'.$buyer->trade_license)}}" alt="Admin" class="img-thumbnail" >
                            </div>
                        </div>
                        <hr>
                        <div class="row cardbody1">
                            <div class="col-sm-6 ">
                                <h6 class="mb-0">Trade Licence Exp-Date</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->expire_date}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-6 ">
                <div class="card">
                    <div class="header bg-red">
                        <h2 class="text-center">
                            Buyer Representive
                        </h2>
                    </div>
                    <div class="card-body cardbody">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6 class="mb-0 profilen"></h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                <img src="{{asset('image_buyer/user/'.$buyer->br_image)}}" alt="Admin" class="rounded-circle" width="120">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">Name</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->br_name}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">Phone</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->br_phone}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">Email</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->br_email}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">NID</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->buyer_nid}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">Passport</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->buyer_passport}}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 class="mb-0 profilen">Passport Exp-Date</h6>
                            </div>
                            <div class="col-sm-6 text-secondary">
                                {{$buyer->passport_expire_date}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <!-- #END# Colored Card - With Loading -->
    @else
    <div class="container-fluid">
        <!-- Basic Example -->
        <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
                <div class="card">
                    <div class="header bg-red">
                        <h2>Profile Information</h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('buyer.user.update') }}" class="btn btn-success"><i class="material-icons">edit</i> Edit Profile</a>

                        </ul>
                    </div>
                    <div class="card-body cardbody">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{asset('users/'.$user->image)}}" alt="Admin" class="rounded-circle" width="150">
                            <div class="mt-3">

                                <div class="row">
                                    <div class="col-md-12 col-12 col-lg-12">
                                        <div class="card shadow-lg">
                                            <div class="body">
                                                <h4><i class="material-icons">account_box</i> {{$user->name}}</h4>
                                                <p class="text-secondary mb-1"> <i class="material-icons">email</i>  {{$user->email}}</p>
                                                <p class="text-muted font-size-sm"><i class="material-icons">phone_android</i> {{$user->phone}}</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endif



@endsection



