@extends('admin.layouts.main')

@section('title', __('Edit currency'))

@section('content')
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
    <form id="create-currency-form" action="{{ route('admin.currency.update', $currency) }}" method="POST">
      @method('PUT')
      @csrf
      <input type="hidden" name="custom" value="1">
      <div class="card-body">
        <div class="form-group">
          <label for="name">{{ __('Currency name *') }}</label>
          <input type="text" name="name" value="{{ $currency->name }}" id="name" class="form-control required" placeholder="currency name" required="required" onkeyup="toSlug(this, '#product-slug')">
        </div>
        <div class="form-group">
          <label for="code">{{ __('ISO code *') }}</label>
          <input type="text" name="code" value="{{ $currency->code }}" id="code" class="form-control required" placeholder="Currency iso code" required="required">
        </div>
        <div class="form-group">
          <label for="symbol">{{ __('Symbol *') }}</label>
          <input type="text" name="symbol" value="{{ $currency->symbol }}" id="symbol" class="form-control required" placeholder="Currency symbol" required="required">
        </div>
        <div class="form-group">
          <label for="format">{{ __('Format *') }}</label>
          <input type="text" name="format" value="{{ $currency->format }}" id="format" class="form-control required" placeholder="Format" required="required">
        </div>
        <div class="form-group">
          <label for="exchange_rate">{{ __('Exchange rate *') }}</label>
          <input type="text" name="exchange_rate" value="{{ $currency->exchange_rate }}" id="exchange_rate" class="form-control required" placeholder="Currency exchange rate" required="required">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.currency.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
      </div>
    </form>
  </div>
@endsection