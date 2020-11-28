<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="app">
    @include('layouts.includes.navbar')
    @include('layouts.includes.alerts')

    <main class="app-main">
        @yield('content')
    </main>

    @include('layouts.includes.footer')
</div>

@include('layouts.includes.scripts')
</body>
</html>
