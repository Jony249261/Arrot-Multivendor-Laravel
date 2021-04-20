@extends('layouts.login-app')

@section('login_content')

<div class="container">
        <div class="card">
            <div class="card-body">
                <div class="circle"></div>
                    <header class="myHed text-center">
                        <i class="user"><img src="{{asset('login_admin')}}/download.png" alt=""></i>
                       <!--<i class="fa fa-user"></i>
                        <p>LOGIN</p>
                        --> 
                    </header>
                    <!--<h4 class="text-center text-red">Password Reset</h4>-->
                     @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="main-form text-center">
                    @csrf
                        <div class="from-group my-0">
                            <label class="my-0">
                                <i class="fa fa-user fas"></i>
                                <input id="email" type="email" class="myInput" placeholder="Email" name="email" >
                
                            </label>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="from-group mt-1">
                            <label class="my-0">
                                
                                <input type="submit" class="form-control buttonpr" value="Password Reset">
                                
                            </label>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>


@endsection
