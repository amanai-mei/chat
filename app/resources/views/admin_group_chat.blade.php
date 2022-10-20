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

<div class="chat-container row justify-content-center">
    <div class="chat-area">
        <div class="card">      
            <div class="card-body chat-card h5 mb-1">
            <a style="text-decoration:none; text-size:8px;" class="text-secondary" href="{{ route('display.index') }}">＜ 戻る</a>
                @foreach($group as $g)
                @if($g->id < 13)
                {{ $g->group_name }} 
                @elseif($g->id > 14)     
                {{date('Y年m月', strtotime($g->group_name)) }}
                @endif 
                @endforeach         
            </div>
        </div>
    </div>
</div>
<div class="card-body chat-card">
    @foreach($users as $user)
    <div class="media">
        <div class="media-body comment-body">
            <div class="row">
                <span class="comment-body-user" style="font-size:2px;"><span style="font-weight:bold" class="pr-2">{{ $user->name }}</span>{{ $user->created_at->format("Y/m/d H:i") }}</span>
            </div>
            <div class="mb-4 p-1" >
                <a class="comment-body-content h6 p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px" 
                href="{{ route('chat.edit', ['chat' => $user->id]) }}">
                {!! nl2br(e($user->message)) !!}
                </a>
            </div>
        </div>
    </div>
       @endforeach
</div>

@endsection