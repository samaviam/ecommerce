@extends('admin.layouts.main')

@section('title', __('Banner'))

@section('plugin-style')
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-toast-plugin/jquery.toast.min.css') }}">
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <a href="{{ route('admin.banner.create') }}" class="btn btn-primary btn-rounded btn-icon">
          <i class="ti-plus"></i> {{ __('Add banner') }}
        </a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Title') }}</th>
                  <th>{{ __('Active') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($banners as $banner)
                  <tr>
                    <td><a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}">{{ $banner->id }}</a></td>
                    <td>{{ $banner->title }}</td>
                    <td>
                      <a href="#" class="badge badge-{{ $banner->active ? 'success' : 'danger' }}">
                        @if ($banner->active)
                          <i class="mdi mdi-check"></i> {{ __('Enable') }}
                        @else
                          <i class="mdi mdi-close"></i> {{ __('Disable') }}
                        @endif
                      </a>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.banner.edit', ['banner' => $banner->id]) }}" class="btn btn-secondary"><i class="mdi mdi-pencil"></i> {{ __('Edit') }}</a>
                        <button id="banner-{{ $loop->iteration }}" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspop="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="banner-{{ $loop->iteration }}">
                          <button class="dropdown-item" onclick="remove('{{ $banner->id }}')"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('plugin-script')
  <script src="{{ asset('admin/vendors/jquery-toast-plugin/jquery.toast.min.js') }}"></script>
@endsection

@section('script')
  <script src="{{ asset('admin/js/toastDemo.js') }}"></script>
  <script src="{{ asset('admin/js/desktop-notification.js') }}"></script>
  <script src="{{ asset('admin/js/data-table.js') }}"></script>
@endsection