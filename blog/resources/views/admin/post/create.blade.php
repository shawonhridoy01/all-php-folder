@extends('layouts.master')

@section('title')
Add Post
@endsection
@section('content')
<div class="container-fluid px-4 mt-3">


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Add Post</h2>
            </div>
            <div class="card-body">
                        <!-- add post form  -->
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group mt-3">
              <label for="">Enter Post Category </label>
                <select name="category_id" id="category_id" class="form-control">

                    <option value="Select One" disabled selected>Select One </option>

                    @forelse ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                    @empty

                    @endforelse
                </select>
              @error('category_id')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>


            <div class="form-group mt-3">
              <label for="">Enter Post Name </label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Post Name" aria-describedby="helpId" value="{{old('name')}}">
              @error('name')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="">Enter Post Slug </label>
              <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Post Slug" aria-describedby="helpId"  value="{{old('slug')}}">
              @error('slug')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>


            <div class="form-group mt-3">
              <label for="">Enter Post Description </label>
              <textarea name="description" id="summernote"  cols="5" rows="5"  class="form-control">{{old('description')}}</textarea>
              @error('description')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="">Enter Youtube Link </label>
              <input type="text" name="yt_iframe" id="yt_iframe" class="form-control" placeholder="Enter Youtube Link" aria-describedby="helpId"  value="{{old('image')}}">
              @error('yt_iframe')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

            <h6 class="mt-5">Seo Tags</h6>
            <div class="form-group mt-3">
              <label for="">Enter Meta Title </label>
              <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Enter Meta Title"   value="{{old('meta_title')}}" aria-describedby="helpId">
              @error('meta_title')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>



            <div class="form-group mt-3">
              <label for="">Enter Meta Description </label>
              <textarea name="meta_description" id="meta_description" cols="5" rows="5" placeholder="Enter Meta Description" class="form-control">{{old('meta_description')}}</textarea>
              @error('meta_description')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>


            <div class="form-group mt-3">
              <label for="">Enter Meta Keyword </label>
              <textarea name="meta_keyword" id="meta_keyword" cols="5" rows="5" placeholder="Enter Meta Keyword" class="form-control">{{old('meta_keyword')}}</textarea>
              @error('meta_keyword')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>



            <h6 class="mt-5">Status Mode </h6>



            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="status" id="status">
                 Status
              </label>
              <br>
              @error('status')
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


