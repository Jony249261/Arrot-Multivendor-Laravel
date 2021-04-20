@extends('layouts.supplier-app')
@section('page-styles')
   @endsection


@section('buyer','active')
@section('buyer-index','active')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->

                <div class="body">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="header">
                                    <h2>
                                        BASIC EXAMPLE
                                    </h2>
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
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tfoot>

                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Image</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>

                                            </tfoot>
                                            <tbody>
                                            @foreach($users as $key=>$user)
                                            <tr>
                                                <td>{{$user->buyer_id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td><img src="{{asset('image_buyer/user/'.$user->image)}}" alt="" height="75px" width="75px"></td>
                                                <td>{{$user->phone}}</td>

                                                <td>
                                                    <a href="" class="btn btn-success"> <i class="material-icons">edit</i></a>
                                                    <a href="{{route('supplier.buyer.delete',$user->id)}}" class="btn btn-danger" onClick="confirm('Are You Sure to delete ?')" > <i class="material-icons">delete</i></a>
                                                </td>
                                            </tr>
                                            @endforeach




                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


@endsection

@section('page-scripts')
               <!-- Jquery Core Js -->
    <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>



    <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('backend')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{asset('backend')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="{{asset('backend')}}/js/admin.js"></script>
    <script src="{{asset('backend')}}/js/pages/tables/jquery-datatable.js"></script>


            
@endsection


