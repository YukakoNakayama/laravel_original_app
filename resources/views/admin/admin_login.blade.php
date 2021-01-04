@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header"><div class="text-center">管理側ログイン</div></div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $message)
                                <p>{{ $message }}</p>
                            @endforeach
                        </div>
                    @endif
                    <form method="POST" action="{{ route('admin.login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="ad_id" class="form-group">id</label>
                            <input id="admin_id" type="text" class="form-control" name="admin_id" value="{{ old('admin_id') }}">
                        </div>

                        <div class="form-group">
                            <label for="ad_password" class="form-group">パスワード</label>
                            <input id="admin_password" type="password" class="form-control" name="admin_password">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">ログイン</button>
                            <a class="btn btn-primary" href="{{ route('home') }}">店舗側ログイン</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection