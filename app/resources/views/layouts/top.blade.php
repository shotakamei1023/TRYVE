<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TRYVE') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/assets/js/app02.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">

</head>
<body>
@include('layouts._header')
            @yield('content')
        <main class="py-4">
            {{-- 検索ボックス --}}
            @yield('search')
            {{-- データ表示 --}}
            @yield('content')
            {{-- 依頼作成 --}}
            @yield('create')
        </main>
</body>
</html>
