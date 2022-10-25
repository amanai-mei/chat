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
<h3 class="text-center mb-5">管理者ページ</h3>

<div class="search text-center">
    <form class="mb-5" method="GET" action="{{ route('searchAdmin') }}">
    @csrf
    <input style="width:500px; height:38px;" type="search" placeholder="アカデミア生の検索" name="search" value="@if (isset($search)) {{ $search }} @endif" required>
        <button type="submit" class="btn btn-outline-dark mb-1">検索</button>
    </form>
    <div>
        <div class="d-flex justify-content-center mb-5">
                <div class="card mr-5 p-5" style="width: 400px;">
                    <div class="text-center border-top border-bottom">
                        <h4 class="pt-4">アカデミア生</h4>
                        <p class="text-center" style="font-size:15px;">ー 削除 ー</p>
                    </div>
                <div class="mt-3">
                    @foreach($users as $user)
                        @if($user['role'] == 0 && $user['del_flg'] == 0)
                        <ul class="p-0">
                            <li style="list-style:none;">
                                <a style="text-decoration:none;" href="{{ route('admin.show',['admin' => $user['id']]) }}">{{ $user['name'] }}</a>
                            </li>
                        </ul>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="card p-5" style="width: 400px;">
            <div class="text-center border-top border-bottom">
                        <h4 class="pt-4">カリキュラム</h4>
                        <p class="text-center" style="font-size:15px;">ー トーク閲覧•削除 ー</p>
                    </div>

                <div class="mt-3">
                @foreach($groupall as $group)
                @if($group['id'] > 13)
                @break
                @endif
                <ul class="p-0">
                    <li style="list-style:none;">
                        <a style="text-decoration:none;" href="{{ route('chat.show', ['chat' => $group['id']]) }}">{{ $group['group_name'] }}</a>
                    </li>
                </ul>
                @endforeach
                </div>
            </div>
            <div class="card ml-5 p-5" style="width: 400px;">
            <div class="text-center border-top border-bottom">
                        <h4 class="pt-4">入社日</h4>
                        <p class="text-center" style="font-size:15px;">ー トーク閲覧•削除 / 招待 ー</p>
                    </div>
                <div class="mt-3">
                @foreach($groupall as $group)
                @if($group['id'] > 12)
                <ul class="p-0">
                    <li style="list-style:none;">
                        <a style="text-decoration:none;" href="{{ route('chat.show', ['chat' => $group['id']]) }}">{{ date('Y年m月', strtotime($group['group_name'])) }}</a>
                    </li>
                </ul>
                @endif
                @endforeach
                </div>
                <a  class="btn btn-outline-secondary mt-3" href="{{ route('admin.create') }}">入社月の登録</a>
                <br>
                <a class="btn btn-outline-dark" href="{{ route('usergroup.create') }}">グループに招待</a>
                </div>
        </div>
    </div>
</div>

@endsection
