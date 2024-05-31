@extends('frontend.index')
@section('title')
    Shop
@endsection
@section('main_content')
    <div class="hero-wrap hero-bread" style="background-image: url('{{ asset('/') }}frontend/images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home</a></span> <span>Products</span></p>
                    <h1 class="mb-0 bread">Products</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            {{--<div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <li><a href="#" class="active">All</a></li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruits</a></li>
                        <li><a href="#">Juice</a></li>
                        <li><a href="#">Dried</a></li>
                    </ul>
                </div>
            </div>--}}
            <div class="row">
               @foreach($products as $product)
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{ route('product.details',['id'=>$product->id]) }}" class="img-prod"><img class="img-fluid" src="{{ asset($product->image) }}" alt="Colorlib Template">
{{--                            <span class="status">30%</span>--}}
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{ route('product.details',['id'=>$product->id]) }}">{{ $product->name }}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
{{--                                        <span class="mr-2 price-dc">$120.00</span>--}}
                                        <span class="price-sale">{{ $product->price??0 }} Tk.</span>
                                    </p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{ route('product.details',['id'=>$product->id]) }}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1" product_id="{{ $product->id }}">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
           {{-- <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div>--}}
        </div>
    </section>

@endsection
@push('js')
    <script type="text/javascript">
        $(document).ready(function (){
            $(document).on('click', '.buy-now',function (e) {
                e.preventDefault();
                var productId = $(this).attr('product_id');
                console.log(productId);
                $.ajax({
                    url:'{{ route('add.to.cart') }}',
                    method: "POST",
                    data:{
                        _token: '{{ csrf_token() }}',
                        product_id: productId
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
