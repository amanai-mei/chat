@extends('layouts.layout')

@section('content')
<br>
<br>
<h3 class="text-center mb-5">検索結果</h3>

<div class="search text-center">
<form method="GET" action="{{ route('searchUser') }}">
    @csrf
    <input  style="width:500px; height:38px;" type="search" placeholder="アカデミア生の検索" name="search" value="@if (isset($search)) {{ $search }} @endif" required>
    <button type="submit" class="btn btn-outline-dark mb-1" style="background-color:white;">検索</button>


</form>
@if($users->total() !== 0)
<div class="d-flex flex-row justify-content-center mt-5">
    @foreach($users as $image)
    @if($image['role']  == 0 && $image['del_flg'] == 0 &&  Auth::id() !== $image['id'])
    <div class="card m-3 p-3 Regular shadow" style="">
        @if($image['image'])
        <div class="card-body">
            <img class="rounded-circle mx-auto d-block p-4" width="200" height="200" src="{{ asset('storage/image/'.$image['image']->image) }}">
            <h5>{{ $image['name'] }}</h5>
        </div>
        @else
        <div class="card-body">
            <img class="mx-auto d-block p-4" width="210" height="200" src="/images/noimage.jpeg">
        <h5>{{ $image['name'] }}</h5>
        </div>
        @endif
        <a class="btn btn-outline-info mb-4" href="{{ route('userchat.show', ['userchat' => $image['id']]) }}">
            チャットする
        </a>    
    </div>
    @endif
    @endforeach

</div>
                   
@else
<p class="mt-5">検索結果はありません。</p>
@endif
    @endsection