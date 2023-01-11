@extends('master')


@section('title')
category
@endsection

@section('main_content')

@if (Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('success_message')}}</strong>
</div>
@endif
@if (Session::has('delete_message'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{Session::get('delete_message')}}</strong>
</div>
@endif

<div class="card">

    <div class="card-header">
        <h3>Category List</h3>
        <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
    </div>
    <div class="card-body">
        <table class="table table-striped table-inverse table-responsive text-center">
            <thead class="thead-inverse">
                <tr class="bg-primary">
                    <th  style="width: 7%;">C. No.</th>
                    <th  style="width: 20%;">Category Name</th>
            
                    <th  style="width: 5%;"> Status </th>
                    <th  style="width: 28%;"> Action </th>
                </tr>
                </thead>
                <tbody>

                        @forelse ($categories as  $key => $category)
                        <tr>
                        <td scope="row">{{ ++$key }}</td>
                        <td>{{$category->name}}</td>
                        <td>
                            @if ($category->status == '1')
                                <span class="badge badge-success">Active</span>
                            @else
                            <span class="badge badge-danger">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="/category/show/{{$category->id}}" class="btn btn-primary">View</a>
                            <a href="/category/edit/{{$category->id}}" class="btn btn-success">Edit</a>

                            <form action="/category/delete/{{$category->id}}" method="post" style="display: inline-block;">
                            @csrf
                            @method('delete')
                                <button type="submit" class="btn btn-danger"> Delete </button>
                            </form>
                        </td>
                    </tr>
                        @empty
                            <td colspan='6' ><b>No Data Found</b></td>
                        @endforelse

                </tbody>
        </table>
    </div>

</div>


@endsection

@push('css')


</style>

@endpush


