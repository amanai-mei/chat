@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center">アカデミアトップページ</h3>

<div class="search text-center">
<form method="GET" action="{{ route('display.store') }}">
    @csrf
    <select name="medium" data-toggle="select">
        <option value=""></option>
        <option value="">名前</option>
        <option value="">グループ</option>
    </select>
    <input type="search" placeholder="入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <button type="submit">検索</button>
</form>


@foreach($users as $user)
    <a href="{{ route('display.store', ['user_id' => $user['id']]) }}">
        {{ $user['name'] }}
    </a>
@endforeach


<div>
<!-- // 下記のようにページネーターを記述するとページネートで次ページに遷移しても、検索結果を保持する -->
    


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
                    @if($group['id'] === "年")
                    
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