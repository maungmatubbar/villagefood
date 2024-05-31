@extends('frontend.index')
@section('title')
    Complete Order
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Complete Order</span></p>
                    <h1 class="mb-0 bread">Complete Order</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 d-block ftco-animate border p-2 justify-content-center"  >
                    <h3 class="mb-4 billing-heading text-center "><strong>THANKS FOR ORDERS COMPLETED</strong></h3>
                    <p class="ftco-animate text-center">Your invoice no is {{ $invoice->invoice_no }}</p>
                    <div class="d-flex items-center justify-content-between p-4">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
                        <a href="{{ route('home') }}" class="btn btn-primary">Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
