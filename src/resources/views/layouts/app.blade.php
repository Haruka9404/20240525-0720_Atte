<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1.0">
  <title>Atte</title>
  <link rel="stylesheet" href="{{ asset('css/sanitize.css')}}">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/common.css')}}">
  @yield('css')
</head>

<body>
  <div class="header">
    <div class="header__inner">
      <a class="header__inner__logo" href="">Atte</a>
      @yield('header')
      <ul class="header-nav">
      @if (Auth::check())
        <li class="header-nav__item">
          <a class="header-nav__link" href="/index">ホーム</a>
        </li>
        <li class="header-nav__item">
          <a class="header-nav__link" href="/attendance">日付一覧</a>
        </li>
        <li class="header-nav__item">
          <form action="/logout" method="post">
          @csrf
            <button class="header-nav__button">ログアウト</button>
          </form>
        </li>
      @endif
      </ul>
    </div>
  </div>

  <div class="main">
    @yield('content')
  </div>

  <div class="footer">
    <div class="footer__inner">
      <small class="footer__inner__logo">Atte,inc.</small>
      @yield('footer')
    </div>
  </div>
</body>

</html>