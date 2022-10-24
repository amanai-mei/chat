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
            <h4 class="text-center mt-4 mb-4 border-top border-bottom p-4">
                @foreach($group as $g)
                @if($g->id < 13)
                {{ $g->group_name }} 
                @elseif($g->id > 14)     
                {{date('Y年m月', strtotime($g->group_name)) }}
                @endif 
                @endforeach  
            </h4>       
    </div>
</div>
<!-- メッセージ表示 -->
<div class="card-body chat-card">
    @foreach($users as $user)
    <div class="">
        <div class="mb-4">
                <div class="">
                    <p style="font-weight:bold; font-size:3px;" class="mb-1">{{ $user->name }}</p>
                </div>
                <div class="">
                    <a class="comment-body-content p-2" style="text-decoration:none; color:black; background-color:#99CCFF; border-radius:30px" 
                    href="{{ route('chat.edit', ['chat' => $user->id]) }}">
                    {!! nl2br(e($user->message)) !!}
                    </a>
                </div>
            <div class="mt-1">
            <span class="date" style="font-size:3px;">{{ $user->created_at->format("Y/m/d H:i") }}</span>
            </div>
        </div>
    </div>
       @endforeach
</div>
@endsection

<style>
    
</style>
