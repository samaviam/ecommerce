@extends('admin.layouts.main')

@section('title', __('New brand'))

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
      <form id="create-brand-form" class="wizard-form" action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
          <h3>{{ __('Content') }}</h3>
          <section>
            <div class="form-group">
              <label for="brand-name">{{ __('Name *') }}</label>
              <input type="text" name="name" value="{{ old('name') }}" id="brand-name" class="form-control required" placeholder="Brand name" required="required" onkeyup="toSlug(this, '#brand-slug')">
            </div>
            <div class="form-group">
              <label for="short-description">{{ __('Short description') }}</label>
              <textarea name="short-description" id="short-description">{{ old('short-description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="description">{{ __('Description') }}</label>
              <textarea name="description" id="description">{{ old('description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="logo">{{ __('Logo') }}</label>
              <input type="file" name="logo" value="{{ old('logo') }}" id="logo" class="dropify">
              {{-- <small id="logoHelp" class="form-text text-muted">{{ __('') }}</small> --}}
            </div>
            <div class="form-check form-switch">
              <label for="active" class="form-check-label">{{ __('Active') }}</label>
              <input type="checkbox" name="active" value="{{ old('active') }}" class="form-check-input" role="switch" id="active" checked>
            </div>
          </section>
          <h3>{{ __('Seo') }}</h3>
          <section>
            <div class="form-group">
              <label for="meta-title">{{ __('Meta title') }}</label>
              <input type="text" name="meta-title" value="{{ old('meta-title') }}" id="meta-title" class="form-control" placeholder="{{ __('To have a different meta title with the brand name, enter it here.') }}">
            </div>
            <div class="form-group">
              <label for="meta-keywords">{{ __('Meta keywords') }}</label>
              <input type="text" name="meta-keywords" value="{{ old('meta-keywords') }}" id="meta-keywords" class="form-control" placeholder="Meta keywords">
            </div>
            <div class="form-group">
              <label for="meta-description">{{ __('Meta description') }}</label>
              <textarea name="meta-description" id="meta-description" class="form-control" placeholder="{{ __('To have a different meta description with the brand description, enter it here.') }}" rows="5">{{ old('meta-description') }}</textarea>
            </div>
            <div class="form-group">
              <label for="brand-slug">{{ __('Slug *') }}</label>
              <input type="text" name="slug" value="{{ old('slug') }}" id="brand-slug" class="form-control required" placeholder="brand-name" required="required">
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
  {{-- <script src="{{ asset('admin/vendors/dropzone/dropzone.js') }}"></script> --}}
  <script src="{{ asset('admin/vendors/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('admin/vendors/jquery.repeater/jquery.repeater.min.js') }}"></script>
@endsection

@section('script')
  <script src="{{ asset('admin/js/wizard.js') }}"></script>
  <script src="{{ asset('admin/js/dropify.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/dropzone.js') }}"></script> --}}
  <script src="{{ asset('admin/js/editor.js') }}"></script>
  {{-- <script src="{{ asset('admin/js/form-repeater.js') }}"></script> --}}
@endsection