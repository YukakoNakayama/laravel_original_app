@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <!-- 担当者の追加、変更ができるようにする -->
        <div class="card">
            <div class="card-header">
                <div class="text-center">在庫の追加</div>
            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="col-3 mx-auto alert alert-danger">
                        @foreach($errors->all() as $message)
                            <div class="text-center">{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
                <div class="col-6 mx-auto">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group form-inline">
                        <select name="new_product" id="new_product" class="form-control">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        <div class="col">総数: <input type="text" class="form-control" name="new_total" id="new_total"></div>
                        <input type="submit" class="btn btn-info" value="追加する" name="new_stock">
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 3em;">
            <div class="col col-6 mx-auto">
                <div class="col" style="margin-bottom: 0.5em;"><a href="{{ route('config.index') }}" class="btn btn-block btn-info">担当者ページへ</a></div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection