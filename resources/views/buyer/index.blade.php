@extends('layouts.buyer-app')

@section('title','Buyer Dashboard')

@section('content')
<div class="container-fluid">

    <!-- Widgets -->
    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-pink hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">playlist_add_check</i>
                </div>
                <div class="content">
                    <div class="text">TOTAL ORDERS</div>
                    <div class="number count-to" data-from="0" data-to="{{$orders->count()}}" data-speed="15" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-cyan hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">help</i>
                </div>
                <div class="content">
                    <div class="text">NEW TICKETS</div>
                    @php


                    $bill=App\Billing::where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');


                    @endphp
                    <div class="number count-to" data-from="0" data-to="{{$bill}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-light-green hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">child_friendly</i>
                </div>
                <div class="content">
                    <div class="text">Due</div>
                    @php
                         $total=App\Billing::where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                         $pay=App\Billing::where('buyer_id',Auth::user()->buyer_id)->sum('payment_amount');
                         $due=$total-$pay;
                    @endphp
                    <div class="number count-to" data-from="0" data-to="{{$due}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-orange hover-expand-effect">
                <div class="icon">
                    <i class="material-icons">people</i>
                </div>
                <div class="content">

                    <div class="text">TOTAL STUFFS</div>
                    <div class="number count-to" data-from="0" data-to="{{$user}}" data-speed="1000" data-fresh-interval="20"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Widgets -->
    <!-- CPU Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="header">
                    <div class="row clearfix">
                        <div class="col-xs-12 col-sm-6">
                            <h2>CPU USAGE (%)</h2>
                        </div>
                        <div class="col-xs-12 col-sm-6 align-right">
                            <div class="switch panel-switch-btn">
                                <span class="m-r-10 font-12">REAL TIME</span>
                                <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label>
                            </div>
                        </div>
                    </div>
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
                    <div id="real_time_chart" class="dashboard-flot-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# CPU Usage -->
    <div class="row clearfix">
        <!-- Visitors -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-pink">
                    <div class="sparkline" data-type="line" data-spot-Radius="4" data-highlight-Spot-Color="rgb(233, 30, 99)" data-highlight-Line-Color="#fff"
                         data-min-Spot-Color="rgb(255,255,255)" data-max-Spot-Color="rgb(255,255,255)" data-spot-Color="rgb(255,255,255)"
                         data-offset="90" data-width="100%" data-height="92px" data-line-Width="2" data-line-Color="rgba(255,255,255,0.7)"
                         data-fill-Color="rgba(0, 188, 212, 0)">
                        @php
                            $date1=\Carbon\Carbon::today()->subDays(1);
                            $date7=\Carbon\Carbon::today()->subDays(7);
                            $date30=\Carbon\Carbon::today()->subDays(30);

                            $total_graph1=App\Billing::where('created_at','>=',$date1)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            $total_graph2=App\Billing::where('created_at','>=',$date7)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            $total_graph3=App\Billing::where('created_at','>=',$date30)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                        @endphp
                        {{$total_graph1}},{{$total_graph2}},{{$total_graph3}}
                    </div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            @php
                                $date1=\Carbon\Carbon::today()->subDays(1);

                                $total_lastday=App\Billing::where('created_at','>=',$date1)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp

                            <span class="pull-right"><b>{{$total_lastday}}</b> <small>TAKA</small></span>
                        </li>
                        <li>
                            LAST 7 DAYS
                            @php

                                  $date7=\Carbon\Carbon::today()->subDays(7);

                                $total_last7day=App\Billing::where('created_at','>=',$date7)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp
                            <span class="pull-right"><b>{{$total_last7day}}</b> <small>TAKA</small></span>
                        </li>
                        <li>
                            LAST 30 DAYS
                            @php


                              $date30=\Carbon\Carbon::today()->subDays(30);
                              $total_last30day=App\Billing::where('created_at','>=',$date30)->where('buyer_id',Auth::user()->buyer_id)->sum('bill_amount');
                            @endphp
                            <span class="pull-right"><b>{{$total_last30day}}</b> <small>TAKA</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Visitors -->
        <!-- Latest Social Trends -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-cyan">
                    <div class="m-b--35 font-bold">PRODUCTS TRENDS</div>
                    <ul class="dashboard-stat-list">
                        @foreach($products as $product)
                        <li>
                            #{{$product->product_name}}
                            <span class="pull-right">
                                <i class="material-icons">trending_up</i>
                            </span>
                        </li>
                        @endforeach


                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Latest Social Trends -->
        <!-- Answered Tickets -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="body bg-teal">
                    <div class="font-bold m-b--35">ANSWERED TICKETS</div>
                    <ul class="dashboard-stat-list">
                        <li>
                            TODAY
                            <span class="pull-right"><b>12</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            YESTERDAY
                            <span class="pull-right"><b>15</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST WEEK
                            <span class="pull-right"><b>90</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST MONTH
                            <span class="pull-right"><b>342</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            LAST YEAR
                            <span class="pull-right"><b>4 225</b> <small>TICKETS</small></span>
                        </li>
                        <li>
                            ALL
                            <span class="pull-right"><b>8 752</b> <small>TICKETS</small></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- #END# Answered Tickets -->
    </div>

    <div class="row clearfix">
        <!-- Task Info -->
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
            <div class="card">
                <div class="header">
                    <h2>TASK INFOS</h2>
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
                        <table class="table table-hover dashboard-task-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Task</th>
                                    <th>Status</th>
                                    <th>Manager</th>
                                    <th>Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Task A</td>
                                    <td><span class="label bg-green">Doing</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-green" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Task B</td>
                                    <td><span class="label bg-blue">To Do</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Task C</td>
                                    <td><span class="label bg-light-blue">On Hold</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-light-blue" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 72%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Task D</td>
                                    <td><span class="label bg-orange">Wait Approvel</span></td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Task E</td>
                                    <td>
                                        <span class="label bg-red">Suspended</span>
                                    </td>
                                    <td>John Doe</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-red" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 87%"></div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Task Info -->
        <!-- Browser Usage -->
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <div class="card">
                <div class="header">
                    <h2>BROWSER USAGE</h2>
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
                    <div id="donut_chart" class="dashboard-donut-chart"></div>
                </div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
    </div>
</div>
@endsection
