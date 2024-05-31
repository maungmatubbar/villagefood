@extends('frontend.index')
@section('title')
    Dashboard
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Customer Dashboard</span>
                    </p>
                    <h1 class="mb-0 bread">Customer Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 d-block ftco-animate border p-2 justify-content-center">
                    <div class="d-flex items-centerp-4">
                        <ul class="nav nav-tabs">
                            <li class="nav-item px-1">
                                <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                                   role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a></li>
                            <li class="nav-item px-1">
                                <a class="nav-link" id="my-orders-tab" data-toggle="tab" href="#my-orders" role="tab"
                                   aria-controls="my-orders" aria-selected="true">My Orders</a></li>
                            <li class="nav-item px-1">
                                <a class="nav-link" id="my-addresses-tab" data-toggle="tab" href="#my-addresses" role="tab"
                                   aria-controls="my-addresses" aria-selected="true">My Addresses</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-12 d-block ftco-animate border p-2 justify-content-center tab-content"
                     id="myTabContent">
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel"
                         aria-labelledby="dashboard-tab">
                        <h3 class="mb-4 billing-heading text-center "><strong>Welcome to the dashboard</strong></h3>
                        <h5 class="ftco-animate text-center text-info">{{ auth()->user()->name }}</h5>
                    </div>
                    <div class="tab-pane fade" id="my-orders" role="tabpanel" aria-labelledby="my-orders-tab">
                        <h3 class="mb-4 billing-heading text-center "><strong>My Orders</strong></h3>
                        <table class="table table-bordered ">
                            <thead class="bg-secondary">
                            <tr>
                                <th>Invoice No</th>
                                <th>Address</th>
                                <th>Product Name</th>
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
                                        <p>{{ $order?->address?->district }}</p>
                                        <p>{{ $order?->address?->address }}</p>
                                    </td>
                                    <td><a href="{{ route('product.details',['id'=>$order->product_id]) }}">{{ $order->product->name }}</a></td>
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
                    <div class="tab-pane fade" id="my-addresses" role="tabpanel" aria-labelledby="my-addresses-tab">
                        <h3 class="mb-4 billing-heading text-center "><strong>My Addresses</strong></h3>
                        <table class="table table-bordered">
                            <thead class="bg-warning">
                            <tr>
                                <th>Full Name</th>
                                <th>Contact</th>
                                <th>District</th>
                                <th>Sub District</th>
                                <th>Postal Code</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($addresses as $address)
                                    <tr>
                                        <td>{{ $address->first_name }} {{ $address->last_name }}</td>
                                        <td>{{ $address->phone_number }}</td>
                                        <td>{{ $address->district }}</td>
                                        <td>{{ $address->sub_district }}</td>
                                        <td>{{ $address->postal_code }}</td>
                                        <td>{{ $address->address }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
