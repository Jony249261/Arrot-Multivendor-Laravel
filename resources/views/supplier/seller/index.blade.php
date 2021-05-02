@extends('layouts.supplier-app')

@section('seller','active')
@section('all-seller','active')
@section('content')
    <div class="container-fluid" xmlns="">

        <!-- Widgets -->

        <div class="body">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red ">
                            <h2>
                                All Seller List

                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <a href="{{ route('supplier.seller.create') }}" class="btn btn-success"><i class="material-icons">library_add</i>Create</a>
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
                                    
                                    <tbody>
                                    @foreach($users as $key=>$user)
                                        <tr>
                                            <td>{{$user->seller_id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td><img src="{{asset('image_seller/user/'.$user->image)}}" alt="" height="75px" width="75px"></td>
                                            <td>{{$user->phone}}</td>

                                            <td>
                                             <div class="icon-button-demo">
                                                <a href="{{ route('supplier.seller.edit',$user->id) }}" class="btn btn-success"> <i class="material-icons">edit</i></a>
                                                <a href="{{ route('supplier.seller.profile',$user->id) }}" class="btn btn-primary @yield('buyer-profile')"> <i class="material-icons">visibility</i></a>
                                                <a href="{{ route('supplier.seller.delete',$user->id) }}" id="delete" class="btn btn-danger @yield('buyer-profile')"> <i class="material-icons">delete</i></a>
                                                @if(auth()->user()->role != 'support')
                                                <a href="{{ route('supplier.seller.delete',$user->id) }}" id="delete" class="btn btn-danger @yield('buyer-profile')"> <i class="material-icons">delete</i></a>
                                                 @endif
                                                 
                                                  
                                                   
                                                </div>
                                                    
                                            
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

            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous"></script>

    <script>

	$(document).on("click", "#delete", function(e){
	   e.preventDefault();
	   var link = $(this).attr("href");
	    swal({
		title: "Are You Sure Want to Delete?",
	        text: "If you delete this, it will be gone forever.",
            	icon: "warning",
            	buttons: true,
            	dangerMode: true,
            })
	    .then((willDelete) => {
            if (willDelete) {
            window.location.href = link;
            } else{
		swal("Safe Data!");
	}
		
            });
            });

</script>


@endsection


