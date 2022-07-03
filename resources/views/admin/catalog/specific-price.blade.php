@extends('admin.layouts.main')

@section('title', __('Specific price'))

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
        <a href="{{ route('admin.specific-price.create') }}" class="btn btn-primary btn-rounded btn-icon">
          <i class="ti-plus"></i> {{ __('New specific price') }}
        </a>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Product') }}</th>
                  <th>{{ __('User') }}</th>
                  <th>{{ __('Start From') }}</th>
                  <th>{{ __('Reduction') }}</th>
                  <th>{{ __('From') }}</th>
                  <th>{{ __('To') }}</th>
                  <th>{{ __('Active') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($prices as $price)
                  <tr>
                    <td>{{ $price->id }}</td>
                    <td>{{ $price->product_name }}</td>
                    <td>{{ $price->user_name ?? 'All users' }}</td>
                    <td>{{ $price->start_from }}</td>
                    @if ($price->reduction_type == 'percentage')
                      <td>-{{ $price->reduction }}%</td>
                    @else
                      <td class="product-price">-@price($price->reduction, $price->currency_code)</td>
                    @endif
                    <td>{{ $price->from }}</td>
                    <td>{{ $price->to }}</td>
                    <td>
                      <a href="{{ route('admin.specific-price.change-status', $price) }}" class="badge badge-{{ $price->active ? 'success' : 'danger' }}"
                        data-text-inactive="{{ __('Disable') }}"
                        data-text-active="{{ __('Enable') }}"
                        onclick="updateStatus('{{ $price->id }}')">
                        @if ($price->active)
                          <i class="mdi mdi-check"></i> {{ __('Enable') }}
                        @else
                          <i class="mdi mdi-close"></i> {{ __('Disable') }}
                        @endif
                      </a>
                    </td>
                    <td>
                      <div class="btn-group">
                        <a href="{{ route('admin.specific-price.edit', $price) }}" class="btn btn-secondary"><i class="mdi mdi-pencil"></i> {{ __('Edit') }}</a>
                        <button id="specific-price-{{ $loop->iteration }}" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspop="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="specific-price-{{ $loop->iteration }}">
                          <button class="dropdown-item" onclick="remove('{{ $price->id }}')"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</button>
                        </div>
                      </div>
                    </td>
                  </tr>
                @empty
                  <tr class="border-0">
                    <td colspan="9" class="border-0 text-center p-0 pt-4"><i class="mdi mdi-alert fs-2"></i></td>
                  </tr>
                  <tr class="border-0">
                    <td colspan="9" class="text-center p-2">{{ __('No records found.') }}</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
            {{ $prices->links('admin.partials.pagination') }}
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