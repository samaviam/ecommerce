<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }} | @section('title'){{ __('Dashboard') }}@show</title>

        <link rel="stylesheet" href="{{ asset('admin/vendors/feather/feather.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/mdi/css/materialdesignicons.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/ti-icons/css/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/typicons/typicons.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/simple-line-icons/css/simple-line-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/js/select.dataTables.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/vendors/css/vendor.bundle.base.css') }}" />
        @yield('plugin-style')

        <link rel="stylesheet" href="{{ asset('admin/css/vertical-layout-light/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('admin/css/app.css') }}" />
        @yield('style')
    </head>
    <body>
        <div class="container-scroller">
            @include('admin.partials.navbar')

            <div class="container-fluid page-body-wrapper">
                @include('admin.partials.settings-panel')
                @include('admin.partials.sidebar')

                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </div>
            </div>
            <div id="spinner">
                <div><i></i></div>
            </div>
        </div>

        <script src="{{ asset('admin/vendors/js/vendor.bundle.base.js') }}"></script>
        <script src="{{ asset('admin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
        @yield('plugin-script')

        <script src="{{ asset('admin/js/off-canvas.js') }}"></script>
        <script src="{{ asset('admin/js/hoverable-collapse.js') }}"></script>
        <script src="{{ asset('admin/js/template.js') }}"></script>
        <script src="{{ asset('admin/js/settings.js') }}"></script>
        <script src="{{ asset('admin/js/todolist.js') }}"></script>
        <script src="{{ asset('admin/js/app.js') }}"></script>
        @yield('script')
    </body>
</html>