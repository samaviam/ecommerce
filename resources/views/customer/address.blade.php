@extends('layouts.main')

@section('title', (isset($address->name) ? __('Edit ":name" address', ['name' => $address->name]) : __('Create new address')))

@section('style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}" />
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
                route('dashboard') => __('Dashboard'),
              ]) !!}" page-name="{!! (isset($address) ? __('Edit address') : __('Create address')) !!}" />
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled m-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ (isset($address) ? __('Edit ":name" address', ['name' => $address->name]) : __('Create new address')) }}</div>
                <form action="{{ (isset($address) ? route('dashboard.addresses.update', $address) : route('dashboard.addresses.store')) }}" method="post" class="form-horizontal">
                    @csrf
                    @isset($address)
                        @method('PUT')
                    @endisset
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">{{ __('Name') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" id="name" class="form-control" value="{{ $address->name ?? old('name') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">{{ __('Firstname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="firstname" id="firstname" class="form-control" value="{{ $address->firstname ?? old('firstname') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">{{ __('Lastname') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="lastname" id="lastname" class="form-control" value="{{ $address->lastname ?? old('lastname') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-sm-2 control-label">{{ __('Company') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="company" id="company" class="form-control" value="{{ $address->company ?? old('company') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address1" class="col-sm-2 control-label">{{ __('Address 1') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="address1" id="address1" class="form-control" value="{{ $address->address1 ?? old('address1') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address2" class="col-sm-2 control-label">{{ __('Address 2') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="address2" id="address2" class="form-control" value="{{ $address->address2 ?? old('address2') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="postcode" class="col-sm-2 control-label">{{ __('Postcode') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="postcode" id="postcode" class="form-control" value="{{ $address->postcode ?? old('postcode') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-2 control-label">{{ __('City') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" id="city" class="form-control" value="{{ $address->city ?? old('city') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="state" class="col-sm-2 control-label">{{ __('State') }}</label>
                            <div class="col-sm-10">
                                <select name="state" class="form-control except-chosen">
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ (isset($address) && $state->id == $address->state_id) ? 'selected=selected' : '' }}
                                        >{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">{{ __('Phone') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $address->phone ?? old('phone') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_mobile" class="col-sm-2 control-label">{{ __('Phone mobile') }}</label>
                            <div class="col-sm-10">
                                <input type="text" name="phone_mobile" id="phone_mobile" class="form-control" value="{{ $address->phone_mobile ?? old('phone_mobile') }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary"><i class="fa fa-floppy-o"></i> {{ __('Save') }}</button>
                        <a href="{{ route('dashboard.addresses.index') }}" class="btn btn-danger pull-right"><i class="fa fa-chevron-left"></i> {{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection