@extends('frontend.index')
@section('title')
    Checkout
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <form action="{{ route('place.order') }}" method="post"> @csrf
            <div class="row justify-content-center">

                    <div class="col-xl-7 ftco-animate">
                        <div class="billing-form">
                            <h3 class="mb-4 billing-heading">Shipping Details</h3>
                            <div class="row align-items-end">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="first_name" id="firstname" class="form-control" placeholder="Enter first name">
                                        @error('first_name')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="last_name" id="lastname" class="form-control" placeholder="Enter last name" >
                                        @error('last_name')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone_number" id="number" class="form-control" placeholder="Enter your phone number" >
                                        @error('phone_number')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="towncity">Sub District/ City</label>
                                        <input type="text" id="towncity" name="sub_district" class="form-control" placeholder="Enter sub-district/City" >
                                        @error('sub_district')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="district">District</label>
                                        <input type="text" id="district" name="district" class="form-control" placeholder="Enter district" >
                                        @error('district')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="postcodezip">Postcode / ZIP</label>
                                        <input type="text" id="postcodezip" name="postal_code" class="form-control" placeholder="Enter postal code">
                                    </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="streetaddress">Street Address</label>
                                        <input type="text" name="address" id="streetaddress" class="form-control" placeholder="House number and street name">
                                        @error('address')
                                        <span class="text-warning">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div><!-- END -->
                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex total-price">
                                        <span>Delivery Charge</span>
                                        <span>50.00 .tk</span>
                                    </p>
                                    <p class="d-flex total-price">
                                        <span>Sub Total</span>
                                        <span>{{ $subtotal = Cart::subTotal() }} .tk</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total</span>
                                        <span> {{ $subtotal + 50 }} .tk</span>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" class="mr-2" value="online">Online Payment</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label><input type="radio" name="payment_method" class="mr-2" value="cod"> Cash On Delivery</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('payment_method')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox"  value="" class="mr-2 terms"> I have read and accept the terms and conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                    <p><button class="btn btn-primary py-3 px-4" id="place_btn">Place an order</button></p>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-md-8 -->

            </div>
            </form>
        </div>
    </section> <!-- .section -->

    <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
        <div class="container py-4">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-6">
                    <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                    <span>Get e-mail updates about our latest shops and special offers</span>
                </div>
                <div class="col-md-6 d-flex align-items-center">
                    <form action="#" class="subscribe-form">
                        <div class="form-group d-flex">
                            <input type="text" class="form-control" placeholder="Enter email address">
                            <input type="submit" value="Subscribe" class="submit px-3">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#place_btn').attr('disabled')
            $(document).on('change','.terms',function (){
                var termsVal = $(this).val();
                if(termsVal){
                    $('#place_btn').removeAttr('disabled')
                }
            })
        })
    </script>
@endpush
