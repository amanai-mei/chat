@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center"></h3>
<br>
<div class="search text-center mb-5">
    <form class="mb-5" method="GET" action="{{ route('searchUser') }}">
        @csrf
        <input style="width:500px; height:38px;"type="search" placeholder="アカデミア生の検索" name="search" value="@if (isset($search)) {{ $search }} @endif" required>
        <button type="submit" class="btn btn-outline-secondary mb-1">検索</button>
    </form>
    <div class="d-flex justify-content-center">
        <div>
            <div class="card mr-5" style="width: 400px; height:400px;">
                <div class="card-body p-5">
                    <h4 class="text-center p-4 border-top border-bottom">アカデミア生</h4>
                    <div class="mt-5">
                        @foreach($users as $user)
                        @if($user['role'] == 0 && $user['id'] != Auth::user()->id && $user['del_flg'] == 0)
                        <ul class="p-0">
                            <li style="list-style:none;">
                                <a style="text-decoration:none;" href="{{ route('userchat.show', ['userchat' => $user['id']]) }}">{{ $user['name'] }}</a>
                            </li>
                        </ul>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card ml-5" style="width: 400px; height:400px;">
            <div class="card-body p-5">
                <h4 class="text-center p-4 border-top border-bottom">グループ</h4>
                    <div class="mt-5">
                        @foreach($groups as $group)
                        @if($group['user_id'] == Auth::id())
                        <ul class="p-0">
                            @if($group['group_id'] < 13)
                            <li style="list-style:none;">
                                <a style="text-decoration:none;" href="{{ route('groupchat.show', ['groupchat' => $group['group_id']]) }}">{{ $group['group_name'] }}</a>
                            </li>
                            @elseif($group['group_id'] > 14)
                            <li style="list-style:none;">
                                <a style="text-decoration:none;" href="{{ route('groupchat.show', ['groupchat' => $group['group_id']]) }}">{{ date('Y年m月', strtotime($group['group_name'])) }}</a>
                            </li>
                            @endif
                        </ul>
                        @endif
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
</div>

@endsection

