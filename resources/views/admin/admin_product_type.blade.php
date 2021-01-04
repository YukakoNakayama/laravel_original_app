@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
            <!-- 商品種類の追加、変更、削除ができる -->
            <div class="card-header">
                <div class="text-center">商品種類の変更</div>
            </div>
            <div class="card-body col">
                @if($errors->any())
                    <div class="col-4 mx-auto alert alert-danger">
                        @foreach($errors->all() as $message)
                            <div class="text-center">{{ $message }}</div>
                        @endforeach
                    </div>
                @endif
                <form action="" method="POST" class="form-group" style="margin-left: 10em;">
                    @csrf
                    <div class="form-inline">
                        <select class="form-control" name="change_type" id="change_type">
                            @foreach($product_types as $product_type)
                                <option value="{{ $product_type->id }}">{{ $product_type->product_type }}</option>
                            @endforeach
                        </select>
                        <span>　を　</span>
                        <input type="text" class="form-control" id="change_typename" name="change_typename">
                        <span>　に　</span>
                        <span><input type="submit" class="btn btn-info" name="type_change" id="type_change" value="変更する"></span>
                        <span>　または　</span>
                        <span><input type="submit" class="btn btn-info" name="type_delete" id="type_delete" value="削除する"></span>
                    </div>
                    <div class="form-inline" style="margin-top: 1em;">
                        <label><input type="text" class="form-control" name="newtype" id="newtype"></label>
                        <input type="submit" class="btn btn-info" name="type_new" id="type_new" value="種類を追加する" style="margin-left: 1em;">
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 5em;">
            <div class="col col-6 mx-auto">
                <div class="col" style="margin-bottom: 0.5em;"><a href="{{ route('admin.products') }}" class="btn btn-block btn-info">商品の追加、変更</a></div>
                <div class="col"><a href="{{ route('admin.stores') }}" class="btn btn-block btn-info">店舗情報ページへ</a></div>
            </div>
        </div>
    </div>
@endsection
