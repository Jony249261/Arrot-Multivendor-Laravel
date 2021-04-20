@extends('layouts.supplier-app')

@section('seller','active')
@section('create','active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                 <div class="header bg-red">

                    <h2 class="text-center">Create Seller</h2>

                </div>
                <div class="body">
                    
                        <form id="form_validation"  method="POST" enctype="multipart/form-data" action="{{route('supplier.seller.store')}}">
                            @csrf

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text"  class="form-control @error('seller_name') is-invalid @enderror" name="seller_name" required>
                                            @error('seller_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                            <label class="form-label">Enter Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Enter Phone Number</label>
                                            <input type="number"  class="form-control @error('seller_telephone') is-invalid @enderror" name="seller_telephone" required>
                                            @error('seller_telephone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control @error('seller_email') is-invalid @enderror" name="seller_email" required>
                                        @error('seller_email')
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
                                        <input type="text" class="form-control" name="seller_address" required>

                                        <label class="form-label">Enter Seller Address</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="seller_website" required>
                                        <label class="form-label">Enter Seller Website</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="">
                                            <label class="form-label">Enter Passport Expire Date</label>
                                            <input type="date" class=" form-control" placeholder="Please choose a date...">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="header bg-red">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                        <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sr_name" required>
                                        <label class="form-label">Seller Representive Name</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="sr_email" required>
                                        <label class="form-label">Seller Representive  Email</label>
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                    <div class="form-line">
                                        <label class="form-label">Seller Phone Number</label>
                                        <input type="number" class="form-control" name="sr_phone" required>
                                        
                                    </div>
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                    <div class="">
                                        <label class="form-label">Seller Representive Image</label>
                                        <input type="file" class="form-control" name="sr_image" required>
                                        
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                                <button class="btn btn-success waves-effect" type="submit">Create Seller</button>
                            
                            
                        </form>
                    

                </div>

            </div>

        </div>
    </div>
@endsection
