@extends('master')


@section('title')
show
@endsection

@section('main_content')

<!-- @if (Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('success_message')}}</strong>
</div>
@endif -->

<div class="card">
    <div class="card-header">
        <h3>Post Details</h3>
        <a href="{{route('category.index')}}" class="btn btn-dark">Back To Home</a>
    </div>
</div>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $post->title }}</h3> <br>
            <h6> {{ $post->sub_title }} </h6>
        </div>
        <div class="card-body">
        <img src="\{{$post->thumbnail}}" width="800px" height="300px" alt="">
        <p class="mt-4"> {{ $post->description }}</p>
        <p class="mt-4"> Category: {{ $post->category->name }}</p>
        <p class="mt-4">Author : {{ $post->author  }}</p>




        </div>
    </div>


@endsection

@push('css')


</style>

@endpush
