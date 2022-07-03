@extends('admin.layouts.main')

@section('title', __('New product'))

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
    <div class="card-body">
      <form id="create-product-form" class="wizard-form" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <h3>{{ __('Basic settings') }}</h3>
          <section>
            <h3>{{ __('Basic settings') }}</h3>
            <div class="form-group">
              <label for="product-name">{{ __('Name *') }}</label>
              <input type="text" name="name" value="{{ old('name') }}" id="product-name" class="form-control required" placeholder="Product name" required="required" onkeyup="toSlug(this, '#product-slug')">
            </div>
            <div class="form-group">
              <label for="product-slug">{{ __('Slug *') }}</label>
              <input type="text" name="slug" value="{{ old('slug') }}" id="product-slug" class="form-control required" placeholder="product-name" required="required">
            </div>
            <div class="form-group">
              <label for="categories">{{ __('Category') }}</label>
              <select name="category" id="categories" class="form-control form-select required" required=" required" aria-label=".form-select">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="cover">{{ __('Cover image *') }}</label>
              <input type="file" name="cover" value="{{ old('cover') }}" id="cover" class="dropify required" required="required">
              <small id="coverHelp" class="form-text text-muted">{{ __('') }}</small>
            </div>
            <div class="form-group">
              <label for="otherImg">{{ __('Other images') }}</label>
              <input type="file" name="images[]" value="{{ old('images') }}" id="otherImg" class="form-control" multiple />
              <small id="imagesHelp" class="form-text text-muted">{{ __('') }}</small>
            </div>
          </section>
          <h3>{{ __('Descriptions') }}</h3>
          <section>
            <h3>{{ __('Descriptions') }}</h3>
            <div class="form-group">
              <label for="short-description">{{ __('Short description') }}</label>
              <textarea name="short-description" value="{{ old('short-description') }}" id="short-description"></textarea>
            </div>
            <div class="form-group">
              <label for="description">{{ __('Description') }}</label>
              <textarea name="description" value="{{ old('description') }}" id="description"></textarea>
            </div>
          </section>
          <h3>{{ __('Other settings') }}</h3>
          <section>
            <h3>{{ __('Other settings') }}</h3>
            <div class="form-check form-switch">
              <label for="active" class="form-check-label">{{ __('Active') }}</label>
              <input type="checkbox" name="active" value="{{ old('active') }}" class="form-check-input" role="switch" id="active">
            </div>
            <div class="form-group row">
              <div class="col">
                <label for="price">{{ __('Price') }}</label>
                <div class="input-group">
                  <span class="input-group-text">{{ $currency->symbol }}</span>
                  <input type="text" name="price" value="{{ old('price') }}" id="price" class="form-control" />
                </div>
              </div>
              <div class="col">
                <label for="reference">{{ __('Reference') }}</label>
                <input type="text" name="reference" value="{{ old('reference') }}" id="reference" class="form-control" />
              </div>
              <div class="col">
                <label for="quantity">{{ __('Quantity') }}</label>
                <input type="text" name="quantity" value="{{ old('quantity') }}" id="quantity" class="form-control" />
              </div>
            </div>
            <div class="form-group">
              <label>{{ __('Related products') }}</label>
              <div class="repeater">
                <div data-repeater-list="related-products">
                  <div class="input-group mb-1" data-repeater-item>
                    <input type="text" name="product-name" class="form-control" placeholder="{{ __('Add related product') }}" />
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
  <script src="{{ asset('admin/vendors/dropzone/dropzone.js') }}"></script>
  <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script>
@endsection

@section('script')
  <script src="{{ asset('admin/js/wizard.js') }}"></script>
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script src="{{ asset('admin/js/dropzone.js') }}"></script>
  <script src="{{ asset('admin/js/editor.js') }}"></script>
  <script src="{{ asset('admin/js/form-repeater.js') }}"></script>
@endsection