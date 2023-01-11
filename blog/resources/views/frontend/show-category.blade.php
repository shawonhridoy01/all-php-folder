@extends('frontend.frontend-master')


@includeIf('frontend.frontend-navbar')
<!-- title  -->
@section('title')
{{$category->name}}
@endsection
<!-- meta_title -->
@section('meta_title')
{{$category->meta_title}}
@endsection

<!-- meta description  -->

@section('meta_description')
{{$category->meta_description}}
@endsection

<!-- meta keyword  -->
@section('meta_keyword')
{{$category->meta_keyword}}
@endsection

@section('frontend-content')


<div class="container">
<div class="row mt-5">
    <div class="col-md-8">
        <div class="category-heading">
            <h4>{{$category->name}}</h4>
        </div>

        @forelse ($posts as $post)
        <div class="card card-shadow mt-3">
            <div class="card-body ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/H2miVIHLd-Y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!-- <iframe width="560" height="315" src="{{$post->yt_frame}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
                <a href="/tutorial/{{ $category->name }}/{{$post->slug}}">
                <h2 class="post-heading">{{$post->name}}</h2>
                </a>
                <strong>Posted By: {{$post->user->name}}</strong>
                <strong  class="float-end">Posted On: {{$post->created_at->format('d-m-Y')}}</strong>
            </div>
        </div>
        <div class="pagination mt-4">
                {{ $posts->links() }}
        </div>
            @empty

            @endforelse



    </div>
    <div class="col-md-4">
        <div class="">
            <img src="{{asset('assets/image/1.jpg')}}" alt="">
        </div>
    </div>
</div>
</div>
@endsection
