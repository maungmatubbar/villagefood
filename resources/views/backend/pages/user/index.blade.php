@extends('backend.index')
@section('title')
    User List
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User List</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            <a class="btn btn-primary" href="{{ route('backend.category.create') }}">Create New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>User Type</th>
                        <th>Is Approved Seller</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{ $user->name }}
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td> <span class="badge badge-pill badge-primary">{{ $user->user_type }}</span></td>
                            <td>
                               @if($user->user_type === \App\Enum\UserTypeEnum::SELLER)
                                    @if($user->is_approved_seller)
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-warning">Pending Approve</span>

                                    @endif
                                @endif
                            </td>

                            <td>
                                <a href="{{ route('product.edit',['id'=>$user->id]) }}" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><i class="fa fa-trash"></i></a>
                                @if($user->user_type === \App\Enum\UserTypeEnum::SELLER)
                                    @if($user->is_approved_seller)
                                        <button class="btn btn-sm btn-secondary"  disabled><i class="fa fa-check-double"></i></button>
                                    @else
                                        <a href="{{ route('backend.user.approved',['id'=>$user->id]) }}" class="btn btn-sm btn-success" title="Approved"><i class="fa fa-check-double"></i></a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Logout Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are your sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="" >Delete</a>
                </div>
            </div>
        </div>
    </div>

@endsection
