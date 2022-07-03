@extends('layouts.main')

@section('title', __('Dashboard'))

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
  <div class="content">
    <div class="container">
      <x-breadcrumb previous-pages="{!! json_encode([
        route('home') => __('Home'),
      ]) !!}" page-name="{!! __('Dashboard') !!}" />
      @include('customer.partials.summary')
      <div class="row">
        <div class="col-md-3 col-sm-6">
          <a href="{{ route('dashboard.order-history') }}" class="account-links">{{ __('Order history') }}</a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="{{ route('dashboard.addresses.index') }}" class="account-links">{{ __('Addresses') }}</a>
        </div>
        <div class="col-md-3 col-sm-6">
          <a href="{{ route('dashboard.wishlist') }}" class="account-links">{{ __('Wishlist') }}</a>
        </div>
        @can('hired')
          <div class="col-md-3 col-sm-6">
            <a href="{{ route('admin') }}" class="account-links">{{ __('Professional (:rank)', ['rank' => auth()->user()->rank->name]) }}</a>
          </div>
        @endcan
      </div>
    </div>
  </div>
@endsection