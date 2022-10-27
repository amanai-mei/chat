@extends('layouts.layout')
@section('content')

<div class="card mt-5 Regular shadow" style="margin:0 300px;">
    <div class="card-body">
        <h4 class="text-center p-4 border-top border-bottom m-5">新しいパスワードの設定</h4>
        <form method="POST" action="{{ route('password_reset.update') }}">
            @csrf
            <input type="hidden" name="reset_token" value="{{ $userToken->token }}">
            <div class="form-group row" style="margin: 0 175px;">
                <label for="password" class="label">パスワード</label>
                <input type="password" name="password" class="input {{ $errors->has('password') ? 'incorrect' : '' }}">
                    @error('password')
                        <div class="error" style="font-size:13px;">{{ $message }}</div>
                    @enderror
                    @error('token')
                        <div class="error" style="font-size:13px;">{{ $message }}</div>
                    @enderror
            </div>
            <div class="form-group row mb-5 mt-3" style="margin: 0 175px;">
                <label for="password_confirmation" class="label">パスワード再入力</label>
                <input type="password" name="password_confirmation" class="input {{ $errors->has('password_confirmation') ? 'incorrect' : '' }}">
            </div>
            <div class="text-center mb-5">
                <a class="btn btn-outline-secondary mr-5" href="{{ route('login') }}">戻る</a>
                <button type="submit" class="btn btn-outline-primary ml-">パスワードを再設定</button>
            </div>
        </form>
    </div>
</div>
<style>
    body{
            font-family: 'ヒラギノ丸ゴ ProN','Hiragino Maru Gothic ProN',sans-serif;
            background-color: #f0f8ff;
        }
</style>
@endsection