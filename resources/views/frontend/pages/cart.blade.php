@extends('frontend.index')
@section('title')
    Cart
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span>
                        <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($cart as $cartItem)
                                <tr class="text-center cart_item_{{ $cartItem->rowId }}" id="cart_item_{{ $cartItem->rowId }}">
                                    <td class="product-remove"><a href="#" onclick="confirm('Are sure remove this item?')" class="close_cart_item"
                                                                  cart_item_id="{{ $cartItem->rowId }}" ><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img"
                                             style="background-image:url({{ asset($cartItem->options?->image) }});"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3>{{ $cartItem->name  }}</h3>
                                        <p>Weight: {{ $cartItem->weight }} {{ $cartItem->options?->weight_type }}</p>
                                    </td>

                                    <td class="price">{{ $cartItem->price }} .tk</td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="number" id="quantity" name="quantity"
                                                   class="quantity form-control input-number"
                                                   cart_item_id="{{ $cartItem->rowId }}" value="{{ $cartItem->qty }}"
                                                   min="1" max="20">
                                        </div>
                                    </td>

                                    <td class="cart-item-total"
                                        id="cart_subtotal_item_{{ $cartItem->rowId }}">{{ $cartItem->subtotal }} .tk
                                    </td>
                                </tr><!-- END TR-->
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    {{--<div class="cart-total mb-3">
                        <h3>Coupon Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Coupon code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>--}}
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    {{--<div class="cart-total mb-3">
                        <h3>Estimate shipping and tax</h3>
                        <p>Enter your destination to get a shipping estimate</p>
                        <form action="#" class="info">
                            <div class="form-group">
                                <label for="">Country</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">State/Province</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="country">Zip/Postal Code</label>
                                <input type="text" class="form-control text-left px-3" placeholder="">
                            </div>
                        </form>
                    </div>
                    <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>--}}
                </div>
                <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                    <div class="cart-total mb-3">
                        <h3>Cart Totals</h3>
                      {{--  <p class="d-flex">
                            <span>Subtotal</span>
                            <span class="cart_sub_total">{{ Cart::priceTotal() }} .tk</span>
                        </p>
                        <p class="d-flex">
                            <span>Discount</span>
                            <span>0.00 .tk</span>
                        </p>
                        <hr>--}}
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span class="cart_sub_total">{{ Cart::priceTotal() }} .tk</span>
                        </p>
                    </div>
                    <p><a href="{{ route('customer.checkout') }}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                </div>
            </div>
        </div>
    </section>

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
        $(document).ready(function () {
            // Update Cart
            $(document).on('change', '#quantity', function () {
                var rowId = $(this).attr('cart_item_id');
                var qty = $(this).val();
                $.ajax({
                    url:'{{ route('cart.update.qty') }}',
                    method: "POST",
                    data:{
                        _token: '{{ csrf_token() }}',
                        rowId: rowId,
                        qty: qty,
                    },
                    success: function (resp) {
                        console.log(resp)
                        if(resp?.success)
                        {
                            toastr['success']("Cart updated successfully.", 'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                showMethod: 'slideDown',
                                hideMethod: 'slideUp',
                            });
                            $('#cart_subtotal_item_'+rowId).html(resp?.cart_item_sub_total+' .tk');
                            $('.cart_sub_total').html(resp?.cart_sub_total+' .tk');
                            $("#cart_count").html(`${resp?.cart_count}`)
                        }

                    },
                    error: function (res) {
                        alert('Problem');
                    }
                })
            });
            // Remove Cart Item
            $(document).on('click', '.close_cart_item', function () {
                var rowId = $(this).attr('cart_item_id');
                $.ajax({
                    url:'{{ route('cart.remove.item') }}',
                    method: "POST",
                    data:{
                        _token: '{{ csrf_token() }}',
                        rowId: rowId,
                    },
                    success: function (resp) {
                        console.log(resp)
                        if(resp?.success)
                        {
                            toastr['success']("Cart item remove successfully.", 'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                showMethod: 'slideDown',
                                hideMethod: 'slideUp',
                            });
                            $('#cart_item_'+rowId).remove('#cart_item_'+rowId);
                            $('.cart_sub_total').html(resp?.cart_sub_total+' .tk');
                            $("#cart_count").html(`${resp?.cart_count}`)
                        }

                    },
                    error: function (res) {
                        alert('Problem');
                    }
                })
            });
        })
    </script>
@endpush
