@extends('layouts.layout')
@section('content')
<!-- フラッシュメッセージ -->
@if (session('flash_message'))
            <div class="flash_message alert alert-primary m-2 text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>

<div class="chat-container row">
    <div class="chat-area">
        <div class="card">      
            <div class="card-body chat-card h5 mb-1">
                <a style="text-decoration:none; text-size:8px;" class="text-secondary" href="{{ route('display.index') }}">＜ 戻る</a>
                    @foreach($names as $name)
                        @if($id == $name['id'])
                                {{ $name['name'] }}さんとのメッセージ
                        @endif
                    @endforeach
            </div>
            
    </div>
</div>
<div class="card-body chat-card">
    @foreach($users as $user)
    @if($user_id->id == $user->user_id && $id == $user->to_id || $user_id->id == $user->to_id && $id == $user->user_id)
    <div class="media">
        @if($user->user_id == Auth::id())
        <div class="media-body comment-body text-right mt-3">
            <div class="m-1 p-1">
                <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px" 
                href="{{ route('userchat.edit', ['userchat' => $user->id]) }}">
                    {!! nl2br(e($user->message)) !!}
                </a>
            </div>
            <div class="row">
                <span class="comment-body-user" style="font-size:2px;">{{ $user->created_at->format("Y/m/d H:i")}}</span>
            </div>
        </div>
        @else
        <div class="media-body comment-body">
            <div class="row">
                <span class="comment-body-user" style="font-size:2px;"><span style="font-weight:bold" class="pr-2">{{ $user->name }}</span>{{ $user->created_at->format("Y/m/d H:i")}}</span>
            </div>
            <div class="m-1 p-1">
                <span class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#f5f5f5; border-radius:30px" 
                href="">
                    {!! nl2br(e($user->message)) !!}
                </span>
            </div>
        </div>
        @endif
    </div>
        @endif
        @endforeach
</div>
<div id="fixed">
    <form method="POST" action="{{ route('userchat.store') }}">
        @csrf
        <div class="comment-container row justify-content-center">
        <input type="hidden" name="to_id" value="{{$id}}">
            <div class="input-group">
                <textarea class="form-control" id="message" name="message" placeholder="メッセージを入力"
                    aria-label="With textarea"></textarea>
                <button type="submit" class="btn btn-secondary">送信</button>
            </div>
        </div>
    </form>
</div>
<style>
#fixed {
position: fixed; /* 要素の位置を固定する */
bottom: 0; /* 基準の位置を画面の一番下に指定する */
width: 100%; /* 幅を指定する */
}
</style>
@endsection