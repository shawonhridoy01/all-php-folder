@extends('layouts.master')

@section('title')
Posts
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Post</h1>

    <div class="row">
        @if(Session::has('post_added'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ Session::get('post_added') }}</strong>
            </div>

        @endif



    </div>

    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>View Post</h2>
            </div>

            <div class="card-body">
                <table class="table table-striped table-inverse table-responsive table-bordered text-center"  id="myTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Post ID</th>
                            <th>Category</th>
                            <th>Name</th>
                            <th> Status</th>

                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $post)

                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>{{ $post->name }}</td>
                                    <td>{{ $post->status == '1'  ? 'visable' : 'hidden'}} </td>
                                    <td>
                                        <a href="#" class="btn btn-success">View</a>

                                        <a href="post-edit/{{$post->id}}" class="btn btn-primary">Edit</a>




                                    </td>
                                </tr>
                            @empty

                            @endforelse
                        </tbody>
                </table>
            </div>

        </div>
    </div>



</div>


@endsection
