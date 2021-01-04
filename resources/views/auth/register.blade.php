@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header"><div class="text-center">店舗登録</div></div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="store_name" class="form-group">店舗名</label>
                            <input id="store_name" type="text" class="form-control" name="store_name" value="{{ old('store_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-group">パスワード</label>
                            <input id="password" type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">パスワード(確認)</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">登録</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
