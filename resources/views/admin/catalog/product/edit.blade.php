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
    <form id="edit-product-form" class="wizard-form" action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="product-name">{{ __('Name *') }}</label>
          <input type="text" name="name" value="{{ $product->name }}" id="product-name" class="form-control required" placeholder="Product name" required="required" onkeyup="toSlug(this, '#product-slug')">
        </div>
        <div class="form-group">
          <label for="product-slug">{{ __('Slug *') }}</label>
          <input type="text" name="slug" value="{{ $product->slug }}" id="product-slug" class="form-control required" placeholder="Product slug" required="required">
        </div>
        <div class="form-group">
          <label for="categories">{{ __('Category') }}</label>
          <select name="category" id="categories" class="form-control form-select required" required=" required" aria-label=".form-select">
            @foreach ($categories as $category)
              <option value="{{ $category->id }}"{{ $product->category_id == $category->id ? ' selected="selected"' : '' }}>{{ $category->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="cover">{{ __('Cover image *') }}</label>
          <input
            type="file"
            name="cover"
            data-default-file="{{ asset('storage/images/p/' . $product->id . '/' . $product->cover) }}"
            id="cover"
            class="dropify">
          <small id="coverHelp" class="form-text text-muted">{{ __('') }}</small>
        </div>
        <div class="form-group">
          <label for="otherImg">{{ __('Other images') }}</label>
          <input type="file" name="images[]" id="otherImg" class="form-control" multiple />
          <small id="imagesHelp" class="form-text text-muted">{{ __('') }}</small>
        </div>
        @if (!empty($product->images))
          <div class="row">
            @foreach ($product->images as $image)
              <div class="col col-md-2">
                <img src="{{ asset('storage/images/p/' . $product->id . '/' . $image) }}" class="img-fluid">
              </div>
            @endforeach
          </div>
        @endif
        <div class="form-group">
          <label for="short-description">{{ __('Short description') }}</label>
          <textarea name="short-description" id="short-description">{{ $product->short_description }}</textarea>
        </div>
        <div class="form-group">
          <label for="description">{{ __('Description') }}</label>
          <textarea name="description" id="description">{{ $product->description }}</textarea>
        </div>
        <div class="form-check form-switch">
          <label for="active" class="form-check-label">{{ __('Active') }}</label>
          <input type="checkbox" name="active" class="form-check-input" role="switch" id="active"{{ $product->active ? ' checked="checked"' : '' }}>
        </div>
        <div class="form-group row">
          <div class="col">
            <label for="price">{{ __('Price') }}</label>
            <div class="input-group">
              <span class="input-group-text">{{ $currency->symbol }}</span>
              <input type="text" name="price" value="{{ $product->regular_price }}" id="price" class="form-control" />
            </div>
          </div>
          <div class="col">
            <label for="reference">{{ __('Reference') }}</label>
            <input type="text" name="reference" value="{{ $product->reference }}" id="reference" class="form-control" />
          </div>
          <div class="col">
            <label for="quantity">{{ __('Quantity') }}</label>
            <input type="text" name="quantity" value="{{ $product->quantity }}" id="quantity" class="form-control" />
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
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
      </div>
    </form>
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
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  <script src="{{ asset('admin/js/dropzone.js') }}"></script>
  <script src="{{ asset('admin/js/editor.js') }}"></script>
  <script src="{{ asset('admin/js/form-repeater.js') }}"></script>
@endsection