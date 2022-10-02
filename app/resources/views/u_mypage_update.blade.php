@extends('layouts.layout')
@section('content')
    <h2>マイページ</h2>
<!-- 画像を入れる -->

<a href="">削除</a>
<a href="">追加</a>
<form action="">
    <label for='name'>名前</label>
    <input type='text' class='' name='name' value="{{ $user_id['name'] }}">
    <br>
    <label for='email'>メールアドレス</label>
    <input type='text' class='' name='email' value="{{ $user_id['email'] }}">
    <br>
    <label for='password'>パスワード</label>
    <input type='password' class='' name='password' value="{{ $user_id['password'] }}">
    <br>
    <a href="{{ route('display.update', ['display' => Auth::user()->id]) }}">保存</a>
</form>

@endsection