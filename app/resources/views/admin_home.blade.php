@extends('layouts.layout')

@section('content')
<!-- フラッシュメッセージ -->
@if (session('flash_message'))
<div class="alert alert-primary m-2 text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>
<br>
<br>
<h3 class="text-center">管理者トップページ</h3>

<div class="search text-center">
<form class="mb-5" method="GET" action="{{ route('searchUser') }}">
    @csrf
    <input type="search" placeholder="入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <button type="submit">検索</button>
</form>
<div>
    <div class="d-flex justify-content-evenly">
        <div>
            <h3>アカデミア生</h3>
            @foreach($users as $user)
            @if($user['role'] == 0 && $user['del_flg'] == 0)
            <ul>
                <li style="list-style:none;">
                    <a style="text-decoration:none;" href="{{ route('admin.show',['admin' => $user['id']]) }}">{{ $user['name'] }}</a>
                </li>
            </ul>
            @endif
            @endforeach
        </div>
        <div>
                 <h4>カリキュラム</h4>
                    @foreach($groupall as $group)
                    @if($group['id'] > 13)
                    @break
                    @endif
                            <ul>
                                <li style="list-style:none;">
                                    <a style="text-decoration:none;" href="{{ route('chat.show', ['chat' => $group['id']]) }}">{{ $group['group_name'] }}</a>
                                </li>
                            </ul>
                    @endforeach
                </div>
                <div>
                    <h4>入社日</h4>
                    @foreach($groupall as $group)
                    @if($group['id'] > 12)
                            <ul>
                                <li style="list-style:none;">
                                    <a style="text-decoration:none;" href="{{ route('chat.show', ['chat' => $group['id']]) }}">{{ date('Y年m月', strtotime($group['group_name'])) }}</a>
                                </li>
                            </ul>
                            @endif
                    @endforeach
                    <a href="{{ route('admin.create') }}">入社月の登録</a>
                    <br>
                    <a href="{{ route('usergroup.create') }}">グループに招待</a>
                </div>
            </div>
    @endsection