@extends('layouts.main')

@section('title', __('Login'))

@section('content')
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
            ]) !!}" page-name="{!! __('Login') !!}" />
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="login-form form-item form-stl">
                                @include('partials.errors')
                                <form name="frm-login" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Log in to your account</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-uname">Email Address:</label>
                                        <input
                                            type="email"
                                            id="frm-login-uname"
                                            @error('email')class="is-invalid"@enderror
                                            name="email"
                                            value="{{ old('email') }}"
                                            placeholder="Type your email address"
                                            required
                                            autocomplete="email"
                                            autofocus
                                        />
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-login-pass">Password:</label>
                                        <input
                                            type="password"
                                            id="frm-login-pass"
                                            @error('password')class="is-invalid"@enderror
                                            name="password"
                                            placeholder="************"
                                            required autocomplete="current-password"
                                        />
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label class="remember-field">
                                            <input class="frm-input " name="remember" id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}><span>Remember me</span>
                                        </label>
                                        @if (Route::has('password.request'))
                                            <a class="link-function left-position" href="{{ route('password.request') }}" title="Forgotten password?">
                                                {{ __('Forgotten password?') }}
                                            </a>
                                        @endif
                                    </fieldset>
                                    <input type="submit" class="btn btn-submit" value="Login" name="submit">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </main>
@endsection