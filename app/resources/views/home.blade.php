@extends('layouts.layout')

@section('content')
    <form action="">
        <select name="" id="">
            <!-- 名前の部分はリンクにしマイページ表示させる -->
            <option value="">名前</option>
            <option value="">グループ名</option>
        </select>
        <input type="text" placeholder="入力">
        <input type="submit" value="検索">
    </form>
    @endsection