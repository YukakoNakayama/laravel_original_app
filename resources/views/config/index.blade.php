@extends('layout')

@section('styles')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
@endsection

@section('content')
    <div class="container">
        <!-- 担当者の追加、変更ができるようにする -->
        <div class="card">
            <div class="card-header">
                <div class="text-center">担当者の変更</div>
            </div>
            <div class="card-body col">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <div class="text-center">変更後の担当者名または新規担当者名のどちらかを入力してください</div>
                    </div>
                @endif

                <form action="" method="POST" class="form-group" style="margin-left: 10em;">
                    @csrf
                    <div class="form-inline">
                        <select class="form-control" name="change_person" id="change_person">
                            @foreach($people as $person)
                                <option value="{{ $person->id }}">{{ $person->person_name }}</option>
                            @endforeach
                        </select>
                        <span>　を　</span>
                        <input type="text" class="form-control" id="change_personname" name="change_personname">
                        <span>　に　</span>
                        <span><input type="submit" class="btn btn-info" name="person_change" id="person_change" value="変更する"></span>
                        <span>　または　</span>
                        <span><input type="submit" class="btn btn-info" name="person_delete" id="person_delete" value="削除する"></span>
                    </div>
                    <div class="form-inline" style="margin-top: 1em;">
                        <input type="text" class="form-control" name="newperson" id="newperson">
                        <input type="submit" class="btn btn-info" name="person_new" id="person_new" value="担当者を追加する" style="margin-left: 1em;">
                    </div>
                </form>
            </div>
        </div>
        <div class="row" style="margin-top: 3em;">
            <div class="col col-6 mx-auto">
                <div class="col" style="margin-bottom: 0.5em;"><a href="{{ route('config.stock') }}" class="btn btn-block btn-info">在庫の追加ページへ</a></div>
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