@extends('layouts.supplier-app')

@section('buyer','active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header">

                    <h2>BASIC VALIDATION</h2>

                </div>
                <div class="body">
                   <div class="row">
                       <form id="form_validation" method="POST">
                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

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

                       </div>

                       <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

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

                       </div>
                       </form>
                   </div>

                </div>

        </div>

    </div>
@endsection
