@extends('layouts.layout')
@section('content')

<form action="{{ route('userchat.destroy', ['userchat' => $id]) }}" method="POST">
@method('patch')
@csrf
<div class="form-group row">
    <label for="message" class="text-left">{{ __('名前') }}</label>
    <div class="">
        <input id="message" type="text" class="form-control p-3" name="message" value="{{ $user_chat->message }}" disabled="disabled">
    </div>
    <div class="text-center pb-3 pt-3">
        <button class="btn btn-outline-primary mx-auto">削除</button>
        <a href="">編集</a>
    </div>
</form>
@endsection