<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://use.fontawesome.com/3b8c751dc8.js"></script>
    @yield('style')
</head>
<body>
    @component('master.header')
    @endcomponent

    <main class="py-5">
        @yield('content')
    </main>

    @component('master.footer')
    @endcomponent

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('script')
</body>
</html>
