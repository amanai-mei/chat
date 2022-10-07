
@extends('layouts.layout')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('マイページ編集') }}</div>
                <div class="card-body">
                    <form action="{{ route('display.update', ['display' => Auth::user()->id]) }}" method="POST" enctype="mulitipart/form-data">
                        @method('patch')
                        @csrf
                        <!-- 画像を入れる -->
                        
                        
                            <input type="file" name="image">
                            <button>アップロード</button>
                        

                        
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('画像') }}</label>
                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $user_id['image'] }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_id['name'] }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_id['email'] }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="text-center">
                            <button class="btn btn-outline-primary mx-auto">保存</button>
                            <!-- <a class="btn btn-outline-primary mx-auto" href="{{ route('display.update', ['display' => Auth::user()->id]) }}">保存</a> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




