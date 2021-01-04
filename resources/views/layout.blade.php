<!DOCTYPE html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Inventory</title>
    @yield('styles')
    <link rel="stylesheet" href="/css/styles.css">
  </head>
  <body>
    <header>
        <nav class="my-navbar">
            <a class="my-navbar-brand" href="/">Inventory</a>
            <!-- ログインしている時 -->
            <div class="my-navbar-control">
            @if(Auth::check())
              <a href="{{ route('inventory.index', ['id' => $product_id]) }}" class="my-navbar-item">在庫管理</a>
              <a href="{{ route('sales.index') }}" class="my-navbar-item">販売管理</a>
              <a href="{{ route('config.index') }}" class="my-navbar-item">設定</a>
              ｜
              <span class="my-navbar-item">[ {{ Auth::user()->store_name }} ] 店</span>
              ｜
              <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
              </form>
            @else
              <a class="my-navbar-item" href="{{ route('login') }}">ログイン</a>
            @endif
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    @if(Auth::check())
    <script>
      document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
      });
    </script>
    @endif
    @yield('scripts')
  </body>
</html>