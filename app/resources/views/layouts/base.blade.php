<html>
{{-- bootstrap --}}
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TRYVE</title>
  <link href="/css/all.css" rel="stylesheet">
  <link href="/css/style.css" rel="stylesheet">
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>	
<body>
  {{-- header --}}
  <header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('content.index') }}">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav" >
    <ul class="navbar-nav" >
      <li class="nav-item active">
        <a class="nav-link" 　a href="{{ route('mycontent.index') }}">代行作成一覧</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" 　href="#">代行依頼検索</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">代行申請一覧</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">マイページ</a>
      </li>
      <li class="nav-item">
        {{ Auth::user()->name }}がログインしてます
      </li>
    </ul>
  </div>
  </nav>
  </header>
{{-- 検索ボックス --}}
@yield('search')
{{-- データ表示 --}}
@yield('content')
{{-- 依頼作成 --}}
@yield('create')
　
</body>
</html>