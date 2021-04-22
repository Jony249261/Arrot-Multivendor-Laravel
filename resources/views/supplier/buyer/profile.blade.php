@extends('layouts.supplier-app')
@section('page-styles')
<link href="{{ asset('backend/css/profile.css') }}" rel="stylesheet">
@endsection
@section('buyer','active')
@section('content')


        <div class="container-fluid">
            <!-- Basic Example -->
            <div class="row gutters-sm">
            <div class="col-md-12 mb-3">
              <div class="card">
              <div class="header bg-red">
              <h2>Buyer Information</h2>
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


@endsection



