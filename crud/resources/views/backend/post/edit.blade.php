@extends('master')

@section('title')
Edit Post
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

    <form action="#" method="post" enctype="form/multipart">
    @method('put')
    @csrf

    <div class="form-group">
      <label for="">Enter Post Title </label>
      <input type="text" name="title" id="title" class="form-control" placeholder="" aria-describedby="helpId" value="{{$post->title}}">
      @error('title')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


    <div class="form-group">
      <label for="">Enter Post Sub Title </label>
      <input type="text" name="sub_title" id="sub_title" class="form-control" placeholder="" aria-describedby="helpId" value="{{$post->sub_title}}">
      @error('sub_title')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>



    <div class="form-group">
      <label for="">Enter Post Description  </label>
      <input type="text" name="description" id="description" class="form-control" placeholder="" aria-describedby="helpId" value="{{$post->description}}">
      @error('description')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


    <div class="form-group">
      <label for="">Select Post Category </label>
      <input type="text" name="category_name" id="category_name" class="form-control" placeholder="" aria-describedby="helpId" value="#">
      @error('description')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


    <div class="form-group">
      <label for="">Select Post Author </label>
      <input type="text" name="author" id="author" class="form-control" placeholder="" aria-describedby="helpId" value="">
      @error('description')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>

















    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" id="status">
      @if ($category->status == '1')
        <option value='1' selected>Active</option>
        <option value="0" >Inactive</option>
    @else
    <option value='1' >Active</option>
        <option value="0"  selected>Inactive</option>
    @endif
      </select>

      @error('status')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


    <button class="btn btn-success"> Update </button>


    </form>
@endsection
