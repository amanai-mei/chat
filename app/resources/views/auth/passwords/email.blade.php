<!-- パスワードを忘れた方はこちらをクリックするとここに遷移 -->
@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header">{{ __('パスワードリセット') }}</div> -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="m-5" method="POST" action="{{ route('password.email') }}">
                            <h4 class="text-center p-4">パスワードリセット</h4>
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="text-left m-0">{{ __('メールアアドレス') }}</label>
                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>                               
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="mt-5 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('送信') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
