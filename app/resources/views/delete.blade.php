@extends('layouts.layout')
@section('content')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header text-center">{{ __('マイページ') }}</div> -->
                    <div class="card-body">
                        <form class="m-5" method="POST" action="{{ route('admin.update',['admin' => $user_id['id']]) }}" enctype='multipart/form-data'>
                        <!-- <input type="hidden" name="del_flg" value="1"> -->
                            <h4 class="text-center p-4">マイページ</h4>
                            @method('patch')
                            @csrf
                            <!-- 画像貼り付け -->
                            <img class="rounded-circle mx-auto d-block" width="200" height="200" src="{{asset('storage/image/'.$image)}}">
                            <div class="form-group row">
                                <label for="name" class="text-left m-1">{{ __('名前') }}</label>
                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user_id['name'] }}" disabled="disabled">
                                        <!-- @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="text-left m-1">{{ __('メールアドレス') }}</label>
                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user_id['email'] }}" disabled="disabled" >
                                        <!-- @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                </div>
                            </div>
                            <div class="d-flex justify-content-around m-5">
                                <div class="">
                                    <button class="btn btn-outline-primary mx-auto">削除</button>
                                </div>
                                <div>
                                    <a class="btn btn-outline-secondary" href="{{ route('display.index') }}">戻る</a>
                                </div>                    
                            </div>
                        </form>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection




