@extends('frontend.index')
@section('title')
    Create Account
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Seller Register</span></p>
                    <h1 class="mb-0 bread">Create Account</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="{{ route('customer.register.store') }}" class="billing-form" method="post"> @csrf
                        <h3 class="mb-4 billing-heading"> Create Account</h3>
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Name*</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address*</label>
                                    <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Phone Number*</label>
                                    <input type="text" name="phone_number" class="form-control" id="email" placeholder="Enter phone number">
                                </div>
                                @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password">
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password*</label>
                                    <input type="password" name="confirm_password" class="form-control" placeholder="Enter confirm password">
                                    @error('confirm_password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-outline-success">Create</button>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                <div class="form-group mt-4">
                                    <div class="radio">
                                        <a class="mr-3" href="{{ route('customer.login') }}">Have an account?</a>
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
