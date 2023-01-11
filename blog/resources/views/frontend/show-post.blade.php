@extends('frontend.frontend-master')

@includeIf('frontend.frontend-navbar')

<!-- title  -->
@section('title')
{{$post->name}}
@endsection
<!-- meta_title -->
@section('meta_title')
{{$post->meta_title}}
@endsection

<!-- meta description  -->

@section('meta_description')
{{$post->meta_description}}
@endsection

<!-- meta keyword  -->
@section('meta_keyword')
{{$post->meta_keyword}}
@endsection



@section('frontend-content')

<div class="container">
<div class="row mt-5">
    <div class="col-md-8">
        <div class="category-heading">
            <h4>{{$post->name}}</h4>
        </div>


        <div class="category-slug mt-4">
            <h5> {!! $post->category->name !!} </h5>
            <!-- / {!! $post->slug !!} -->
        </div>

        <div class="card card-shadow mt-3">
            <div class="card-body ">
                <p class="post-heading"> {!! $post->description !!}</p>
            </div>
        </div>
        <div class="comment">
            <div class="card mt-4">
                @if (Session::has('message'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>{{Session::get('message')}}</strong>
                    </div>
                @endif

                @if (Session::has('success_comment'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <strong>{{Session::get('success_comment')}}</strong>
                    </div>
                @endif

                <div class="card-header">
                <h6>Leave a Comment </h6>
                <form action="{{route('comment.store')}}" method="post">
                @csrf
                    <input type="hidden" name="comment_slug" id="comment_slug" value="{{$post->slug}}">
                    <textarea name="comment_body" id="comment" cols="10" rows="5" class="form-control"></textarea>
                    @error('comment_body')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                    @enderror
                    <button type="submit" class="text-white py-2 px-4 float-right mt-3" style="background-color: darkblue; ">Comment</button>
                </form>
                </div>

                @forelse ($post->comments as $comment)
                <div class="card-body mt-3">
                    @if ($comment->user)
                    <h6 class="d-inline-block mr-3">{{ $comment->user->name }} </h6>

                    @endif
                    <h6 class="d-inline-block">Commented On: {{$comment->created_at->format('d-m-Y')}}</h6>
                    <p>{{$comment->comment_body}}</p>
                    @if (Auth::check())
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endif
                </div>
                @empty
                        <h5>No Comment Yet</h5>
                @endforelse
            </div>
        </div>

    </div>
    <div class="col-md-4">

        <img src="{{asset('assets/image/1.jpg')}}" alt="">

            <div class="card">
                <div class="card-header">
                    <h3>Latest Post </h3>
                </div>

                <div class="card-body">
                    @forelse ($latestposts as $latestpost )

                        <a href="{{$latestpost->slug}}">
                        <h6>{{$latestpost->name}}</h6>
                        </a>
                    @empty
                        <h3>Latest Post Not Available</h3>
                    @endforelse

                </div>


            </div>

    </div>
</div>
</div>
@endsection


