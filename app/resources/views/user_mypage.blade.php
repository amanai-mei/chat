@extends('layouts.layout')
@section('content')
    <h2>マイページ</h2>
<!-- 画像を入れる -->

<form action="">
    <label for='name'>名前</label>
    <input type='text' class='' name='name' value="{{ $user_id['name'] }}" readonly>
    <br>
    <label for='email'>メールアドレス</label>
    <input type='text' class='' name='email' value="{{ $user_id['email'] }}" readonly>
    <br>
    <label for='password'>パスワード</label>
    <input type='password' class='' name='password' value="{{ $user_id['password'] }}" readonly>
    <br>
    <a href="">編集</a>
</form>

@endsection