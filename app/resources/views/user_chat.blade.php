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
<div id="comment-data" class="mb-5">
@foreach($users as $user)
@if($user['user_id'] == Auth::id())
    <div class="media comment-visible text-right">
        <div class="media-body comment-body mb-4">
            <div class="">
                <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px;" 
                id="comment" href="{{ route('userchat.edit', ['userchat' => $user['id']]) }}">{{$user['message']}}</a>
            </div>
            <span class="comment-body-time" style="font-size:2px;" id="created_at">{{$user['created_at']->format("Y/m/d H:i")}}</span>
        </div>
    </div>
    @else
    <div class="media comment-visible text-left">
        <div class="media-body comment-body">
            <span class="comment-body-user" style="font-size:2px;" id="name">{{$user['name']}}</span>
            <div class="">
                <span class="comment-body-content p-2" style="background-color:#f5f5f5; border-radius:30px" id="comment">{{$user['message']}}</span>
            </div>
            <span class="comment-body-time" style="font-size:2px;" id="created_at">{{$user['created_at']->format("Y/m/d H:i")}}</span>
        </div>
    </div>
    @endif
    @endforeach
</div>


<div id="fixed">
    <form name="chat" method="POST" action="{{ route('userchat.store') }}">
        @csrf
        <div class="comment-container row justify-content-center">
        <input type="hidden" name="to_id" data-toid="{{$id}}" id="to_id">
            <div class="input-group">
                <textarea class="form-control" id="message" name="message" placeholder="メッセージを入力"
                    aria-label="With textarea"></textarea>
                    <button type="submit" id="click_btn" class="btn btn-secondary" style="margin-right:130px;" onclick="clearText()">送信</button>
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
#name,#created_at{
    font-size:2px;
}
.media{
    text-align:right;
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
    background-color:#f5f5f5;
    border-radius:30px;
    padding:8px;

}
</style>

@section('js')
<script src="{{ asset('js/message.js') }}"></script>
@endsection

@endsection


