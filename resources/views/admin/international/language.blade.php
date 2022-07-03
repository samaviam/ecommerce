@extends('admin.layouts.main')

@section('title', __('Language'))

@section('plugin-style')
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-toast-plugin/jquery.toast.min.css') }}">
@endsection

@section('content')
  @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class="card-body">
      <div class="card-title">
        <a href="{{ route('admin.currency.create') }}" class="btn btn-primary btn-rounded btn-icon">
          <i class="ti-plus"></i> {{ __('Add language') }}
        </a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Currency') }}</th>
                  <th>{{ __('Symbol') }}</th>
                  <th>{{ __('ISO code') }}</th>
                  <th>{{ __('Active') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($languages as $language)
                  <tr>
                    <td><a href="{{ route('admin.language.edit', ['language' => $language->id]) }}">{{ $language->id }}</a></td>
                    <td>{{ $language->name }}</td>
                    <td>{{ $language->symbol }}</td>
                    <td>{{ $language->iso }}</td>
                    <td>
                      <a href="{{ route('admin.language.change-status', $language) }}" class="badge badge-{{ $language->active ? 'success' : 'danger' }}"
                        data-text-inactive="{{ __('Disable') }}"
                        data-text-active="{{ __('Enable') }}"
                        onclick="updateStatus('{{ $language->id }}')">
                        @if ($language->active)
                          <i class="mdi mdi-check"></i> {{ __('Enable') }}
                        @else
                          <i class="mdi mdi-close"></i> {{ __('Disable') }}
                        @endif
                      </a>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.language.edit', ['language' => $language->id]) }}" class="btn btn-secondary"><i class="mdi mdi-pencil"></i> {{ __('Edit') }}</a>
                        <button id="language-{{ $loop->iteration }}" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspop="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="language-{{ $loop->iteration }}">
                          <button class="dropdown-item" onclick="remove('{{ $language->id }}')"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr class="border-0">
                    <td colspan="6" class="border-0 text-center p-0 pt-4"><i class="mdi mdi-alert fs-2"></i></td>
                  </tr>
                  <tr class="border-0">
                    <td colspan="6" class="text-center p-2">{{ __('No records found.') }}</td>
                  </tr>
                @endforelse
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