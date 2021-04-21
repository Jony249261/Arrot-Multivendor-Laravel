@extends('layouts.supplier-app')

@section('buyer','active')
@section('create','active')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-red">

                    <h2 class="text-center">Create Buyer</h2>

                </div>
                <div class="body">
                    <div class="row">
                        <form id="form_validation" action="{{route('supplier.buyer.store')}}"  method="POST" enctype="multipart/form-data">
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
                                        <label class="form-label">Enter Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('buyer_address') is-invalid @enderror"  value="{{ old('buyer_address') }}" name="buyer_address" required>
                                        @error('buyer_address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Enter Buyer Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('buyer_website') is-invalid @enderror" value="{{old('buyer_website')}}" name="buyer_website" required>
                                        @error('buyer_website')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Buyer Website</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class=" form-control @error('tagline') is-invalid @enderror" value="{{old('tagline')}}" name="tagline" required>
                                        @error('tagline')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Buyer Tagline</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class=" form-control @error('buyer_passport') is-invalid @enderror" value="{{old('buyer_passport')}}" name="buyer_passport" required>
                                        @error('buyer_passport')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label"> Passport Number</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Enter Buyer Type</label>
                                    <br>

                                    <input type="radio" name="buyer_type" id="non_profit" value="non_profit" class="with-gap">
                                    <label for="non_profit">Non Profit</label>

                                    <input type="radio" name="buyer_type" id="govt" value="govt" class="with-gap">
                                    <label for="govt" class="m-l-20">Govt</label>

                                    <input type="radio" name="buyer_type" id="limited" value="limited" class="with-gap">
                                    <label for="limited" class="m-l-20">Limited</label>

                                    <input type="radio" name="buyer_type" id="proprietorship" value="proprietorship" class="with-gap">
                                    <label for="proprietorship" class="m-l-20">Proprietorship</label>
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

                                    <label class="form-label">Enter Buyer Image</label>
                                    <input type="file" class=" @error('image') is-invalid @enderror" value="{{old('image')}}" name="image"  required>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>


                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">






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

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class=" form-control @error('buyer_nid') is-invalid @enderror"  value="{{old('buyer_nid')}}" name="buyer_nid" required>
                                        @error('buyer_nid')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Enter Buyer NID Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Buyer Logo</label>
                                    <input type="file"class=" @error('buyer_logo') is-invalid @enderror" value="{{old('buyer_logo')}}" name="buyer_logo"  required>
                                    @error('buyer_logo')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Buyer Trade License</label>
                                    <input type="file" class=" @error('trade_license') is-invalid @enderror" value="{{old('trade_license')}}" name="trade_license"  required>
                                    @error('trade_license')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>
                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input type="date" class=" form-control @error('expire_date') is-invalid @enderror" value="{{old('expire_date')}}" name="expire_date"  required>

                                        @error('expire_date')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <label class="form-label">Trade Licence Expire date</label>

                                    </div>


                                </div>
                                <div class="header bg-red">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('br_name') is-invalid @enderror" value="{{ old('br_name') }}" name="br_name" >
                                        <label class="form-label">Buyer Representative name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('br_email') is-invalid @enderror" value="{{ old('br_email') }}" name="br_email" >
                                        <label class="form-label">Buyer Representative Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control @error('br_phone') is-invalid @enderror" value="{{ old('br_phone') }}" name="br_phone">
                                        <label class="form-label">Buyer Representative Phone</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">

                                    <label class="form-label">Enter Buyer Representative Image</label>
                                    <input type="file" class=" @error('br_image') is-invalid @enderror" value="{{old('br_image')}}" name="br_image" >
                                    @error('br_image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror


                                </div>
                                <button class="btn btn-success waves-effect" type="submit">Create Buyer</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
@endsection



