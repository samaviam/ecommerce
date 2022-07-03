@extends('layouts.main')

@section('title', __('Wishlist'))

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
                route('dashboard') => __('Dashboard'),
              ]) !!}" page-name="{!! __('Wishlist') !!}" />
        </div>
    </div>
@endsection