@extends('layouts.supplier-app')

@section('product', 'active')
@section('title', 'Create product')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header">

                    <h2>Create Product</h2>

                </div>
                <form id="form_validation" accept="" method="POST">
                    @csrf
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="text" class="form-control @error('product_name') is-invalid @enderror"
                                            name="product_name" required>
                                        <label class="form-label">Product Name</label>
                                        @error('product_name')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="text" class="form-control @error('purchase_rate') is-invalid @enderror"
                                            name="purchase_rate" required>
                                        <label class="form-label">Purchase Rate</label>
                                        @error('purchase_rate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line ">
                                        <select class="form-control show-tick" tabindex="-98">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                        <label class="form-label">Unit</label>
                                        @error('unit_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                    {{-- <div class="btn-group bootstrap-select form-control show-tick dropup">
                                        <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown"
                                            title="Mustard" aria-expanded="false">
                                            <span class="filter-option pull-left">Mustard</span>&nbsp;
                                            <span class="bs-caret"><span class="caret">
                                                </span></span></button>
                                        <div class="dropdown-menu open"
                                            style="max-height: 220px; overflow: hidden; min-height: 0px;">
                                            <ul class="dropdown-menu inner" role="menu"
                                                style="max-height: 210px; overflow-y: auto; min-height: 0px;">
                                                <li data-original-index="0" class="selected">
                                                    <a tabindex="0" class="" style="" data-tokens="null"><span
                                                            class="text">Mustard</span>
                                                        <span class="glyphicon glyphicon-ok check-mark">
                                                        </span></a>
                                                </li>
                                                <li data-original-index="1" class="">
                                                    <a tabindex="0" class="" style="" data-tokens="null">
                                                        <span class="text">Ketchup</span><span
                                                            class="glyphicon glyphicon-ok check-mark"></span></a>
                                                </li>
                                                <li data-original-index="2"><a tabindex="0" class="" style=""
                                                        data-tokens="null"><span class="text">Relish</span><span
                                                            class="glyphicon glyphicon-ok check-mark"></span></a></li>
                                            </ul>
                                        </div><select class="form-control show-tick" tabindex="-98">
                                            <option>Mustard</option>
                                            <option>Ketchup</option>
                                            <option>Relish</option>
                                        </select>
                                    </div> --}}
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea name="description" cols="30" rows="5" class="form-control no-resize"
                                            required></textarea>
                                        <label class="form-label">Description...</label>
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            name="image" required>

                                        @error('image')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line error">
                                        <input type="text" class="form-control @error('sales_rate') is-invalid @enderror"
                                            name="sales_rate" required>
                                        <label class="form-label">Sales Rate</label>
                                        @error('sales_rate')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>


                        </div>
                        <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                </form>

            </div>

        </div>

    </div>
@endsection
