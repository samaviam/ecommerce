@extends('admin.layouts.main')

@section('title', __('Add currency'))

@section('content')
  @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
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
    <form id="localization-form" action="{{ route('admin.localization.store') }}" method="POST">
      <div class="card-body">
        @csrf
        <input type="hidden" name="auto_convert_price" id="auto_convert_price">
        <div class="form-group">
          <label for="default_language">{{ __('Choose a language *') }}</label>
          <select name="default_language" id="default_language" class="form-control form-select">
            @foreach ($languages as $language)
              <option value="{{ $language->id }}"{{ $language->id == configuration('default_language') ? ' selected="selected"' : '' }}>{{ $language->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="default_currency">{{ __('Choose a currency *') }}</label>
          <select name="default_currency" id="default_currency" class="form-control form-select">
            @foreach ($currencies as $currency)
              <option value="{{ $currency->code }}"{{ $currency->code == configuration('default_currency') ? ' selected="selected"' : '' }}>{{ $currency->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script>
    $('#default_currency').change(function() {
      if (confirm('{{ __('Before changing the default currency, we strongly recommend that you enable the repair mode. In fact, after each change in the default currency, the price of each product must be adjusted manually or automatically. Do you want to be corrected automatically?') }}')) {
        $('#auto_convert_price').val('1');
      } else {
        $('#auto_convert_price').val('');
      }
    })
  </script>
@endsection