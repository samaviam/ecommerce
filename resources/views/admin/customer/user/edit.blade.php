@extends('admin.layouts.main')

@section('title', __('Edit user'))

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
    <form id="edit-user-form" action="{{ route('admin.user.update', $user) }}" method="POST">
      @method('PUT')
      @csrf
      <input type="hidden" name="custom" value="1">
      <div class="card-body">
        <div class="form-group">
          <label for="name">{{ __('Customer name *') }}</label>
          <input type="text" name="name" value="{{ $user->name }}" id="name" class="form-control required" placeholder="Customer name" required="required">
        </div>
        <div class="form-group">
          <label for="email">{{ __('Email *') }}</label>
          <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control required" placeholder="Customer email" required="required">
        </div>
        <div class="form-group">
          <label for="password">{{ __('Password') }}</label>
          <input type="password" name="password" value="" id="symbol" class="form-control required" placeholder="Customer password">
        </div>
        <div class="form-group">
          <label for="password_confirmation">{{ __('Repeat password') }}</label>
          <input type="password" name="password_confirmation" value="" id="password_confirmation" class="form-control required" placeholder="Repeat customer password">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
        <a href="{{ route('admin.user.index') }}" class="btn btn-secondary float-end">{{ __('Cancel') }}</a>
      </div>
    </form>
  </div>
@endsection