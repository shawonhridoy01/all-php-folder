@extends('layouts.master')

@section('title')
Category
@endsection

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Category</h1>

    <div class="row">
        @if(Session::has('category_added'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ Session::get('category_added') }}</strong>
            </div>

        @endif



    </div>

    <div class="row">
        <div class="card">
            <div class="card-header">
                    @if (Session::has('category_delete'))
                        <script>
                            swal({
                            title: "Are you sure?",
                            text: "Once deleted, you will not be able to recover this imaginary file!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                            })
                            .then((willDelete) => {
                            if (willDelete) {
                                swal("{ !! Session::get('category_delete') !! }", {
                                icon: "success",
                                });
                            } else {
                                swal("Your imaginary file is safe!");
                            }
                            });
                        </script>
                    @endif

                    <h6 class="d-inline-block">View Category</h6>
                    <a href="{{route('category.create')}}" class="btn btn-primary float-end">Add Category</a>
            </div>

            <div class="card-body">
                <table class="table table-striped table-inverse table-responsive table-bordered text-center"  id="myTable">
                    <thead class="thead-inverse">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th> Status</th>
                            <th>Image</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key =>$category)
                            <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->status  ==  '1' ? 'Hidden' : "Show"}}</td>
                                    <td>


                                        <img src="{{ asset('uploads/category') }}/{{$category->image}}" alt="img" width="90px" >
                                    </td>

                                    <td>
                                        <a href="#" class="btn btn-success">View</a>
                                        <a href="edit/{{$category->id}}" class="btn btn-primary">Edit</a>
                                

                                        <form action="delete/{{$category->id}}" method="post" style = "display:inline-block" >
                                            @csrf
                                            @method('delete')

                                            <button type="submit" class="btn btn-danger" >Delete</button>
                                        </form>
                                    </td>
                            @empty
                            </tr>
                            @endforelse
                        </tbody>
                </table>
            </div>
        </div>
    </div>


</div>


@endsection
