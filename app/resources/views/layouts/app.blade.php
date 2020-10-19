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

</head>
<body>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" >
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">TRYVE</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><img id="login" src="{{ asset('/assets/images/login.png') }}" alt="login"></a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><img id="register" src="{{ asset('/assets/images/register.png') }}" alt="register"></a>
                                </li>
                            @endif
                        @else
                        <div class="collapse navbar-collapse" id="navbarNav" >
                            <ul class="navbar-nav" >
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('content.index') }}">代行依頼検索</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('mycontent.index') }}">依頼作成一覧</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-item nav-link" href="{{ route('mytask.index') }}">代行申請一覧</a>
                                </li>
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('ログアウト') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                                    <a class="dropdown-item" href="{{ route('user.index') }}">マイページ</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            @yield('top')
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
