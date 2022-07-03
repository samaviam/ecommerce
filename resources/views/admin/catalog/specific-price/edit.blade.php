@extends('admin.layouts.main')

@section('title', __('Edit specific price'))

@section('plugin-style')
  <link rel="stylesheet" href="{{ asset('admin/vendors/dropify/dropify.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('admin/vendors/dropzone/dropzone.css') }}" />
@endsection

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
    <form id="edit-specific-price-form" action="{{ route('admin.specific-price.update', $specificPrice) }}" method="POST">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div>
          <h3>{{ __('Specific price') }}</h3>
          <section>
            <div class="form-group">
              <label for="user-id">{{ __('User id') }}</label>
              <input type="text" name="user_id" value="{{ $specificPrice->user_id }}" id="user-id" class="form-control" placeholder="User ID">
              <small class="form-text">{{ __('If the field is left blank, it will be considered for all customers.') }}</small>
            </div>
            <div class="form-group">
              <label for="product-id">{{ __('Product id') }}</label>
              <input type="text" name="product_id" value="{{ $specificPrice->product_id }}" id="product-id" class="form-control required" placeholder="Product ID" required="required">
            </div>
            <div class="form-group">
              <label for="from">{{ __('From') }}</label>
              <div class="input-group date datepicker navbar-date-picker input-daterange">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" name="from" value="{{ $specificPrice->from }}" id="from" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="to">{{ __('To') }}</label>
              <div class="input-group date datepicker navbar-date-picker input-daterange">
                <span class="input-group-addon input-group-prepend border-right">
                  <span class="icon-calendar input-group-text calendar-icon"></span>
                </span>
                <input type="text" name="to" value="{{ $specificPrice->to }}" id="to" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label for="start-from">{{ __('Start from') }}</label>
              <input type="text" name="start_from" value="{{ $specificPrice->start_from }}" id="start-from" class="form-control required" placeholder="Start from" required="required">
            </div>
            <div class="row">
              <div class="col-xl-3 col-lg-4">
                <fieldset class="form-group">
                  <label>{{ __('Apply a discount from') }}</label>
                  <input type="text" id="reduction" name="reduction" class="form-control" value="{{ $specificPrice->reduction }}">
                </fieldset>
              </div>
              <div class="col-xl-3 col-lg-3">
                <fieldset class="form-group">
                  <label>&nbsp;</label>
                  <select id="reduction_type" name="reduction_type" class="form-control form-select">
                    <option value="percentage"{{ $specificPrice->reduction_type == 'percentage' ? ' select="select"' : '' }}>{{ __('Percentage') }}</option>
                    @foreach ($currencies as $currency)
                      <option value="{{ $currency->id }}"{{ $specificPrice->reduction_type == $currency->id ? ' select="select"' : '' }}>{{ $currency->name }} ({{ $currency->code }})</option>
                    @endforeach
                  </select>
                </fieldset>
              </div>
              <div class="col-xl-3 col-lg-3">
                <fieldset class="form-group">
                  <label>&nbsp;</label>
                  <select id="reduction_tax" name="reduction_tax" class="form-control form-select">
                    <option value="0">بدون مالیات</option>
                    <option value="1" selected="selected">با مالیات</option>
                  </select>
                </fieldset>
              </div>
            </div>
            <div class="form-check form-switch">
              <label for="active" class="form-check-label">{{ __('Active') }}</label>
              <input type="checkbox" name="active" value="{{ old('active') }}" class="form-check-input" role="switch" id="active" checked>
            </div>
          </section>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.specific-price.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
      </div>
    </form>
  </div>
@endsection

@section('plugin-script')
  <script src="{{ asset('admin/vendors/jquery-steps/jquery.steps.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
  {{-- <script src="{{ asset('admin/vendors/dropify/dropify.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('admin/vendors/dropzone/dropzone.js') }}"></script> --}}
  <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script>
@endsection

@section('script')
  <script src="{{ asset('admin/js/formpickers.js') }}"></script>
  <script src="{{ asset('admin/js/wizard.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/dropify.js') }}"></script> --}}
  {{-- <script src="{{ asset('admin/js/dropzone.js') }}"></script> --}}
  <script src="{{ asset('admin/js/editor.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/form-repeater.js') }}"></script> --}}
@endsection