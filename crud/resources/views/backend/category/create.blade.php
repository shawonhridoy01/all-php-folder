@extends('master')

@section('title')
create
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

    <form action="{{ route('category.store') }}" method="post" enctype="multipart form-data">
    @csrf

    <div class="form-group">
      <label for="">Enter Your Category</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId">
      @error('name')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>


    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" name="status" id="status">
        <option value='1'>Active</option>
        <option value="0">Inactive</option>
      </select>
      @error('status')
            <small  class="text-danger"><strong>{{$message}}</strong></small>
      @enderror
    </div>

    <button class="btn btn-success">Save </button>


    </form>
@endsection
