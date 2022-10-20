
@extends('layouts.layout')
@section('content')
<br>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header text-center">{{ __('マイページ編集') }}</div> -->
                <div class="card-body">
                    <form class="m-5" action="{{ route('display.update', ['display' => Auth::user()->id]) }}" method="POST" enctype="multipart/form-data">
                    <h4 class="text-center p-4">マイページ編集</h4>
                        @method('patch')
                        @csrf
                        <div class="text-center m-3">
                            <input class="" type="file" name="image">
                        </div>

                        <div class="form-group row">
                            <label for="name" class="text-left m-1">{{ __('名前') }}</label>
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_id['name'] }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="text-left m-1">{{ __('メールアドレス') }}</label>
                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_id['email'] }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-around m-5">
                            <div>
                                <button class="btn btn-outline-primary mx-auto">保存</button>
                            </div>
                            <div>
                                <a class="btn btn-outline-secondary" href="{{ route('display.show', ['display' => Auth::user()->id]) }}">戻る</a>
                            </div>
                        </div>
                        </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection




