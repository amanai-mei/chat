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
    @foreach($users as $user)
    @if($user_id->id == $user->user_id && $id == $user->to_id || $user_id->id == $user->to_id && $id == $user->user_id)
    <div class="media">
        <div class="media-body comment-body">
            <div class="row">
                <span class="comment-body-user" style="font-size:2px;"><span style="font-weight:bold" class="pr-2">{{ $user->name }}</span>{{ $user->created_at->format("Y/m/d H:i")}}</span>
            </div>
            <div class="mb-4 p-1" >
                <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px" href="{{ route('userchat.edit', ['userchat' => $user->id]) }}">
                    {!! nl2br(e($user->message)) !!}
                </a>
            </div>
        </div>
    </div>
        @endif
        @endforeach
<br>
</div>
<form method="POST" action="{{ route('userchat.store') }}">
    @csrf
    <div class="comment-container row justify-content-center">
    <input type="hidden" name="to_id" value="{{$id}}">
        <div class="input-group p-5">
            <textarea class="form-control mb-5 ml-5" id="message" name="message" placeholder="メッセージを入力"
                aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-outline-primary mb-5 mr-5">送信</button>
        </div>
    </div>
</form>
@endsection