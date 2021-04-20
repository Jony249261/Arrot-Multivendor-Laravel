@extends('layouts.supplier-app')

@section('buyer','active')
@section('buyer-index','active')

@section('content')
    <div class="container-fluid" xmlns="">

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


                                                    <form action="{{ route('supplier.buyer.delete',$user->id) }}" method="post">
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm delete-confirm" data-name="{{ $user->name }}" type="submit"><i class="material-icons">delete</i></button>
                                                    </form>

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





   




