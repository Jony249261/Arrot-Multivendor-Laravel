@extends('layouts.supplier-app')

@section('page-styles')
@endsection

@section('seller','active')
@section('seller-create','active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-red">

                    <h2 class="text-center">Create Seller</h2>

                </div>
                <div class="body">
                    <div class="row">
                        <form id="form_validation" action="{{route('supplier.seller.store')}}"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"  name="name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Enter Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class="form-control @error('phone') is-invalid @enderror"  value="{{ old('phone') }}" name="phone" required>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Enter Phone Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" name="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Enter Seller Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="seller_address" required>

                                         <label class="form-label">Enter Seller Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('seller_website') is-invalid @enderror" value="{{old('seller_website')}}" name="seller_website" required>
                                        @error('seller_website')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Seller Website</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        <label class="form-label">Enter Confirm Password</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Seller Image</label>
                                    <input type="file" class=" @error('image') is-invalid @enderror" value="{{old('image')}}" name="image"  required>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>


                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class=" form-control @error('seller_nid') is-invalid @enderror"  value="{{old('seller_nid')}}" name="seller_nid" required>
                                        @error('seller_nid')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Seller NID Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class=" form-control @error('seller_passport') is-invalid @enderror"  value="{{old('seller_passport')}}" name="seller_passport" >
                                        @error('seller_passport')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Seller passport </label>
                                    </div>
                                </div>
                                <div class="form-group from-float">
                                    <div class="">
                                        <label class="form-label">Enter Passport Expire Date</label>
                                        <input type="date" class=" form-control @error('passport_expire_date') is-invalid @enderror" name="passport_expire_date" value="{{old('passport_expire_date')}}" placeholder="Please choose a date...">
                                        @error('passport_expire_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="header bg-red">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('sr_name') is-invalid @enderror" value="{{ old('sr_name') }}" name="sr_name" >
                                        <label class="form-label">Seller Representative name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('sr_email') is-invalid @enderror" value="{{ old('sr_email') }}" name="sr_email" >
                                        <label class="form-label">Seller Representative Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('sr_phone') is-invalid @enderror" value="{{ old('sr_phone') }}" name="sr_phone">
                                        <label class="form-label">Seller Representative Phone</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Seller Representative Image</label>
                                    <input type="file" class=" @error('sr_image') is-invalid @enderror" value="{{old('sr_image')}}" name="sr_image" >
                                    @error('sr_image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>
                                <button class="btn btn-success waves-effect" type="submit">Create Seller</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>

@endsection


