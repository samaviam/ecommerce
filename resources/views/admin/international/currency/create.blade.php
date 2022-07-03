@extends('admin.layouts.main')

@section('title', __('Add currency'))

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
    <form id="create-currency-form" action="{{ route('admin.currency.store') }}" method="POST">
      <div class="card-body">
        @csrf
        <div class="form-group">
          <label for="currency">{{ __('Choose a currency *') }}</label>
          <select name="currency" id="currency" class="form-control form-select">
            <option value="0">{{ __('--') }}</option>
            @foreach ($currencies as $code => $name)
              <option value="{{ $code }}">{{ $name }} ({{ $code }})</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="custom">{{ __('Or create an alternative currency') }}</label>
          <input type="checkbox" name="custom" id="custom" class="form-check-input"{{ old('custom') ? ' checked' : '' }}>
        </div>
        <div class="form-group">
          <label for="name">{{ __('Currency name *') }}</label>
          <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control required" placeholder="currency name" required="required" onkeyup="toSlug(this, '#product-slug')">
        </div>
        <div class="form-group">
          <label for="code">{{ __('ISO code *') }}</label>
          <input type="text" name="code" value="{{ old('code') }}" id="code" class="form-control required" placeholder="Currency iso code" required="required">
        </div>
        <div class="form-group">
          <label for="symbol">{{ __('Symbol *') }}</label>
          <input type="text" name="symbol" value="{{ old('symbol') }}" id="symbol" class="form-control required" placeholder="Currency symbol" required="required">
        </div>
        <div class="form-group">
          <label for="format">{{ __('Format *') }}</label>
          <input type="text" name="format" value="{{ old('format') }}" id="format" class="form-control required" placeholder="Format" required="required">
        </div>
        <div class="form-group">
          <label for="exchange_rate">{{ __('Exchange rate *') }}</label>
          <input type="text" name="exchange_rate" value="{{ old('exchange_rate', 1) }}" id="exchange_rate" class="form-control required" placeholder="Currency exchange rate" required="required">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.currency.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
      </div>
    </form>
  </div>
@endsection

@section('script')
  <script>
    function currency() {
      if ($('#custom').is(':checked')) {
        $('#name, #code, #symbol, #format').prop('disabled', false);
        $('#currency').prop('disabled', true);
      } else {
        $('#name, #code, #symbol, #format').prop('disabled', true);
        $('#currency').prop('disabled', false);
      }
    }

    $('#custom').change(function() {
      currency();
    });

    $('#currency').change(function() {
      $.ajax({
        url: '{{ route('admin.currency.get') }}',
        type: 'POST',
        data: { 'code': $(this).val() },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        success: function(data) {
          $('#name').val(data.name);
          $('#code').val(data.code);
          $('#symbol').val(data.symbol);
          $('#format').val(data.format);
        }
      });
    });
    currency();
  </script>
@endsection