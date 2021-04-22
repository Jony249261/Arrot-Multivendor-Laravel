@extends('layouts.buyer-app')

@section('buyer-user', 'active')
@section('buyer-user-index', 'active')
@section('title', 'Support user')

@section('content')

    <div class="container-fluid">

        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bg-orange text-center">
                        <h2>
                            Buyer User

                        </h2>
                        <ul class="header-dropdown m-r--5">
                            <a href="{{ route('users.create') }}" class="btn btn-default">Create</a>

                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>{{ __('SL') }}</th>
                                        <th>{{ __('Name') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Email') }}</th>
                                        <th>{{ __('Phone') }}</th>
                                        <th>{{ __('Role') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $i => $user)
                                        <tr>
                                            <td>{{ $i + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <img height="60" src="{{ asset('users/'.$user->image) }}" alt="user-image">
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone }}</td>
                                            <td>
                                                <span class="badge badge-info">{{ ucfirst($user->role) }}</span>
                                            </td>
                                            <td>
                                                @if($user->is_verified == 1)
                                                <span class="badge badge-primary">Active</span>
                                                @else
                                                <span class="badge bg-warning">Inactive</span>
                                                @endif
                                            </td>


                                            <td>

                                                <div class="icon-button-demo">
                                                    <a href="{{ route('buyer-users.edit',$user->id) }}" class="btn btn-info waves-effect" style="float: left">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                                    @if($user->is_verified == 1)
                                                    <a href="{{ route('buyer-users.show',$user->id) }}" class="btn btn-danger waves-effect" title="Inactive" style="float: left">
                                                        <i class="material-icons">visibility_off</i>
                                                    </a>
                                                    @else
                                                    <a href="{{ route('buyer-users.show',$user->id) }}" class="btn btn-success waves-effect" title="Active" style="float: left">
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    @endif

                                                </div>


                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="8">No Item Found!!!</td>
                                        </tr>
                                    @endforelse
                                </tbody>

                            </table>
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>




@endsection
