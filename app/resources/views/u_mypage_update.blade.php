
@extends('layouts.layout')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('マイページ編集') }}</div>
                <div class="card-body">

                    
                    @method('patch')
                        <!-- 画像を入れる -->
                        
                        <form action="" method="post" enctype="mulitipart/form-data">
                            @csrf
                            <input type="file" name="image">
                            <button>アップロード</button>
                        </form>
                        <!-- <a href="">削除</a>
                        <a href="">追加</a> -->

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
                            <button class="btn btn-outline-primary mx-auto">更新</button>
                            <!-- <a class="btn btn-outline-primary mx-auto" href="{{ route('display.update', ['display' => Auth::user()->id]) }}">保存</a> -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection




