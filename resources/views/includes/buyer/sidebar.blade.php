<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{asset('backend/images/user.png')}}" width="48" height="48" alt="User" />
        </div>
        <div class="info-container">
            <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
            <div class="email">{{Auth::user()->email}}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="{{route('profile.index')}}"><i class="material-icons">person</i>Profile</a></li>
                    <li role="seperator" class="divider"></li>

                    <li>  <a  href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i>Sign Out

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                      </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        @if(Auth::user()->role=='buyer')
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            <li class="@yield('dashboard')">
                <a href="{{route('buyer.index')}}">
                    <i class="material-icons">home</i>
                    <span>Home</span>
                </a>
            </li>

            <li class="@yield('profile')">
                <a href="{{route('profile.index')}}">
                    <i class="material-icons">person</i>
                    <span>Profile</span>
                </a>
            </li>

            <li class="@yield('order')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">production_quantity_limits</i>
                    <span>Order</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('order_create')">
                        <a href="{{ route('orders.create') }}">Create Order</a>
                    </li>
                    <li class="@yield('create-order')">
                        <a href="{{ route('orders.create') }}">Order create</a>
                    </li>
                </ul>
            </li>



            <li class="@yield('buyer-user')">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">group_add</i>
                    <span>Users</span>
                </a>
                <ul class="ml-menu">
                    <li class="@yield('buyer-user-index')">
                        <a href="{{route('buyer-users.index')}}">All User</a>
                    </li>
                    <li class="@yield('buyer-user-create')">
                        <a href="{{route('buyer-users.create')}}">Create User</a>
                    </li>
                </ul>
            </li>

        </ul>


{{--            Menu For Procurment--}}
            @elseif(Auth::user()->role=='procurement')

                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="@yield('dashboard')">
                        <a href="{{route('buyer.index')}}">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>

                    <li class="@yield('profile')">
                        <a href="{{route('profile.index')}}">
                            <i class="material-icons">person</i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li class="@yield('order_create')">
                        <a href="{{ route('orders.create') }}">
                            <i class="material-icons">shopping_cart</i>
                            <span>Create Order</span>
                        </a>
                    </li>
                    <li class="@yield('all-order')">
                        <a href="{{route('orders.index')}}">
                            <i class="material-icons">production_quantity_limits</i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            <i class="material-icons">input</i> <span>Logout</span>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
            </ul>
            @endif
    </div>
    <!-- #Menu -->
    <!-- Footer -->
   <div class="legal">
        <div class="copyright">
            &#169; <span id="date"></span> <a href="https://www.selevenit.com/">S11Limited</a>.
        </div>
        <div class="version">
            <a href="https://www.selevenit.com/">www.selevenit.com</a>
        </div>
    </div>
    <!-- #Footer -->
</aside>
