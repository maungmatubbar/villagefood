@extends('backend.index')
@section('title')
    Category Create
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create New Category</h1>

    </div>
    <div class="card shadow mb-4 col-6 mx-auto">
        <div class="card-header d-sm-flex py-3 mt-2 align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Create New</h6>
            <a class="btn btn-outline-dark " href="{{ route('backend.category.index') }}"><i class="fa fa-arrow-alt-circle-left mr-1"></i>Back</a>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.category.store') }}" method="post" enctype="multipart/form-data"> @csrf
                <div class="form-group">
                    <label for="categoryName">Category Name*</label>
                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter Category Name"/>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Enter description"></textarea>
                </div>
                <div class="form-group mb-3">
                    <label  for="inputGroupFile02">Image</label>
                    <div class="input-group mb-3">
                        <div class="input-group mb-3">
                            <input type="file" name="image" />
                        </div>
                    </div>

                </div>
                <div class="form-group">
                    <label>Status</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="0">
                            <label class="form-check-label" for="inlineRadio2">Inactive</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary">Create</button>

            </form>
        </div>
    </div>
@endsection
