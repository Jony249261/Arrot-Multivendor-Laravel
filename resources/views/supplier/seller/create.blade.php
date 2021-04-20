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
                    <div class="row">
                        <form id="form_validation"  method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

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
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text"  class="form-control @error('seller_id') is-invalid @enderror" name="seller_name" required>
                                        @error('seller_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">ID</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number"  class="form-control @error('seller_telephone') is-invalid @enderror" name="seller_telephone" required>
                                        @error('seller_telephone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                       </span>
                                        @enderror
                                        <label class="form-label">Enter Phone Number</label>
                                    </div>
                                </div>
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

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="seller_address" required>

                                        <label class="form-label">Enter Seller Address</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="seller_website" required>
                                        <label class="form-label">Enter Seller Website</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="">
                                        <input type="date" class="form-control" name="passport_expire_date" required >
                                        <label class="form-label">Enter Passport Expire Date</label>
                                    </div>
                                </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="header bg-red">

                                    <h2 class="text-center">Representative Information</h2>

                                </div>
</div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="sr_name" required>
                                        <label class="form-label">Seller Representive Name</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="sr_email" required>
                                        <label class="form-label">Seller Representive  Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="number" class="form-control" name="sr_phone" required>
                                        <label class="form-label">Seller Phone Number</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="">
                                        <input type="file" class="form-control" name="sr_image" required>
                                        <label class="form-label">Seller Representive Image</label>
                                    </div>
                                </div>

                                <button class="btn btn-success waves-effect" type="submit">SUBMIT</button>

                            </div>
                        </form>
                    </div>

                </div>

            </div>

        </div>
@endsection
