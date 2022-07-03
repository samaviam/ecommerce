@extends('admin.layouts.main')

@section('title', __('Users'))

@section('plugin-style')
  <link rel="stylesheet" href="{{ asset('admin/vendors/jquery-toast-plugin/jquery.toast.min.css') }}">
@endsection

@section('content')
  @if (session()->has('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  <div class="card">
    <div class="card-body">
      {{-- <div class="card-title">
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary btn-rounded btn-icon">
          <i class="ti-plus"></i> {{ __('New specific price') }}
        </a>
      </div> --}}
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Email') }}</th>
                  <th>{{ __('Updated at') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($users as $user)
                  <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-secondary"><i class="mdi mdi-pencil"></i> {{ __('Edit') }}</a>
                        <button id="user-{{ $loop->iteration }}" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspop="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="user-{{ $loop->iteration }}">
                          <button class="dropdown-item" onclick="remove('{{ $user->id }}')"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr class="border-0">
                    <td colspan="5" class="border-0 text-center p-0 pt-4"><i class="mdi mdi-alert fs-2"></i></td>
                  </tr>
                  <tr class="border-0">
                    <td colspan="5" class="text-center p-2">{{ __('No records found.') }}</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            {{ $users->links('admin.partials.pagination') }}
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