@extends('layouts.supplier-app')
@section('dashboard','active')

@section('content')
<div class="container-fluid">
    <!-- Basic Example -->
    <div class="row gutters-sm">
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="header bg-red">
                    <h2>{{$user->name}} -  Profile Information</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('supplier.profile.edit') }}" class="btn btn-success"><i class="material-icons">edit</i> Edit Profile</a>

                    </ul>
                </div>
                <div class="card-body cardbody">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{asset('image_buyer/user/'.$user->image)}}" alt="Admin" class="rounded-circle" width="150">
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
@endsection
