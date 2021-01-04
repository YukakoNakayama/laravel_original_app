@extends('layout')

@section('styles')
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">

    <!-- flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-3">
                <div class="card bg-light">
                    <div class="card-header">販売状況</div>
                    <div class="card-body">
                        <!-- 日付選択 -->
                        <form action="" method="POST">
                            @csrf
                            <div class="card-body">
                                <input type="text" class="form-control" name="sales_prev_date" id="sales_prev_date" placeholder="{{ $today }}">
                            </div>
                            <input type="submit" class="btn btn-secondary btn-block" value="日付検索" name="sales_date_search" id="sales_date_search">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-md-9">
                <table class="table table-hover table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th></th>
                            <th scope="col col-auto"><div class="text-center">販売日</div></th>
                            <th scope="col col-auto"><div class="text-center">商品名</div></th>
                            <th scope="col col-auto"><div class="text-center">担当者</div></th>
                            <th scope="col col-auto"><div class="text-center">備考</div></th>
                            <th scope="col col-auto"></th>
                        </tr>
                    </thead>
                    @foreach($sales as $sale)
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td><div class="text-center">{{ $sale->sale_date }}</div></td>
                            <td><div class="text-center">{{ $sale->product_name }}</div></td>
                            <td><div class="text-center">{{ $sale->person_name }}</div></td>
                            <td><div class="text-center">{{ $sale->remark }}</div></td>
                            <td><div class="text-center"><a href="{{ route('sales_prev.detail', ['store_id'=>$sale->store_id, 'sales_id'=>$sale->s_id] ) }}" class="btn btn-block btn-outline-primary">詳細、変更</a></div></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
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
        flatpickr(document.getElementById('sales_prev_date'), {
            locale: 'ja',
            dateFormat: "Y/m/d",
            maxDate: "today"
        });
    </script>
@endsection
