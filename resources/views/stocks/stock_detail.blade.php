@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            在庫詳細、変更
                        </div>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="col-4 mx-auto alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <div class="text-center">{{ $message }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="text-center">
                            <p>商品名：
                                <span>{{ $stocks->product_name }}</span>
                                <span style="margin-left: 1em;">在庫数：<span>{{ $stocks->total }}</span></span>
                                <span style="margin-left: 1em;">最終更新：<span>{{ $stocks->modified }}</span></span>
                            </p>
                        </div>
                        <form action="" method="POST" class="form-group">
                            @csrf
                            <div class="form-inline">
                                <div class="col-6 mx-auto">
                                <span>在庫数を <input type="text" class="form-control" name="stocktotal_change"></span>
                                <span>に <input type="submit" class="btn btn-primary" value="変更" name="change_stock"></span>
                                <span>または <input type="submit" class="btn btn-primary" value="削除する" name="delete_stock"></span>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-right"><a href="{{ route('inventory.index', ['id'=>$product_id]) }}" class="btn btn-primary">戻る</a></div>
                    </div>
                </div>
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