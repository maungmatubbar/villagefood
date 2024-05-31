<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md-2 pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>

                    </div>
                    <div class="col-md-2 pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                class="icon-paper-plane"></span></div>
                        <span class="text">abdullahhalmanun@email.com</span>
                    </div>
                    <div class="col-md-8 pr-4 topper align-items-center text-lg-right di">
                        <select name="" id="" class="language_switcher">
                            <option>{{ Config::get('languages')[App::getLocale()] }}</option>
                            @foreach(Config::get('languages') as $lang => $language)
                                @if($lang !=App::getLocale())
                                    <option value="{{ $lang }}">
                                        <a href="#" class="dropdown-item">{{ $language }}</a>
                                    </option>
                                @endif
                            @endforeach
                        </select>
                        <a href="{{ route('seller.login') }}" class="text mx-2">{{ __('messages.seller') }}</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">{{ __('messages.Village Foods') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ request()->routeIs('home')?'bg-primary':'' }}"><a href="{{ route('home') }}"
                                                                                         class="nav-link">@lang(('messages.home'))</a>
                </li>
                <li class="nav-item {{ request()->routeIs('shop')?'bg-primary':'' }}"><a href="{{ route('shop') }}"
                                                                                         class="nav-link">@lang('messages.shop') </a>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="shop.html">Shop</a>
                        <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                        <a class="dropdown-item" href="product-single.html">Single Product</a>
                        <a class="dropdown-item" href="cart.html">Cart</a>
                        <a class="dropdown-item" href="checkout.html">Checkout</a>
                    </div>
                </li>--}}
                <li class="nav-item {{ request()->routeIs('about')?'bg-primary':'' }}"><a href="{{ route('about') }}"
                                                                                          class="nav-link">@lang('messages.about_us') </a>
                </li>
                <li class="nav-item {{ request()->routeIs('blog')?'bg-primary':'' }}"><a href="{{ route('blog') }}"
                                                                                         class="nav-link">@lang('messages.blog') </a>
                </li>
                <li class="nav-item {{ request()->routeIs('contact')?'bg-primary':'' }}"><a
                        href="{{ route('contact') }}" class="nav-link">@lang('messages.contact') </a></li>
                <li class="nav-item cta cta-colored"><a href="{{ route('cart') }}" class="nav-link"><span
                            class="icon-shopping_cart"></span>[<span id="cart_count">{{ Cart::count() }}</span>]</a>
                </li>

                @if(auth()->user())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-success" href="#" id="dropdown04" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="{{ route('customer.dashboard') }}">Dashboard</a>
                            <a href="#" class="dropdown-item text-warning"
                               onclick="event.preventDefault();document.getElementById('logoutForm').submit();">Logout</a>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('customer.login') }}"
                           class="nav-link text-success "><strong>@lang('messages.login')</strong></a>
                    </li>
                @endif


            </ul>
        </div>

    </div>
</nav>
<form action="{{ route('customer.logout') }}" id="logoutForm" method="post">@csrf</form></a>
@push('js')
    <script type="text/javascript">
        $('body').on('change', '.language_switcher', function (event) {
            event.preventDefault();
            var lang = $(this).val();
            var url = "{{ route('lang.switch',':lang') }}";
            url = url.replace(':lang', lang)
            $.ajax({
                url: url,
                type: 'GET',
                data: {
                    lang: lang
                },
                success: function (res) {
                    console.log(res)
                    window.location.reload()
                },
                error: function () {
                    window.location.reload()
                }
            });
        });
    </script>
@endpush
