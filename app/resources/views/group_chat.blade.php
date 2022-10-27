@extends('layouts.layout')
@section('content')


<div class="chat-container row">
    <div class="chat-area">
        <h4 class="text-center border-top border-bottom p-3 m-3">
        @foreach($user_group as $group_name)
            @if($group_name['user_id'] == Auth::id() && $id == $group_name['group_id'])
                @if($group_name['group_id'] < 13)
                    {{ $group_name['group_name'] }}
                @elseif($group_name['group_id'] > 14)
                    {{ date('Y年m月', strtotime($group_name['group_name'])) }}
                @endif
            @endif
        @endforeach
        </h4>
    </div>
</div>

<!-- フラッシュメッセージ -->
@if (session('flash_message'))
            <div class="flash_message alert alert-primary m-2 text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>

<!-- メッセージ表示 -->
<div class="group_chat">
    <div class="card-body">
        @foreach($users as $user)
        <div class="media">
            @if($user->user_id == Auth::id())
                <div class="media-body comment-body text-right mt-3">           
                    <div class="mb-1 p-1">
                        <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px; border:1px solid #dcdcdc;" 
                        href="{{ route('groupchat.edit', ['groupchat' => $user->id]) }}">
                        {!! nl2br(e($user->message)) !!}
                        </a>
                    </div>
                    <div class="row">
                        <span class="comment-body-user mr-5" style="font-size:2px;">{{ $user->created_at }}</span>
                    </div>
                </div>
                @else
                <div class="media-body comment-body mt-3">
                    <span style="font-weight:bold; font-size:3px;" class="pr-2 ml-2">{{ $user->name }}</span>           
                        <div class="p-1 mr-5">
                            <span class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#f5f5f5; border-radius:30px; border:1px solid #dcdcdc;" href="">
                                {!! nl2br(e($user->message)) !!}
                            </span>
                        </div>
                        <div class="row">
                            <span class="comment-body-user mt-1 ml-2" style="font-size:2px;">{{ $user->created_at }}</span>
                        </div>
                </div>
            @endif
        </div>
        @endforeach
    </div>
</div>
<div id="fixed">
    <form method="POST" action="{{ route('groupchat.store') }}">
        @csrf
        <div class="comment-container row">
            <input type="hidden" name="group_id" value="{{$id}}">
                <div class="input-group">
                    <textarea class="form-control ml-4" id="message" name="message" placeholder="メッセージを入力"
                        aria-label="With textarea"></textarea>
                    <button type="submit" class="btn btn-secondary mr-4">送信</button>
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
.group_chat{
    padding: 10px;
}
</style>
@endsection