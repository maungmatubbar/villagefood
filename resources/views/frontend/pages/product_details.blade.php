@extends('frontend.index')
@section('title')
    Product Details
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">{{ __('messages.home') }}</a></span>/
                        <span class="mr-2"><a href="{{ route('shop') }}">{{ __('messages.shop') }}</a></span>/
                        <span>{{ __('messages.Product Details') }}</span></p>
                    <h1 class="mb-0 bread">{{ __('messages.Product Details') }}</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="{{ asset('/') }}frontend/images/product-1.jpg" class="image-popup">
                        <img src="{{ asset($product->image) }}" class="img-fluid" alt=""></a>
                </div>
                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <h3>{{ $product->name }}</h3>
                    <div class="rating d-flex">
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2">5.0</a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                            <a href="#"><span class="ion-ios-star-outline"></span></a>
                        </p>
                        <p class="text-left mr-4">
                            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                        </p>
                        <p class="text-left">
                            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                        </p>
                    </div>
                    <p class="price "><span>{{ $product->price }} .Tk</span></p>
                    <p>Description: {{ $product->description }}
                    </p>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            {{--<div class="form-group d-flex">
                                <div class="select-wrap">
                                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                    <select name="" id="" class="form-control">
                                        <option value="">Small</option>
                                        <option value="">Medium</option>
                                        <option value="">Large</option>
                                        <option value="">Extra Large</option>
                                    </select>
                                </div>
                            </div>--}}
                        </div>
                        <div class="w-100"></div>
                        <div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
{{--	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">--}}
{{--	                   <i class="ion-ios-remove"></i>--}}
{{--	                	</button>--}}
	            		</span>
                            <input type="number" id="quantity" name="quantity" class="form-control input-number quantity" value="1" min="1" max="100">
                            <span class="input-group-btn ml-2">
{{--	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">--}}
{{--	                     <i class="ion-ios-add"></i>--}}
{{--	                 </button>--}}
	             	</span>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <p style="color: #000;">Weight: {{ $product->weight }} {{ $product->weight_type }}</p>
                        </div>
                    </div>
                    <p><a href="" class="btn btn-black py-3 px-5 add-to-cart" product_id="{{ $product->id }}">Add to Cart</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Products</span>
                    <h2 class="mb-4">{{ __('messages.Related Products') }}</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($related_products as $product)
                    <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ route('product.details',['id'=>$product->id]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->image) }}" alt="Colorlib Template">
                            <span class="status">30%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{ route('product.details',['id'=>$product->id]) }}">{{ $product->name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="price-sale">{{ $product->price }} .tk</span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{ route('product.details',['id'=>$product->id]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="add-to-cart d-flex justify-content-center align-items-center mx-1" product_id="{{ $product->id }}">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
    <script type="text/javascript">
        $(document).ready(function (){
            $(document).on('click', '.add-to-cart',function (e) {
                e.preventDefault();
                var productId = $(this).attr('product_id');
                var qty = $('.quantity').val()
                console.log(productId);
                $.ajax({
                    url:'{{ route('add.to.cart') }}',
                    method: "POST",
                    data:{
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        qty:qty
                    },
                    success: function (resp) {
                        if(resp?.success)
                        {
                            toastr['success']("The product has added to the cart.", 'Success!', {
                                closeButton: true,
                                tapToDismiss: false,
                                showMethod: 'slideDown',
                                hideMethod: 'slideUp',
                            });
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

