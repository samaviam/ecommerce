@extends('layouts.main')

@section('title', __('Empty cart'))

@section('content')
    <main id="main" class="empty-cart">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
            ]) !!}" page-name="{!! __('Cart') !!}" />
        </div>
        <div class="text-center">
            <svg>
                <use xlink:href="{{ asset('images/empty-cart.svg#empty-cart') }}"></use>
            </svg>
            <h3><strong>{{ __('Your Cart is Empty') }}</strong></h3>
            <h4>{{ __('Add something to make me happy :)') }}</h4>
            <a class="btn link-to-shop" href="{{ route('shop') }}">{{ __('Continue Shopping') }}<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
        </div>
    </main>
@endsection