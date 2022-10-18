@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center">アカデミアトップページ</h3>

<div class="search text-center">
<form class="mb-5" method="GET" action="{{ route('searchUser') }}">
    @csrf
    <input type="search" placeholder="入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <button type="submit">検索</button>
</form>
<div>
    <div class="d-flex justify-content-evenly">
        <div>
            <h4>アカデミア生</h4>
            @foreach($users as $user)
            @if($user['role'] == 0 && $user['id'] != Auth::user()->id)
            <ul>
                <li style="list-style:none;">
                    <a style="text-decoration:none;" href="{{ route('userchat.show', ['userchat' => $user['id']]) }}">{{ $user['name'] }}</a>
                </li>
            </ul>
            @endif
            @endforeach
        </div>
                <div>
                <h4>カリキュラム</h4>
                    @foreach($groups as $group)
                    @if($group['id'] > 13)
                    @break
                    @endif
                            <ul>
                                <li style="list-style:none;">
                                    <a style="text-decoration:none;" href="{{ route('groupchat.show', ['groupchat' => $group['id']]) }}">{{ $group['group_name'] }}</a>
                                </li>
                            </ul>
                    @endforeach
                </div>
                <div>
                    <h4>入社日</h4>
                    @foreach($groups as $group)
                    @if($group['id'] > 12)
                    
                    <ul>
                        <li style="list-style:none;">
                            <a style="text-decoration:none;" href="{{ route('chat.index') }}">{{ $groups = date('Y年m月', strtotime($group['group_name'])) }}</a>
                        </li>
                    </ul>
                    @endif
                    @endforeach
                </div>
    </div>
    @endsection

