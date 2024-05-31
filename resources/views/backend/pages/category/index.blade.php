@extends('backend.index')
@section('title')
    Category List
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Category List</h1>

    </div>
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex py-3 align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
            <a class="btn btn-primary" href="{{ route('backend.category.create') }}">Create Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>@if($category->image)<img src="{{ asset($category->image )}}" alt="category" style="height: 100px; width: 100px;">@else No Image @endif</td>
                            <td>
                                @if($category->status)
                                    <a href="{{ route('backend.category.update.status',['id'=>$category->id]) }}" class="btn btn-success">Active</a>
                                @else
                                    <a href="{{ route('backend.category.update.status',['id'=>$category->id]) }}" class="btn btn-warning">Inactive</a>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('backend.category.edit',['id'=>$category->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('backend.category.delete',['id'=>$category->id]) }}" class="btn btn-danger" onclick="return confirm('Are you sure delete this category?')"><i class="fa fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
