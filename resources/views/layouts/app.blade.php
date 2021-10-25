<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@hasSection('title') @yield('title') | @endif {{ websiteName() }}
</title>
<!-- Favicon -->
<link rel="shortcut icon" href="{{ Storage::url(websiteFavicon()) }}" />
@include('layouts.parts.style')
<script src="{{ asset('js/app.js') }}"></script>
</head>

<body>

<div id="db-wrapper">
    @if (!request()->is('admin*'))
        @yield('content')
    @else
        @include('layouts.parts.sidebar')
        <div id="page-content">
            @include('layouts.parts.nav')
            <!-- Container fluid -->
            <div class="bg-background pt-10 pb-21"></div>
            <div class="container-fluid mt-n22 px-6">
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    @endif
</div>
@include('layouts.parts.script')
</body>

</html>
