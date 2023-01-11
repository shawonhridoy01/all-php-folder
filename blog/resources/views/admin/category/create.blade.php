@extends('layouts.master')

@section('title')
Add Category
@endsection
@section('content')
<div class="container-fluid px-4 mt-3">


    <div class="row">
        <div class="card">
            <div class="card-header">
                <h2>Add Category</h2>
            </div>
            <div class="card-body">
                        <!-- add category form  -->
        <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-3">
              <label for="">Enter Category Name </label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" value="{{old('name')}}">
              @error('name')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="">Enter Category Slug </label>
              <input type="text" name="slug" id="slug" class="form-control" placeholder="Enter Category Slug" aria-describedby="helpId"  value="{{old('slug')}}">
              @error('slug')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>


            <div class="form-group mt-3">
              <label for="">Enter Description </label>
              <textarea name="description" id="description" cols="5" rows="5" placeholder="Enter  Description" class="form-control">{{old('description')}}</textarea>
              @error('description')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

            <div class="form-group mt-3">
              <label for="">Enter Category Image </label>
              <input type="file" name="image" id="image" class="form-control" placeholder="Enter Category Image" aria-describedby="helpId"  value="{{old('image')}}">
              @error('image')
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
              <textarea name="meta_description" id="meta_description" cols="5" rows="5" placeholder="Enter Meta Description" class="form-control">{{old('description')}}</textarea>
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
                <input type="checkbox" class="form-check-input" name="navbar_status" id="navbar_status">
                Navbar Status
              </label><br>
              @error('navbar_status')
                    <small><strong class="text-danger">{{$message}}</strong></small>
              @enderror
            </div>

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


        <input type="submit" value="Save Category" class="btn btn-success mt-5">





        </form>
        <!-- add category form  -->
            </div>
        </div>
    </div>


</div>


@endsection
