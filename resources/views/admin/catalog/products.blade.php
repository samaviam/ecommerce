@extends('admin.layouts.main')

@section('plugin-style')
@endsection

@section('content')
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <x-table header="{!! json_encode([
              __('ID'), __('Image'),
              __('Name'), __('Price'),
            ]) !!}" rows="{!!  !!}" />
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
@endsection