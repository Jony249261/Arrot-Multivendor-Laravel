@extends('layouts.supplier-app')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">
@endsection
@section('seller','active')
@section('content')


        <div class="container-fluid">
            <!-- Basic Example -->
            <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
              <div class="card">
              <div class="header bg-red">
              <h2>Seller Information</h2>
              </div>
                <div class="card-body cardbody">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="{{asset('image_seller/user/'.$user->image)}}" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>{{$seller->seller_name}}</h4>
                      <p class="text-muted font-size-sm">{{$seller->seller_address}}</p>
                      
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
              <h2>Seller Information</h2>
              </div>
              <br>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-3">
                      <h6 class="mb-0 profilen">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                     {{ $seller->seller_name }}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 profilen">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                       {{$seller->seller_email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 profilen">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$seller->seller_telephone}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 profilen">Website</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$seller->seller_website}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0 profilen">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$seller->seller_address}}
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <div class="row gutters-sm">


            <div class="col-md-12 ">
              <div class="card">
              <div class="header bg-red">
              <h2 class="text-center">
                Seller Representive
              </h2>
              </div>
                <div class="card-body cardbody">
                  <div class="row">
                    <div class="col-sm-5">
                      <h6 class="mb-0 profilen"></h6>
                    </div>
                    <div class="col-sm-6 text-secondary ">
                      <img src="{{asset('image_seller/user/'.$seller->sr_image)}}" alt="Admin" class="rounded-circle" width="120">
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6 ">
                      <h6 class="mb-0 profilen">Name</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->sr_name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6">
                      <h6 class="mb-0 profilen">Phone</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->sr_phone}}
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6">
                      <h6 class="mb-0 profilen">Email</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->sr_email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6">
                      <h6 class="mb-0 profilen">NID</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->seller_nid}}
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6">
                      <h6 class="mb-0 profilen">Passport</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->seller_passport}}
                    </div>
                  </div>
                  <hr>
                  <div class="row padding">
                    <div class="col-sm-6">
                      <h6 class="mb-0 profilen">Passport Exp-Date</h6>
                    </div>
                    <div class="col-sm-6 text-secondary padding_v">
                      {{$seller->passport_expire_date}}
                    </div>
                  </div>
                </div>
              </div>
            </div>


          </div>
            </div>
            <!-- #END# Colored Card - With Loading -->


@endsection



