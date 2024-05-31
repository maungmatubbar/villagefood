@extends('backend.index')
@section('title')
    Order List
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order List</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Orders</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>Publisher</th>
                        <th>User Info</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Weight</th>
                        <th>Order Status</th>
                        <th>Ordered Date</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->invoice->invoice_no }}</td>
                            <td>
                                <p>User: <span>{{ $order->product->user->name }}</span></p>
                                <p>Email: <span>{{ $order->product->user->email }}</span></p>
                                <p>Phone: <span>{{ $order->product->user->phone_number }}</span></p>
                            </td>
                            <td>
                                <p>User Name: <span class="text-primary"> {{ $order->user->name }}</span></p>
                                <p>Email: <span class="text-primary">{{ $order->user->email }}</span></p>
                                <p>Phone: <span class="text-primary">{{ $order->user->phone }}</span></p>
                            </td>
                            <td>
                                <p>{{ $order?->address?->district }}</p>
                                <p>{{ $order?->address?->address }}</p>
                            </td>
                            <td><a href="{{ route('product.details',['id'=>$order->product_id]) }}">{{ $order->product->name }}</a></td>
                            <td><img style="width: 200px; width: 150px;" src="{{ asset($order->product?->image) }}" alt="img"></td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->weight }} {{ $order->weight_type }}</td>
                            <td><span class="badge badge-primary">{{ $order->order_status }} </span></td>
                            <td>{{ date('M d, Y',strtotime($order->created_at ))}} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
