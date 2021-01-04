@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="text-center">
                    管理側TOP
                </div>
            </div>
            <div class="col-6 mx-auto card-body">
                <span><a href="{{ route('admin.products') }}" class="btn btn-outline-info">商品の追加、変更</a></span>
                <span><a href="{{ route('admin.product_types') }}" class="btn btn-outline-info">商品種類の追加、変更</a></span>
                <span><a href="{{ route('admin.stores') }}" class="btn btn-outline-info">店舗の追加、変更</a></span>
            </div>
            <div class="card-footer">
                <div class="text-right">
                    <a href="#" class="btn btn-primary" id="admin-logout">ログアウト</a>
                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
      document.getElementById('admin-logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('admin-logout-form').submit();
      });
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection