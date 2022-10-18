@extends('layouts.layout')
@section('content')
<!-- フラッシュメッセージ -->
        @if (session('flash_message'))
            <div class="flash_message alert alert-primary m-2 text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <!-- <div class="card-header text-center">{{ __('マイページ') }}</div> -->
                    <div class="card-body">
                        <form class="m-5" method="POST" action="{{ route('register') }}" enctype='multipart/form-data'>
                            <h4 class="text-center p-4">マイページ</h4>
                            @csrf
                            <!-- 画像貼り付け -->
                                    <img class="rounded-circle mx-auto d-block" width="200" height="200" src="{{ asset('storage/image/'.$image) }}">
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
                            <div class="text-center pb-3 pt-3">
                                <a class="btn btn-outline-primary mx-auto" href="{{ route('display.edit', ['display' => Auth::user()->id]) }}">編集</a>
                            </div>
                        </form>
                    </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
</div>
@endsection




