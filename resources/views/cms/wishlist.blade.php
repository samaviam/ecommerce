@extends('layouts.main')

@section('title', __('Wishlist'))

@section('content')
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
            ]) !!}" page-name="{!! __('Wishlist') !!}" />
            <div class="banner-shop">
                <a href="#" class="banner-link">
                    <figure><img src="{{ asset('images/shop-banner.webp') }}" alt=""></figure>
                </a>
            </div>
            <div class="row">
                <ul class="product-list equal-container">
                    @foreach ($products as $product)
                        <li class="col-lg-3 col-sm-4 col-xs-6">
                            @include('catalog.product-block', compact('product'))
                        </li>
                    @endforeach
                    {{-- <li class="col-lg-3 col-sm-4 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product', ['category' => 'b', 'slug' => 'a']) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('images/products/digital_20.webp') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-sm-4 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product', ['category' => 'b', 'slug' => 'a']) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('images/products/digital_22.webp') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-sm-4 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product', ['category' => 'b', 'slug' => 'a']) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('images/products/digital_10.webp') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-sm-4 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product', ['category' => 'b', 'slug' => 'a']) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('images/products/digital_01.webp') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-3 col-sm-4 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{ route('product', ['category' => 'b', 'slug' => 'a']) }}" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('images/products/digital_21.webp') }}" alt="T-Shirt Raw Hem Organic Boro Constrast Denim"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                                <a href="#" class="btn add-to-cart">Add To Cart</a>
                            </div>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </div>
    </main>
@endsection