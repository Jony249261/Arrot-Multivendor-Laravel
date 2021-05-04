<nav class="navbar no-print">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="{{route('supplier.index')}}"><img src="{{asset('users/'.Auth::user()->image)}}" alt="Supplier" height="50px" alt="">" alt="Supplier"></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li class="navdesc"> {{Auth::user()->name}}</li>
                <!-- Notifications -->
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        
                        <span class="label-count">{{  $supplierUsers->count() + $orders->count() }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $supplierUsers->count() }} new user added</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>@if(isset($supplierUsers->latest()->first()->created_at)) {{ $supplierUsers->latest()->first()->created_at->diffForHumans() }} @endif mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('order.index') }}">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4>{{ $orders->count() }} new order</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>@if(isset($orders->latest()->first()->created_at)) {{ $orders->latest()->first()->created_at->diffForHumans() }} @endif mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @php
                                    $order = $orders->orWhere('status','received')->Orwhere('payment_status','paid')->latest()->first();
                                @endphp
                                @if(isset($order))
                                <li>
                                    <a href="{{ route('order.show',$order->id) }}">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            
                                            <h4>Order id {{ $order->showId }} is {{ $order->status }} @if($order->payment_status == 'paid') and payment is {{ $order->payment_status }} @endif.</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>@if(isset($order->showId)) {{ $order->updated_at->diffForHumans()}} @else 0 @endif  mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                {{-- @php
                                    $order = $orders->where('payment_status','paid')->latest()->first();
                                @endphp
                                @if(isset($order))
                                <li>
                                    <a href="{{ route('order.show',$order->id) }}">
                                        <div class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </div>
                                        <div class="menu-info">
                                            
                                            <h4>Order id {{ $order->showId }} is {{ $order->payment_status }}.</h4>
                                            <p>
                                                <i class="material-icons">access_time</i>@if(isset($order->showId)) {{ $order->updated_at->diffForHumans()}} @else 0 @endif  mins ago
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                @endif --}}

                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- Tasks -->
                {{-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">flag</i>
                        <span class="label-count">9</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Footer display issue
                                            <small>32%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-pink" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 32%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Make new buttons
                                            <small>45%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Create new dashboard
                                            <small>54%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-teal" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 54%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Solve transition issue
                                            <small>65%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-orange" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <h4>
                                            Answer GitHub questions
                                            <small>92%</small>
                                        </h4>
                                        <div class="progress">
                                            <div class="progress-bar bg-purple" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 92%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Tasks</a>
                        </li>
                    </ul>
                </li> --}}

            </ul>
        </div>
    </div>
</nav>
