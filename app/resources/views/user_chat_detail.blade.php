@extends('layouts.layout')
@section('content')

<div class="mt-5 mb-5">
    <div class="card Regular shadow mx-auto pb-5 pr-4 pl-4" style="width: 800px; height:400px;">
        <div class="card-body">
            <form action="{{ route('userchat.update', ['userchat' => $id]) }}" method="POST">
                @method('patch')
                @csrf
                <h4 class="text-center mt-5 border-top border-bottom p-4">メッセージの編集</h4>
                <div class="form-group row">
                    <input type="hidden" name="to_id" value="{{$id}}">
                    <div>
                        <label for="message" class=""></label>
                        <input id="message" type="text" class="form-control mx-auto" style="width:80%;" name="message" value="{{ $user_chat->message }}">
                    </div>
                    <span class="comment-body-user text-center m-3">-{{ $time->created_at->format("Y/m/d H:i") }}に送信したメッセージ-</span>
            </form>
                <div class="d-flex justify-content-center">
                    <div class="text-center pb-3 pt-3 pl-5">
                        <button class="btn btn-outline-primary mr-5">編集</button>
                    </div>
                    <div>
                        <form class="mt-3 mr-5"action="{{ route('userchat.destroy', ['userchat' => $id]) }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="btn btn-outline-warning text-center">削除</button>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection