@extends('layouts.main')

@section('title', __('Addresses'))

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
                route('dashboard') => __('Dashboard'),
              ]) !!}" page-name="{!! __('Addresses') !!}" />
            @if ($addresses->count())
                <div class="row">
                    @foreach ($addresses as $address)
                        <div class="col-lg-6">
                            <div class="card address-card">
                                <div class="card-header">{{ $address->name }}</div>
                                <div class="card-body">
                                    <table class="table address">
                                        <tbody>
                                            <tr>
                                                <th>{{ __('Firstname') }}</th>
                                                <td>{{ $address->firstname }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Lastname') }}</th>
                                                <td>{{ $address->lastname }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('City') }}</th>
                                                <td>{{ $address->city }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Address 1') }}</th>
                                                <td>{{ $address->address1 }}</td>
                                            </tr>
                                            <tr>
                                                <th>{{ __('Address 2') }}</th>
                                                <td>{{ $address->address2 }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer">
                                    <a href="{{ route('dashboard.addresses.destroy', $address) }}" class="btn btn-danger" onclick="(e => {e.preventDefault();$('#address-{{ $loop->iteration }}').submit()})(event)"><i class="fa fa-trash"></i> {{ __('Delete') }}</a>
                                    <a href="{{ route('dashboard.addresses.edit', $address) }}" class="btn btn-primary"><i class="fa fa-edit"></i> {{ __('Edit') }}</a>
                                    <form action="{{ route('dashboard.addresses.destroy', $address) }}" method="post" id="address-{{ $loop->iteration }}">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning">{{ __('You do not have an order address') }}</div>
            @endif
            <a href="{{ route('dashboard.addresses.create') }}" class="btn btn-primary btn-lg center-block">{{ __('Create a new address') }}</a>
        </div>
    </div>
@endsection