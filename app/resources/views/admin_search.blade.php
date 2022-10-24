@extends('layouts.layout')
@section('content')
<br>
<br>
<h3 class="text-center mb-5">検索結果</h3>

<div class="search text-center">
<form method="GET" action="{{ route('searchAdmin') }}">
    @csrf
    <input  style="width:500px; height:38px;" type="search" placeholder="アカデミア生の検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
    <button type="submit" class="btn btn-outline-dark mb-1">検索</button>


</form>
@if($users->total() !== 0)
<div class="d-flex flex-row justify-content-center mt-5">
    @foreach($users as $user)
    @if($user['role'] == 0 && $user['id'] != Auth::user()->id && $user['del_flg'] == 0)
    <div class="card m-3 p-3" style="">
        <div class="card-body">
        <h5>{{ $user['name'] }}</h5>
    </div>

    <a class="btn btn-outline-info" href="{{ route('admin.show', ['admin' => $user['id']]) }}">
            ユーザー詳細
        </a>    
    </div>
    @endif
    @endforeach

</div>
                   
@else
<p class="mt-5">検索結果はありません。</p>
@endif
    @endsection