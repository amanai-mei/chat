@extends('layouts.layout')
@section('content')

<div class="card mt-5 Regular shadow" style="margin:0 300px;">
    <div class="card-body">
        <h4 class="text-center p-4 border-top border-bottom m-5">パスワード再設定メール送信フォーム</h4>
        <form method="POST" action="{{ route('password_reset.email.send') }}">
            @csrf
            <div class="form-group row mb-5" style="margin: 0 250px;">
                <label for="email" class="text-left m-1">メールアドレス</label>
                <input style="width:500px;"type="text" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="text-center mb-5 mt-5">
                <a class="btn btn-outline-secondary mr-5" href="{{ route('login') }}">戻る</a>
                <button class="btn btn-outline-primary ml-">再設定用メールを送信</button>
            </div>
        </form>
    </div>
</div>
<style>
    body{
        font-family: 'ヒラギノ丸ゴ ProN','Hiragino Maru Gothic ProN',sans-serif;
    }
</style>
@endsection