@extends('layouts.supplier-app')
@section('title', 'Purchase invoice')
@section('supplier-purchase', 'active')

@section('page-styles')
    <style>
        .invoice {
            position: relative;
            background: #fff;
            border: 1px solid #f4f4f4;
            padding: 20px;
            margin: 10px 25px;
        }

        .invoice-title {
            margin-top: 0;
        }
        .custom{
            background: red;
            color:#fff;
        }

        /*
     * Misc: print
     * -----------
     */
        @media print {

            .no-print,
            .main-sidebar,
            .left-side,
            .main-header,
            .content-header {
                display: none !important;
            }

            .content-wrapper,
            .right-side,
            .main-footer {
                margin-left: 0 !important;
                min-height: 0 !important;
                -webkit-transform: translate(0, 0) !important;
                -ms-transform: translate(0, 0) !important;
                -o-transform: translate(0, 0) !important;
                transform: translate(0, 0) !important;
            }

            .fixed .content-wrapper,
            .fixed .right-side {
                padding-top: 0 !important;
            }

            .invoice {
                width: 100%;
                border: 0;
                margin: 0;
                padding: 0;
            }

            .invoice-col {
                float: left;
                width: 33.3333333%;
            }

            .table-responsive {
                overflow: auto;
            }

            .table-responsive>.table tr th,
            .table-responsive>.table tr td {
                white-space: normal !important;
            }
        }

    </style>

@endsection

@section('content')
    <section class="invoice">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <div class="row">
                        <div class="col-xs-6">
                            <img src="{{ asset('arrot.png') }}" width="80" alt=""><br>
                            <i class="fa fa-globe"></i> Attor-Krishi-Ponno.
                        </div>
                        <div class="col-xs-6">
                            <div class="pull-right">
                                <img src="{{asset("image_buyer/user/".$purchase->user->image)}}" class="pull-right" alt="Image" width="120">
                                <br>
                                Date: {{ date('d/m/Y') }}
                            </div>
                        </div>
                    </div>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
                From
                <address>
                    <strong>Arrot.</strong><br>
                    1259 (4th Floor), Road 10, Mirpur DOHS<br>
                    Dhaka 1216<br>
                    Phone: +880-1947179930<br>
                    Email: support@selevenit.com
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                To
                <address>
                    <strong>{{ $purchase->user->name }}</strong><br>
                    {{ $purchase->user->address }}
                    {{-- San Francisco, CA 94107<br> --}}
                    Phone: {{ $purchase->user->phone }}<br>
                    Email: {{ $purchase->user->email }}
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
                <b>Invoice {{ $purchase->showId }}</b><br>
                {{-- <b>Order ID:</b> {{ $purchase->showId }}<br> --}}
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped">
                    <thead >
                        <tr>
                            <th>Product</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $sub_total = 0;
                        @endphp
                        @forelse ($purchase->items as $i => $item)
                            <tr>
                                <td>{{ $item->product->product_name }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($item->product->product_description, 50, $end = '...') }}
                                </td>
                                <td>{{ $item->purchase_qty }}</td>
                                {{-- <td>{{ $item->delivered_qty }}</td> --}}
                                <td>{{ number_format($item->unite_price, 2) }}</td>
                                <td>{{ number_format($item->purchase_qty * $item->unite_price, 2) }}</td>
                                @php
                                    $sub_total += $item->purchase_qty * $item->unite_price;
                                @endphp
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No product found</td>
                            </tr>
                        @endforelse


                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
                {{-- <p class="lead">Payment Methods:</p>
        <img src="{{ asset('backend/dist/img/credit/visa.png') }}" alt="Visa">
        <img src="{{ asset('backend/dist/img/credit/mastercard.png') }}" alt="Mastercard">
        <img src="{{ asset('backend/dist/img/credit/american-express.png') }}" alt="American Express">
        <img src="{{ asset('backend/dist/img/credit/paypal2.png') }}" alt="Paypal">

        <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro harum sunt quo unde? Voluptatum repellendus illum dicta porro non natus cumque blanditiis laborum corrupti sunt fugit, rerum animi obcaecati odio?.
        </p> --}}
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
                {{-- <p class="lead">Amount Due {{ date('d/m/Y') }}</p> --}}

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>{{ number_format($sub_total, 2) }}</td>
                            </tr>
                            <tr>
                                <th>Tax (0%)</th>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>{{ number_format($sub_total, 2) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="" target="_blank" onclick="myPrint()" class="btn button no-print pull-right"><i class="material-icons">local_printshop</i> Print</a>
                {{-- <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
        </button>
        <button type="button" class="btn btn-grad1 pull-right" style="margin-right: 5px;">
          <i class="fa fa-download"></i> Generate PDF
        </button> --}}
            </div>
        </div>
    </section>
    <script>
        function myPrint() {
            window.print();
        }

    </script>
@endsection

@section('page-scripts')
@endsection
