@extends('layouts.seller-app')

@section('Propose-product','active')
@section('title',' Propose Porduct List')

@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-red text-center">

                    <h2 class="text-center">Your Proposed Product</h2>


                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Product Name</th>
                                <th>Product Image</th>
                                <th>Unit</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach($propose_product as $key=>$pproduct)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$pproduct->product->product_name}}</td>
                                <td><img src="{{asset('products/'.$pproduct->product->image)}}" alt="" height="100" width="100"></td>
                                <td>{{$pproduct->product->unit->name}}</td>
                                <td>{{$pproduct->quantity}}</td>
                                <td>{{$pproduct->price}}</td>
                                <td>
                                    <span class="badge badge-danger">{{$pproduct->status}}</span>
                                </td>
                                <td>
                                    @if($pproduct->status=='accept')
                                        <a href="{{route('propose.product.delete',$pproduct->id)}}" onclick="return(confirm('Are you Sure to Delete'))" class="btn btn-danger"><i class="material-icons">delete</i></a>
                                        @else
                                    <a type="button" class="btn btn-success waves-effect m-r-20" data-toggle="modal" data-target="#editmodal-{{$pproduct->id}}"><i class="material-icons">edit</i></a>
                                    <a href="{{route('propose.product.delete',$pproduct->id)}}" onclick="return(confirm('Are you Sure to Delete'))" class="btn btn-danger"><i class="material-icons">delete</i></a>
                                        @endif
                                </td>
                            </tr>
                             @endforeach

                        </tbody>

                        </table>
                    </div>

                </div>

            </div>

        </div>
    @foreach($propose_product as $key=>$pproduct)
        <!-- Default Size -->
            <div class="modal fade" id="editmodal-{{$pproduct->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-red">
                            <h4 class="modal-title" id="defaultModalLabel">Update Propose Product</h4>
                        </div>
                        <form action="{{route('udpate.propose.prodcut',$pproduct->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('quantity') is-invalid @enderror" value="{{$pproduct->quantity}}" name="quantity" >
                                        <label class="form-label">Update Quantity</label>
                                        @error('quantity')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <br>
                                    <br>
                                    <div class="form-line">
                                        <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{$pproduct->price}}" name="price" >
                                        <label class="form-label">Update Price</label>
                                        @error('price')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success waves-effect">SAVE CHANGES</button>
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Default Size -->
        @endforeach
    </div>

@endsection
