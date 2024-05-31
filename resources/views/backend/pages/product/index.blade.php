@extends('backend.index')
@section('title')
    Product List
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Product List</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
            <a class="btn btn-primary" href="{{ route('product.create') }}">Create New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Publisher Info</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Image</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Weight</th>
                        <th>Weight Type</th>
                        <th>Is Approved</th>
                        <th>Is Published</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    {{ $product?->user?->name.',' }} <br>
                                    {{ $product?->user?->email.',' }} <br>
                                    {{ $product?->user?->phone_number }}
                                </td>
                                <td>{{ $product->name }}</td>

                                <td>{{ $product?->category?->name }}</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="" style="width: 60px; height: 60px;">
                                    @else
                                        No Image
                                    @endif
                                </td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->weight_type }}</td>
                                <td>
                                    @if($product->is_approved)
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-danger">Pending Approve</span>

                                    @endif
                                </td>
                                <td>
                                    @if($product->is_published)
                                        <span class="badge badge-success">Published</span>
                                        @else
                                        <span class="badge badge-danger">Unpublished</span>

                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('product.edit',['id'=>$product->id]) }}" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{ route('product.delete',['id'=>$product->id])  }}" class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure delete this product?')"
                                    ><i class="fa fa-trash"></i></a>
                                   @if($product->user_id === auth()->user()->id)
                                        @if($product->is_published)
                                            <a href="{{ route('product.published',['id'=>$product->id]) }}" class="btn btn-sm btn-warning" title="Unpublished"><i class="fa fa-arrow-down"></i></a>
                                        @else
                                            <a href="{{ route('product.published',['id'=>$product->id]) }}" class="btn btn-sm btn-success" title="Published"><i class="fa fa-arrow-up"></i></a>

                                        @endif
                                    @endif
                                    @if($product->is_approved)
                                        <a href="{{ route('product.approved',['id'=>$product->id]) }}" class="btn btn-sm btn-warning" title="Disapproved"><i class="fa fa-window-close"></i></a>
                                    @else
                                        <a href="{{ route('product.approved',['id'=>$product->id]) }}" class="btn btn-sm btn-success" title="Approved"><i class="fa fa-check-double"></i></a>

                                    @endif

                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
