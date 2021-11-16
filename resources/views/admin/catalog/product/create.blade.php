@extends('admin.layouts.main')

@section('title', __('New product'))

@section('plugin-style')
  <link rel="stylesheet" href="{{ asset('admin/vendors/dropify/dropify.min.css') }}" />
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <form id="create-product-form" action="{{ route('admin.products.store') }}" method="POST">
        <div>
          <h3>{{ __('Basic settings') }}</h3>
          <section>
            <h3>{{ __('Basic settings') }}</h3>
            <div class="form-group">
              <label>{{ __('Name *') }}</label>
              <input type="text" name="name" id="product-name" class="form-control required" placeholder="Product name" required="required" onkeyup="toSlug(this, '#product-slug')">
            </div>
            <div class="form-group">
              <label>{{ __('Slug *') }}</label>
              <input type="text" name="slug" id="product-slug" class="form-control required" placeholder="product-name" required="required">
            </div>
            <div class="form-group">
              <label>{{ __('Cover image *') }}</label>
              <input type="file" name="cover" class="dropify required" required="required">
              <small id="coverHelp" class="form-text text-muted">{{ __('') }}</small>
            </div>
            <div class="form-group">
              <label>{{ __('Other images') }}</label>
              <input type="file" name="images" class="dropify">
              <small id="imagesHelp" class="form-text text-muted">{{ __('') }}</small>
            </div>
          </section>
          <h3>{{ __('Descriptions') }}</h3>
          <section>
            <h3>{{ __('Descriptions') }}</h3>
            <div class="form-group">
              <label>{{ __('Short description') }}</label>
              <textarea name="short-description" id="short-description"></textarea>
            </div>
            <div class="form-group">
              <label>{{ __('Description') }}</label>
              <textarea name="description" id="description"></textarea>
            </div>
          </section>
          <h3>{{ __('Category') }}</h3>
          <section>
            <h3>{{ __('Category') }}</h3>
            <div class="form-group">
              <label>{{ __('Category') }}</label>
              <select class="form-select form-select-sm" aria-label=".form-select-sm">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
          </section>
          <h3>{{ __('Other settings') }}</h3>
          <section>
            <h3>{{ __('Other settings') }}</h3>
            <div class="form-group row">
              <div class="col">
                <label>{{ __('Price') }}</label>
                <input type="text" name="price" class="form-control" data-inputmask="'alias': 'currency'" im-insert="true">
              </div>
              <div class="col">
                <label>{{ __('Reference') }}</label>
                <input type="text" name="reference" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label>{{ __('Related products') }}</label>
              <div class="repeater">
                <div data-repeater-list="related-products">
                  <div class="input-group mb-1" data-repeater-item>
                    <input type="text" name="text-input" class="form-control" placeholder="{{ __('Add related product') }}" />
                    <button type="button" class="btn btn-outline-danger" data-repeater-delete>{{ __('Delete') }}</button>
                  </div>
                </div>
                <button type="button" class="btn btn-primary" data-repeater-create>{{ __('Add') }}</button>
              </div>
            </div>
          </section>
        </div>
      </form>
    </div>
  </div>
@endsection

@section('plugin-script')
  <script src="{{ asset('admin/vendors/jquery-steps/jquery.steps.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/dropify/dropify.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/inputmask/jquery.inputmask.bundle.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script>
@endsection

@section('script')
  <script src="{{ asset('admin/js/wizard.js') }}"></script>
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script src="{{ asset('admin/js/editor.js') }}"></script>
  <script src="{{ asset('admin/js/inputmask.js') }}"></script>
  <script src="{{ asset('admin/js/form-repeater.js') }}"></script>
@endsection