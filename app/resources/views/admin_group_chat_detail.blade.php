@extends('layouts.layout')
@section('content')

<div class="mt-5 mb-5">
    <div class="card Regular shadow mx-auto pb-5 pr-4 pl-4" style="width: 800px; height:400px;">
        <div class="card-body">
            <form action="{{ route('chat.destroy', ['chat' => $id]) }}" method="POST">
                @method('delete')
                @csrf
                <h4 class="text-center mt-5 border-top border-bottom p-4">メッセージの削除</h4>
                <div class="form-group row">
                    <input type="hidden" name="to_id" value="{{$id}}">
                    <div>
                        <label for="message" class=""></label>
                        <input id="message" type="text" class="form-control mx-auto" style="width:80%;" name="message" value="{{ $user_chat->message }}" disabled="disabled">
                    </div>
                    <span class="comment-body-user text-center mt-3">-{{ $time->created_at->format("Y/m/d H:i") }}に送信したメッセージ-</span>
                    <div class="text-center mt-5 pb-5">
                        <button class="btn btn-outline-warning text-center">削除</button>
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection