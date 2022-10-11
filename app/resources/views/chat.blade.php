@extends('layouts.layout')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area text-center">
            <h3 class="">名前</h3>
    </div>
</div>
<form action="" method="GET">
            @csrf
            <br>
            <div class="form-group text-center">
                <select name="medium" data-toggle="select">
                    <option value=""></option>
                    <option value="">名前</option>
                    <option value="">グループ</option>
                </select>
                <input type="text" name="keyword" value="" placeholder="入力">
                <button>検索</button>
            </div>


<div class="media">
    <div class="media-body comment-body">
        <div class="row">
            <span class="comment-body-user">名前</span>
            <span class="comment-body-time">送信日時</span>
        </div>
        <span class="comment-body-content card">
            メッセージ内容
        </span>
    </div>
</div>
<br>
<div class="comment-container row justify-content-center">
    <div class="input-group comment-area">
        <textarea class="form-control" placeholder="メッセージを入力" aria-label="With textarea"></textarea>
        <button type="input-group-prepend button" class="btn btn-outline-primary comment-btn">送信</button>
    </div>
</div>

@endsection