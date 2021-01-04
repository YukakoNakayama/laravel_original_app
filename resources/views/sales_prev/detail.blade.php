@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            販売詳細、変更
                        </div>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="col-3 mx-auto alert alert-danger">
                                @foreach($errors->all() as $message)
                                    <div class="text-center">{{ $message }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="text-center" style="margin-bottom: 2em;">
                            <span>販売日：<span>{{ $sales->sale_date }}</span></span>
                            <span style="margin-left: 2em;">商品名：<span>{{ $sales->product_name }}</span></span>
                            <span style="margin-left: 2em;">担当者：<span>{{ $sales->person_name }}</span></span>
                            <span style="margin-left: 2em;">備考：<span>{{ $sales->remark }}</span></span>
                        </div>
                        <form action="" method="POST" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col col-md-3 form-group">
                                    <label for="SaleDate">販売日時</label>
                                    <!-- クリックしたらカレンダーで選択できる -->
                                    <input type="text" class="form-control" name="prev_change_date" id="prev_change_date" value="">
                                </div>
                                <div class="col col-md-5 form-group">
                                    <label for="productName">商品名</label>
                                    <select class="form-control" name="prev_change_product" id="prev_change_product">
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col col-md-4 form-group">
                                    <label for="Person">担当者</label>
                                    <select class="form-control" name="prev_change_person" id="prev_change_person">
                                        @foreach($people as $person)
                                            <option value="{{ $person->id }}">{{ $person->person_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col col-md-8 form-group">
                                    <label for="Remark">備考</label>
                                    <input type="text" class="form-control" placeholder="備考欄" name="prev_remark" id="prev_remark">
                                </div>
                            </div>

                            <div class="col-md-3 mx-auto">
                                <input type="submit" class="btn btn-block btn-primary" value="変更する" name="change_sales" id="change_sales">
                                <input type="submit" class="btn btn-block btn-primary" value="削除する" name="delete_sales" id="delete_sales">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <div class="text-right"><a href="{{ route('sales_prev.index', ['store_id' => Auth::user()->id]) }}" class="btn btn-primary">戻る</a></div>
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
    <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
    <script src="https://npmcdn.com/flatpickr/dist/l10n/ja.js"></script>
    <script>
        flatpickr(document.getElementById('prev_change_date'), {
            locale: 'ja',
            dateFormat: "Y/m/d",
            maxDate: "today"
        });
    </script>

@endsection