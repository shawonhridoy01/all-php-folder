@extends('layouts.master')

@section('title')
Edit User
@endsection
@section('content')
<div class="container-fluid px-4 mt-3">



    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Edit User Role</h2>
            </div>
            <div class="card-body">
                <!-- edit  user  form  -->
                <form action="/admin/user/{{$user->id}}" method="post">
                    @csrf
                    @method('put')


                    <div class="form-group mt-3">
                        <label for="">Enter User Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Username"
                            aria-describedby="helpId" value="{{$user->name}}">
                        @error('name')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="">Enter User Email </label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email"
                            aria-describedby="helpId" value="{{$user->email}}">
                        @error('email')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Enter User Role </label>
                        <select name="role_as" id="role_as" class="form-control">

                            <option value="1" {{$user->role_as == '1' ? 'selected': ''}}>Admin</option>
                            <option value="0" {{$user->role_as == '0' ? 'selected': ''}}>User</option>
                            <option value="2" {{$user->role_as == '2' ? 'selected': ''}}>Blogger</option>

                        </select>
                        @error('role_as')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>





                    <input type="submit" value="Save Post" class="btn btn-success mt-5">





                </form>
                <!-- add category form  -->
            </div>
        </div>
    </div>


</div>


@endsection
