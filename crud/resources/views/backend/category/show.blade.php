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
        <h3>Category Details</h3>
        <a href="{{route('category.index')}}" class="btn btn-dark">Back To Home</a>

    </div>
    <div class="card-body">
        <form>


            <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="" aria-describedby="helpId" value="{{$category->name}}">
            </div>





        </form>
    </div>

</div>


@endsection

@push('css')


</style>

@endpush
