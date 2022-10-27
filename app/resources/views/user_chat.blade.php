@extends('layouts.layout')
@section('content')

<div class="chat-container row">
    <div class="chat-area">
        <div class="">      
                <!-- <a style="text-decoration:none; text-size:8px;" class="text-secondary" href="{{ route('display.index') }}">＜ 戻る</a> -->
                <h4 class="text-center border-top border-bottom p-3 m-3">
                    @foreach($names as $name)
                        @if($id == $name['id'])
                                {{ $name['name'] }}さんとのメッセージ
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
<div class="user_chat">
        <div id="comment-data">
    @foreach($users as $user)
    @if($user['user_id'] == Auth::id())
        <div class="media comment-visible text-right">
            <div class="media-body comment-body mb-1">
                <div class="">
                    <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px; border:1px solid #dcdcdc;" 
                    id="comment" href="{{ route('userchat.edit', ['userchat' => $user['id']]) }}">{{$user['message']}}</a>
                </div>
                <span class="comment-body-time pr-1" style="font-size:2px;" id="created_at">{{$user['created_at']}}</span>
            </div>
        </div>
        @else
        <div class="media comment-visible text-left">
            <div class="media-body comment-body mb-1">
                <div class="mb-1 pl-1">
                <span class="comment-body-user" style="font-size:2px;" id="name">{{$user['name']}}</span>
                </div>
                <div class="">
                    <span class="comment-body-content p-2" style="background-color:#ffffff; border-radius:30px; border:1px solid #dcdcdc;" id="comment">{{$user['message']}}</span>
                </div>
                <span class="comment-body-time pl-1" style="font-size:2px;" id="created_at">{{$user['created_at']}}</span>
            </div>
        </div>
        @endif
        @endforeach
    </div>
</div>

<div id="fixed">
    <form name="chat" method="POST" action="{{ route('userchat.store') }}">
        @csrf
        <div class="comment-container row">
        <input type="hidden" name="to_id" data-toid="{{$id}}" id="to_id">
            <div class="input-group text-right">
                <textarea class="form-control ml-4" id="message" name="message" placeholder="メッセージを入力"
                    aria-label="With textarea"></textarea>
                    <button type="submit" id="click_btn" class="btn btn-secondary" onclick="clearText()">送信</button>
            </div>
        </div>
    </form>

</div>
<style>
#fixed {
position: fixed; /* 要素の位置を固定する */
bottom: 0; /* 基準の位置を画面の一番下に指定する */
width: 100%; /* 幅を指定する */
/* text-align: right; */


}
#name,#created_at{
    font-size:2px;
}
.media{
    text-align:right;
    margin-bottom:20px;  
}
#comment{
    background-color:#99CCFF;
    border-radius:30px;
    padding:8px;
}
#name1,#created_at1{
    font-size:2px;
}
#comment1{
    background-color:#ffffff;
    border-radius:30px;
    padding:8px;
    border:1px solid #dcdcdc;
}
.media1{
    margin-right:5px;
    margin-bottom:20px;
}
.user_chat{
    padding: 40px;
}

</style>

@section('js')
<script>let id = @json(Auth::id());</script>
<script src="{{ asset('js/message.js') }}"></script>
@endsection

@endsection


