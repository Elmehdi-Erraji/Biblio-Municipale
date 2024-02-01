<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">
    <!-- CSS Files -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">

    <title>{{ config('app.name', 'Bookie') }}</title>

   
</head>

<body>

<!-- ========== Header Start ========== -->
@include('layouts.header1')
<!-- ========== Header End ========== -->

<!-- ========== Sidebar Start ========== -->
@include('layouts.menue1')
<!-- ========== Sidebar End ========== -->

<!-- Content -->
<div id="app">
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/ven.js') }}"></script>
<script src="{{ asset('js/config.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>


</body>
</html>
