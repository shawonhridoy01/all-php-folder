@extends('layouts.master')

@section('title')
User
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Users</h1>

    <div class="row">
        @if(Session::has('user_updated'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>{{ Session::get('user_updated') }}</strong>
        </div>
        @endif
    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped table-inverse table-responsive table-bordered text-center" id="myTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th> Email </th>
                            <th>Role</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key =>$user)
                            <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role_as == '1' ? 'admin' : 'user'}}</td>
                                    <td>
                                    <a href="#" class="btn btn-success">View</a>
                                        <a href="user/{{$user->id}}" class="btn btn-primary">Edit</a>
                                    </td>




                            @empty
                            </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


@endsection
