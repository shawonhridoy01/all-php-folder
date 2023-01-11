@extends('layouts.master')

@section('title')
Edit Post
@endsection
@section('content')
<div class="container-fluid px-4 mt-3">


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Edit Post</h2>
            </div>
            <div class="card-body">

                <!-- add category form  -->
                <form action="/admin/post-edit/{{$post->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')


        <div class="form-group mt-3">
              <label for="">Enter Post Category </label>
                <select name="category_id" id="category_id" class="form-control">

                    <option value="Select One" disabled selected>Select One </option>

                    @forelse ($categories as $category)
                            <option value="{{$category->id}}"     {{ $post->category_id == $category->id ? 'selected' : '' }}  > {{ $category->name }} </option>
                    @empty
                        {{ $post->category_id == $category->id ? 'selected' : '' }}
                    @endforelse
                </select>
              @error('category_id')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>


                    <div class="form-group mt-3">
                        <label for="">Enter Post Name </label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter Post Name" aria-describedby="helpId" value="{{$post->name}}">
                        @error('name')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="">Enter Post Slug </label>
                        <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Post Slug" aria-describedby="helpId" value="{{$post->slug}}">
                        @error('slug')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="">Enter Post Description </label>
                        <textarea name="description" id="description" cols="5" rows="5" placeholder="Enter Post Description" class="form-control">{{$post->description}}</textarea>
                        @error('description')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>



                    <h6 class="mt-5">Seo Tags</h6>
                    <div class="form-group mt-3">
                        <label for="">Enter Meta Title </label>
                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title"value="{{$post->meta_title}}" aria-describedby="helpId">
                        @error('meta_title')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>



                    <div class="form-group mt-3">
                        <label for="">Enter Meta Description </label>
                        <textarea name="meta_description" id="meta_description" cols="5" rows="5" placeholder="Enter Meta Description" class="form-control">{{ $post->meta_description }}</textarea>
                        @error('meta_description')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>


                    <div class="form-group mt-3">
                        <label for="">Enter Meta Keyword </label>
                        <textarea name="meta_keyword" id="meta_keyword" cols="5" rows="5" placeholder="Enter Meta Keyword" class="form-control">{{ $post->meta_keyword }}</textarea>
                        @error('meta_keyword')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>



                    <h6 class="mt-5">Status Mode </h6>



                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" name="status" id="status" {{$post->status == '1' ? 'checked' : '' }}>
                            Status
                        </label>
                        <br>
                        @error('status')
                        <small><strong class="text-danger">{{$message}}</strong></small>
                        @enderror
                    </div>


                    <input type="submit" value="Save Category" class="btn btn-success mt-5">





                </form>
                <!-- add category form  -->
            </div>
        </div>
    </div>


</div>


@endsection
