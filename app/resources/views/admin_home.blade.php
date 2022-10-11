@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center">管理者トップページ</h3>

<div class="search">
        <form action="" method="GET">
            @csrf
            <br>
            <div class="form-group text-center">
                <select name="medium" data-toggle="select">
                    <option value=""></option>
                    <option value="">名前</option>
                    <option value="">グループ</option>
                </select>
                <input type="text" name="keyword" value="" placeholder="入力">
                <button>検索</button>
            </div>


    <br>
    <br>
    <div class="d-flex justify-content-evenly">
        <div>
            <h3>アカデミア生</h3>
            @foreach($users as $user)
            <ul>
                <li>
                    <a href="{{ route('chat.index') }}">{{ $user['name'] }}</a>
                </li>
            </ul>
            @endforeach

        </div>
        <br>
        <div>
            <h3 class="text-center">グループ</h3>
            <div class="d-flex">
                <div>
                    <h4>カリキュラム</h4>
                    @foreach($groups as $group)
                    @if($group['id'] == 13)
                    @break
                    @endif
                            <ul>
                                <li>
                                    <a href="{{ route('chat.index') }}">{{ $group['group_name'] }}</a>
                                </li>
                            </ul>
                    @endforeach

                </div>
                <div>
                    <h4>入社日</h4>
                    @foreach($groups as $group)
                    @if($group['id'] > 14)
                    @continue;
                    @else
                    @endif
                            <ul>
                                <li>
                                    <a href="{{ route('chat.index') }}">{{ $group['group_name'] }}</a>
                                </li>
                            </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endsection