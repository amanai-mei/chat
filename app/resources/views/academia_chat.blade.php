@extends('layouts.layout')

@section('content')
<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">
            <div class="card-header">Comment</div>
            <div class="card-body chat-card">

            </div>
        </div>
    </div>
</div>
<div class="card-body chat-card">
    @foreach ($users as $user)
    @include('layouts.message', ['user' => $user])
    @endforeach
</div>

<form method="POST" action="{{ route('userchat.store') }}">
    @csrf
    <div class="comment-container row justify-content-center">
        <div class="input-group comment-area">
            <textarea class="form-control" id="comment" name="comment" placeholder="input massage"
                aria-label="With textarea"></textarea>
            <button type="submit" class="btn btn-outline-primary comment-btn">Submit</button>
        </div>
    </div>
</form>
@endsection