@extends('layouts.layout')
@section('content')

<form action="{{ route('chat.destroy', ['chat' => $id]) }}" method="POST">
    @method('delete')
    @csrf
    <h4 class="text-center mt-5 border-top border-bottom p-4">メッセージの削除</h4>
    <div class="form-group row">
        <input type="hidden" name="to_id" value="{{$id}}">
        <div>
            <label for="message" class=""></label>
            <input id="message" type="text" class="form-control mx-auto" style="width:60%;" name="message" value="{{ $user_chat->message }}" disabled="disabled">
        </div>
        <span class="comment-body-user text-center mt-4">-{{ $time->created_at->format("Y/m/d H:i") }}に送信したメッセージ-</span>
        <div class="text-center mt-5">
            <button class="btn btn-outline-warning text-center">削除</button>
        </div>
    </form>

@endsection