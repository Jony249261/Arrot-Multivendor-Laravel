@extends('layouts.buyer-app')
@section('title','Create user')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-red">

                    <h2 class="text-center">Update Buyer</h2>

                </div>
                <div class="body">

                    <form id="form_validation" method="POST" action="{{ route('buyer.user.porfile-update') }}" enctype="multipart/form-data" >
                        @csrf

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                               name="name" value="{{ $user->name }}" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" value="{{ $user->email}}" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Email</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" value="{{ $user->phone}}" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Phone</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                               name="image">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <img src="{{asset('users/'.$user->image)}}" height="80px" width="80px" alt="">
                                        {{-- <label class="form-label">Image</label> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line @error('password') error @enderror">
                                        <input type="password" class="form-control"
                                               name="password" value="{{ old('password') }}" >
                                        <label class="form-label">Password</label>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                               name="password_confirmation" value="{{ old('password_confirmation') }}" >
                                        <label class="form-label">Confirm Password</label>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group" >
                                    <label for="">User Role</label><br>
                                    <input type="radio" name="role" value="procurement" id="procurement" class="with-gap" {{$user->role=='procurement'?'checked':''}}>
                                    <label for="procurement">Procurement</label>

                                    <input type="radio" name="role" value="accounts" id="accounts" class="with-gap" {{$user->role=='accounts'?'checked':''}}>
                                    <label for="accounts" class="m-l-20">Accounts</label>

                                    <input type="radio" name="role" value="warehouse" id="warehouse" class="with-gap" {{$user->role=='warehouse'?'checked':''}}>
                                    <label for="warehouse" class="m-l-20">Warehouse</label>
                                </div>
                                <button class="btn btn-success waves-effect"
                                        type="submit">UPDATE PORFILE</button>
                            </div>
                        </div>


                    </form>


                </div>

            </div>

        </div>
@endsection
@section('page-scripts')


@endsection
