@extends('layouts.supplier-app')

@section('buyer','active')

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <h2>Dashboard</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header">
{{--                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">--}}
{{--                    </div>--}}
                    <h2>BASIC VALIDATION</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
                <div class="body">
                   <div class="row">
                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                       </div>
                   </div>

                </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="header">
                        <h2>BASIC VALIDATION</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" required>
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="surname" required>
                                    <label class="form-label">Surname</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" id="male" class="with-gap">
                                <label for="male">Male</label>

                                <input type="radio" name="gender" id="female" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" required>
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="checkbox" name="checkbox">
                                <label for="checkbox">I have read and accept the terms</label>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>

            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <div class="header">
                        <h2>BASIC VALIDATION</h2>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name" required>
                                    <label class="form-label">Name</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="surname" required>
                                    <label class="form-label">Surname</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="email" class="form-control" name="email" required>
                                    <label class="form-label">Email</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender" id="male" class="with-gap">
                                <label for="male">Male</label>

                                <input type="radio" name="gender" id="female" class="with-gap">
                                <label for="female" class="m-l-20">Female</label>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea name="description" cols="30" rows="5" class="form-control no-resize" required></textarea>
                                    <label class="form-label">Description</label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="password" class="form-control" name="password" required>
                                    <label class="form-label">Password</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="checkbox" name="checkbox">
                                <label for="checkbox">I have read and accept the terms</label>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                    </div>

            </div>
            </div>
        </div>

    </div>
@endsection
