@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header"><div class="text-center">ログイン</div></div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="id" class="form-group">店舗名</label>
                            <input id="id" type="text" class="form-control" name="store_name" value="{{ old('store_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-group">パスワード</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                            <a class="btn btn-primary" href="{{ route('admin.index') }}">管理側ログイン</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
