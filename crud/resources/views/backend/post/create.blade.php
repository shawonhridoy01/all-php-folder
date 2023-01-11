@extends('master')

@section('title')
Post Create
@endsection

@section('main_content')

<!-- alert message if any error or data not inserted successfully -->
<!-- @if (Session::has('error_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('error_message')}}</strong>
</div>
@endif -->

<form action="{{ route('post.store') }} " method="post" enctype="multipart/form-data" >
    @csrf

    <!-- title field  -->
    <div class="form-group">
        <label for="">Enter Post Title </label>
        <input type="text" name="title" id="title" class="form-control" placeholder="Post Title "
            aria-describedby="helpId" value="{{old('title')}}">
        @error('title')
        <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>


    <!-- sub_title field  -->
    <div class="form-group">
        <label for="sub_title">Enter Post Title </label>
        <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="Post Sub Title "
            aria-describedby="helpId" value="{{old('sub_title')}}">
        @error('sub_title')
        <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>



    <!-- description field  -->
    <div class="form-group">
        <label for="description">Enter Post Description </label>
        <textarea name="description" id="description" cols="20" rows="5" class="form-control" placeholder="Enter Your Description">{{old('description')}}</textarea>
        @error('description')
        <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>


    <!-- image field  -->
    <div class="form-group">
        <label for="thumbnail">Enter Thumbnail Image </label>
        <input type="file" name="thumbnail" id="thumbnail" class="form-control"  value="{{old('thumbnail')}}">
        @error('thumbnail')
        <small class="text-danger"><strong>{{$message}}</strong></small>
        @enderror
    </div>





    <!-- category field  -->
    <div class="form-group">
      <label for="category">Category Name </label>
      <select class="form-control" name="category_name" id="category_name"  value="{{old('category')}}">
        <option value="Select One" disabled selected>Select One </option>
            @foreach ($categories as $category )
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
      </select>
      @error('category_name')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


        <!-- author field  -->
        <div class="form-group">
      <label for="category">Author Name </label>
      <select class="form-control" name="author" id="author"  value="{{old('author')}}">
      <option value="Select One" disabled selected>Select One </option>
        <option value='1'>Shawon</option>
      </select>
      @error('author')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>












    <button class="btn btn-success">Save </button>


</form>
@endsection
