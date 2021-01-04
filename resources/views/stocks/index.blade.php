@extends('layout')

@section('styles')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <div class="card">
                    <div class="card-header">商品種類</div>
                    <div class="list-group">
                        @foreach($product_ids as $product)
                        <a href="{{ route('inventory.index', ['id' =>$product->id]) }}" class="list-group-item list-group-item-action {{ $current_types === $product->id ? 'active' : '' }}">{{ $product->product_type }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <div>{{ $message }}</div>
                    @endforeach
                </div>
            @endif
            <form action="" method="POST">
                @csrf
                <table class="table table-hover table-light table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th scope="col col-auto">商品名</th>
                            <th scope="col col-auto">総数</th>
                            <th scope="col col-auto"></th>
                        </tr>
                    </thead>
                    @foreach($stocks as $stock)
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td>{{ $stock->product_name }}</td>
                            <td>
                                {{ $stock->total }}
                            </td>
                            <td><a href="{{ route('inventory.detail', ['id'=>$current_types, 'stock_id'=>$stock->s_id] ) }}" class="btn btn-block btn-outline-primary">詳細、変更</a></td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
                <!-- <div class="col col-md-6">
                    <input type="submit" class="btn btn-info" name="change_stock" id="change_stock" value="変更する">
                    <input type="submit" class="btn btn-info" name="delete_stock" id="change_stock" value="削除する">
                </div> -->
            </form>
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