@extends('layouts.seller-app')

    @section('product-index','active')
    @section('title','Product')
@section('content')
    <div class="container-fluid">

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="card">
                <div class="header bg-orange text-center">

                    <h2 class="text-center">All Product</h2>
                   

                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                            <tr>
                                <th>{{ __('SL') }}</th>
                                <th>{{ __('Product Image') }}</th>
                                <th>{{ __('Product Name') }}</th>
                                <th>{{ __('Discription') }}</th>
                                <th>{{ __('Unit') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Action') }}</th>

                            </tr>
                            </thead>
                            
                                <tbody>
                                @forelse ($sellerProducts as $i => $item)
                                <tr>
                                   <td>{{ $i + 1 }}</td>
                                   <td>
                                       <img width="50" src="{{ asset('products/'.$item->product->image) }}" alt="">
                                   </td>
                                   {{-- <td>{{ $item->user->name }}</td> --}}
                                   <td>{{ $item->product->product_name }}</td>
                                   <td>{{ Str::limit($item->product->product_description,50) }}</td>
                                   <td>{{ $item->product->unit->name }}</td>
                                   <td>{{ $item->quantity }}</td>
                                   <td>{{ $item->price }}</td>
                                   <td>--</td>
                                </tr>
                                
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No data found!</td>
                                    </tr>
                                @endforelse

                                </tbody>
                                {{-- <tfoot>
                                <tr>
                                    <form action="{{ route('seller.propose.store') }}" method="POST">
                                        @csrf
                                        <td colspan="8" class="text-right"><strong><button type="submit" class="btn btn-success btn-info" style="float: right">Propose</button></strong></td>
                                    </form>

                                </tr>
                                </tfoot> --}}


                            

                        </table>
                    </div>

                </div>

            </div>

        </div>
    </div>
    <script>
        function calculateAmount(val,price) {
            var tot_price = val * price;
            /*display the result*/
            var divobj = document.getElementById('tot_amount');
            divobj.value = tot_price;
        }
    </script>
@endsection

