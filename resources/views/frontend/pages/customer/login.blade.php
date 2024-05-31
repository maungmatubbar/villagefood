@extends('frontend.index')
@section('title')
    Login
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Customer Login</span></p>
                    <h1 class="mb-0 bread">Customer Login</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-5 d-block ftco-animate border p-2 justify-content-center"  >
                    <form action="{{ route('customer.login.store') }}" class="billing-form" method="post"> @csrf
                        <h3 class="mb-4 billing-heading text-center "><strong>CUSTOMER LOGIN</strong></h3>
                        <div class=" align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email"  id="email" name="email" class="form-control" placeholder="Enter your email">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <a href="{{ route('customer.register') }}">Create an Account?</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
            </div>
        </div>
    </section> <!-- .section -->
@endsection
