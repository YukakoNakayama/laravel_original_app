@extends('layouts.admin')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <div class="card">
        <!-- 商品の追加、変更、削除ができる -->
            <div class="card-header">
                <div class="text-center">商品名の変更</div>
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
                        <select class="form-control" name="change_product" id="change_product">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        <span>　を　</span>
                        <input type="text" class="form-control" id="change_productname" name="change_productname">
                        <span>　に　</span>
                        <span><input type="submit" class="btn btn-info" name="product_change" id="product_change" value="変更する"></span>
                        <span>　または　</span>
                        <span><input type="submit" class="btn btn-info" name="product_delete" id="product_delete" value="削除する"></span>
                    </div>
                    <div class="form-inline" style="margin-top: 1em;">
                        <select name="pro_types" id="pro_types" class="form-control">
                            @foreach($product_types as $product_type)
                                <option value="{{ $product_type->id }}">{{ $product_type->product_type }}</option>
                            @endforeach
                        </select>
                        <input type="text" class="form-control" name="newproduct" id="newproduct">
                        <input type="submit" class="btn btn-info" name="product_new" id="product_new" value="商品を追加する" style="margin-left: 1em;">
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 5em;">
            <div class="col col-6 mx-auto">
                <div class="col" style="margin-bottom: 0.5em;"><a href="{{ route('admin.product_types') }}" class="btn btn-block btn-info">商品種類の追加、変更</a></div>
                <div class="col"><a href="{{ route('admin.stores') }}" class="btn btn-block btn-info">店舗情報ページへ</a></div>
            </div>    
        </div>
    </div>
@endsection