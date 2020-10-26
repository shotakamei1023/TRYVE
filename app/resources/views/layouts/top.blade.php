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
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/assets/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/app.css') }}">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
  <a class="navbar-brand" href="{{ url('/') }}"><img class="headerLogo" id="car" src="{{ asset('/assets/images/car.png') }}" alt="車"></a>
  <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      @guest
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('login') }}">ログイン <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">会員登録<span class="sr-only">(current)</span></a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage.index') }}">マイページ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contents.index') }}">デートを探す</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage.contents.create') }}">デート作成</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage.contents.index') }}">マイデート</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('mypage.tasks.index') }}">デートの予定</a>
        </li>

        <li class="nav-item">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
            <input type="submit" value="Logout" />
          </form>
        </li>
      @endguest
      {{-- <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> --}}
    </ul>
  </div>
</nav>
            {{-- 検索ボックス --}}
            @yield('search')
            {{-- データ表示 --}}
            @yield('content')
            {{-- 依頼作成 --}}
            @yield('create')
</body>
</html>
