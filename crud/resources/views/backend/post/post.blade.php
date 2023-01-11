@extends('master')


@section('title')
category
@endsection

@section('main_content')

@if (Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('success_message')}}</strong>
</div>
@endif
<!-- @if (Session::has('delete_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('delete_message')}}</strong>
</div>
@endif -->

<div class="card">

    <div class="card-header">
        <h3>Post List</h3>
        <a href="{{route('post.create')}}" class="btn btn-primary">Add Post</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-inverse table-responsive text-center">
            <thead class="thead-inverse">
                <tr class="bg-primary">
                    <th>C. No.</th>
                    <th> Title </th>
                    <th> Sub Tittle </th>
                    <th> Description </th>
                    <th> Image </th>
                    <th> Slug </th>
                    <th>Category</th>
                    <th> Author  </th>
                    <th> Created At </th>
                    <th> Action  </th>

                </tr>
                </thead>
                <tbody>

                @forelse ($posts as $key => $post)
                <tr>
                        <td>{{++$key}}</td>

                        <td>{{$post->title}}</td>
                        <td>{{$post->sub_title}}</td>
                        <td>{{$post->description}}</td>
                        <td>
                            <img src="{{$post->thumbnail}}" width="60px" height="80px" alt="">
                        </td>
                        <td>{{$post->slug}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{$post->author}}</td>
                        <td>{{$post->created_at->diffForHumans()}}</td>

                        <td>
                            <a href="/post/show/{{$post->id}}" class="btn btn-primary">View</a>
                            <a href="/post/edit/{{$post->id}}" class="btn btn-success">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                @empty

                @endforelse


                </tbody>
        </table>
    </div>

</div>


@endsection

@push('css')


</style>

@endpush


