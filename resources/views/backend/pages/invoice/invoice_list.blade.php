@extends('backend.index')
@section('title')
    Order List
@endsection
@section('main_content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Invoice List</h1>

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
            <h6 class="m-0 font-weight-bold text-primary">Invoices</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Invoice No</th>
                        <th>User Info</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                        <th>Payment Status</th>
                        <th>Delivery Status</th>
                        <th>Ordered Date</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->invoice_no }}</td>
                            <td>
                                <p class="text-secondary">Name: <span class="text-primary">{{ $invoice?->user->name }}</span></p>
                                <p class="text-secondary">Email: <span class="text-primary">{{ $invoice?->user->email }}</span></p>
                                <p class="text-secondary">Phone: <span class="text-primary">{{ $invoice?->user->phone_number }}</span></p>
                            </td>
                            <td>
                                <p class="text-secondary">Name: <span class="text-primary">{{ $invoice?->address->first_name }} {{ $invoice?->address->last_name }}</span></p>
                                <p class="text-secondary">District: <span class="text-primary">{{ $invoice?->address->district }}</span></p>
                                <p class="text-secondary">Postal Code: <span class="text-primary">{{ $invoice?->address->postal_code }}</span></p>
                                <p class="text-secondary">Phone: <span class="text-primary">{{ $invoice?->address->phone_number }}</span></p>
                                <p class="text-secondary">Address: <span class="text-primary">{{ $invoice?->address->address }}</span></p>
                            </td>

                            <td>{{ $invoice->total_price }} .tk</td>
                            <td>{{ $invoice->payment_method }}</td>
                            <td class="text-uppercase">{{ $invoice->payment_status }}</td>
                            <td>{{ $invoice->delivery_status }}</td>
                            <td>{{ date('M d, Y',strtotime($invoice->created_at ))}} </td>
                            <td> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection
