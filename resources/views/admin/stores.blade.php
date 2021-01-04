@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <!-- 店舗の追加、変更、削除ができる -->
            <div class="card-header">
                <div class="text-center">店舗の変更</div>
            </div>
            <div class="card-body col">
                @if($errors->any())
                    <div class="col-4 mx-auto alert alert-danger">
                        @foreach($errors->all() as $message)
                            <div class="text-center">{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="" method="POST" class="form-group" style="margin-left: 12em;">
                    @csrf
                    <div class="form-inline">
                        <select class="form-control" name="change_store" id="change_store">
                            @foreach($stores as $store)
                                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                            @endforeach
                        </select>
                        <span>　を　</span>
                        店舗名：<input type="text" class="form-control" id="change_storename" name="change_storename">
                        パスワード：<input type="password" class="form-control" id="change_password" name="change_password">
                        <span>　に　</span>
                        <span><input type="submit" class="btn btn-info" name="store_change" id="store_change" value="変更する"></span>
                        <span>　または　</span>
                        <span><input type="submit" class="btn btn-info" name="store_delete" id="store_delete" value="削除する"></span>
                    </div>
                    <div class="form-inline" style="margin-top: 1em;">
                        <label>店舗名：<input type="text" class="form-control" name="newstore" id="newstore"></label>
                        <label>パスワード：<input type="password" class="form-control" name="newstore_pass" id="newstore_pass"></label>
                        <input type="submit" class="btn btn-info" name="store_new" id="store_new" value="店舗を追加する" style="margin-left: 1em;">
                    </div>
                    <div class="passcheck">
                        <label for="js-passcheck">パスワードを表示する</label>
                        <input type="checkbox" id="js-passcheck">
                    </div>
                </form>
            </div>

        </div>
        <div class="row" style="margin-top: 5em;">
            <div class="col col-6 mx-auto">
                <div class="col" style="margin-bottom: 0.5em;"><a href="{{ route('admin.products') }}" class="btn btn-block btn-info">商品の追加、変更</a></div>
                <div class="col"><a href="{{ route('admin.product_types') }}" class="btn btn-block btn-info">商品種類の追加、変更</a></div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(function() {
            var password  = '#newstore_pass';
            var passcheck = '#js-passcheck';
    
            $(passcheck).change(function() {
                if ($(this).prop('checked')) {
                    $(password).attr('type','text');
                } else {
                    $(password).attr('type','password');
                }
            });
        });
    </script>
@endsection