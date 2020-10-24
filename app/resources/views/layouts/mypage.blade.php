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

  @yield('assets')
</head>

<body>
  @include('layouts._header')

  <main class="container d-flex">
    {{-- 検索ボックス --}}
    @yield('search')
    {{-- <ul class="nav flex-column col-3 bg-light mr-3">
      <li class="nav-item pr-3 pl-3 pt-2 pb-2">
        <a class="nav-link" href="{{ route('content.create') }}" style="color:#444">デート作成</a>
      </li>
      <li class="nav-item pr-3 pl-3 pt-2 pb-2">
        <a class="nav-link" href="{{ route('content.index') }}" style="color:#444">デートを探す</a>
      </li>
      <li class="nav-item pr-3 pl-3 pt-2 pb-2">
        <a class="nav-link active" href="{{ route('mycontent.index') }}" style="color:#444">マイデート</a>
      </li>
      <li class="nav-item pr-3 pl-3 pt-2 pb-2">
        <a class="nav-link" href="{{ route('mytask.index') }}" style="color:#444">デートの予定</a>
      </li>
    </ul> --}}
<div class="col">
    <h5>
      @yield('title')
    </h5>
    @yield('content')
</div>
    {{-- 依頼作成 --}}
    @yield('create')
  </main>
</body>

</html>