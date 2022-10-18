@extends('layouts.layout')
@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <!-- <div class="card-header">Comment</div> -->
            <div class="card-body chat-card">

            </div>
        </div>
    </div>
</div>
<div class="card-body chat-card">

    <div class="media">
        <div class="media-body comment-body">
            <div class="row">
                <span class="comment-body-user"></span>
                <span class="comment-body-time"></span>
            </div>
                <a class="comment-body-content" href="{{ route('userchat.edit', ['userchat' => Auth::user()->id]) }}">
                    <!-- メッセージ -->
                </a>
        </div>
    </div>

<br>
</div>
<form method="POST" action="{{ route('userchat.store') }}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="message" name="message" placeholder="メッセージを入力"
                aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-outline-primary comment-btn">送信</button>
        </div>
    </div>
</form>
@endsection