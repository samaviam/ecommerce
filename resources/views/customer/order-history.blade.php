@extends('layouts.main')

@section('title', __('Order history'))

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
                route('dashboard') => __('Dashboard'),
              ]) !!}" page-name="{!! __('Order history') !!}" />
            @include('customer.partials.summary')
        </div>
    </div>
@endsection