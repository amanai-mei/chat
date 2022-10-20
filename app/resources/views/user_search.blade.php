@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center">検索結果</h3>

<div class="search text-center">
<form method="GET" action="{{ route('searchUser') }}">
    @csrf
    <input type="search" placeholder="入力" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <button type="submit">検索</button>
</form>

@if($users->total() !== 0)
<table class="">
    @foreach($users as $user)
    <tr>
        <td>           
            <a href="{{ route('userchat.show', ['userchat' => $user['id']]) }}">
                {{ $user['name'] }}
            </a>    
        </td>
        <td>
            {{ $user['image'] }}
        </td>
    </tr>
    @endforeach
</table>
                   
@else
<p>検索結果なし</p>
@endif
    @endsection