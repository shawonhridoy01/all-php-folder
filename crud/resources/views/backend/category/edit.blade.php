@extends('master')

@section('title')
Edit
@endsection

@section('main_content')

    <!-- alert message if any error or data not inserted successfully -->
    @if (Session::has('error_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('error_message')}}</strong>
</div>
@endif

    <form action="/category/edit/{{$category->id}}" method="post" enctype="form/multipart">
    @method('put')
    @csrf

    <div class="form-group">
      <label for="">Enter Your Category</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$category->name}}">
      @error('name')
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
