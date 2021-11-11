@extends('admin.layouts.main')

@section('plugin-style')
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            {{-- <x-table header="{!! json_encode([
              __('ID'), __('Image'),
              __('Name'), __('Price'),
            ]) !!}" rows="{!! json_encode([]) !!}" /> --}}
            <table class="table">
              <thead>
                <tr>
                  <th>{{ __('ID') }}</th>
                  <th>{{ __('Image') }}</th>
                  <th>{{ __('Name') }}</th>
                  <th>{{ __('Price') }}</th>
                  <th>{{ __('Quantity') }}</th>
                  <th>{{ __('Status') }}</th>
                  <th>{{ __('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('images/p') . '/' . $product->id . '/' . $product->cover }}" alt="{{ $product->name }}"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->regular_price }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                      <span class="badge badge-pill badge-outline-{{ $product->status ? 'success' : 'danger' }}">
                        @if ($product->status)
                          <i class="mdi mdi-check"></i>
                        @else
                          <i class="mdi mdi-close"></i>
                        @endif
                      </span>
                    </td>
                    <td>
                      <div class="btn-group">
                        <button class="btn btn-secondary" type="button"><i class="mdi mdi-pencil"></i> {{ __('Edit') }}</button>
                        <button id="product-{{ $loop->iteration }}" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" type="button" data-bs-toggle="dropdown" aria-haspop="true" aria-expanded="false"></button>
                        <div class="dropdown-menu" aria-labelledby="product-{{ $loop->iteration }}">
                          <a href="#" class="dropdown-item"><i class="mdi mdi-delete"></i> {{ __('Delete') }}</a>
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

@section('script')
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
@endsection