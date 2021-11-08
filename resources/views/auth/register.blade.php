@extends('layouts.main')

@section('title', __('Register'))

@section('content')
    <main id="main" class="main-site left-sidebar">
        <div class="container">
            <x-breadcrumb previous-pages="{!! json_encode([
                route('home') => __('Home'),
            ]) !!}" page-name="{!! __('Register') !!}" />
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                    <div class=" main-content-area">
                        <div class="wrap-login-item ">
                            <div class="register-form form-item ">
                                @include('partials.errors')
                                <form class="form-stl" name="frm-login" method="POST" action="{{ route('register') }}" >
                                    @csrf
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Create an account</h3>
                                        <h4 class="form-subtitle">Personal infomation</h4>
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-lname">Name*</label>
                                        <input
                                            type="text"
                                            id="frm-reg-lname"
                                            @error('name')class="is-invalid"@enderror
                                            name="name"
                                            placeholder="Full name*"
                                            value="{{ old('name') }}"
                                            required
                                            autocomplete="name"
                                            autofocus
                                        />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="wrap-input">
                                        <label for="frm-reg-email">Email Address*</label>
                                        <input
                                            type="email"
                                            id="frm-reg-email"
                                            @error('email')class="is-invalid"@enderror
                                            name="email"
                                            placeholder="Email address"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                        />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </fieldset>
                                    <fieldset class="wrap-functions">
                                        <label class="remember-field">
                                            <input name="newletter" id="new-letter" value="forever" type="checkbox"><span>Sign Up for Newsletter</span>
                                        </label>
                                    </fieldset>
                                    <fieldset class="wrap-title">
                                        <h3 class="form-title">Login Information</h3>
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half left-item ">
                                        <label for="frm-reg-pass">Password *</label>
                                        <input
                                            type="password" 
                                            id="frm-reg-pass" 
                                            @error('password')class="is-invalid"@enderror
                                            name="password"
                                            placeholder="Password"
                                            required
                                            autocomplete="new-password"
                                        />
                                    </fieldset>
                                    <fieldset class="wrap-input item-width-in-half ">
                                        <label for="frm-reg-cfpass">Confirm Password *</label>
                                        <input type="password" id="frm-reg-cfpass" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                                    </fieldset>
                                    <input type="submit" class="btn btn-sign" value="Register" name="register">
                                </form>
                            </div>
                        </div>
                    </div><!--end main products area-->
                </div>
            </div><!--end row-->
        </div><!--end container-->
    </main>
@endsection