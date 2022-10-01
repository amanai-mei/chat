@extends('layouts.layout')
@section('content')
<h2>チャット</h2>
<div class="container">
  <div class="row justify-content-center">
    <div class="col col-md-offset-3 col-md-6">
      <nav class="card mt-5">
        <!-- <div class="card-header">ログイン</div> -->

        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
              @foreach($errors->all() as $message)
                <p>{{ $message }}</p>
              @endforeach
            @endif
        </div>

        <form action="{{ route('login') }}" method="POST">
          @csrf
          <div class="form-group">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />
          </div>

          <div class="form-group">
            <label for="password">パスワード</label>
            <input type="password" class="form-control" id="password" name="password" />
          </div>

            @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('パスワードを忘れた方はこちら') }}
              </a>
            @endif
        
            <div class="text-right">
              <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
            
            <br>
            <h3>登録はこちら</h3>
            <a class="nav-link" href="{{ route('register') }}">{{ __('アカデミア新規登録') }}</a>
            <br>
            <a class="nav-link" href="{{ route('register') }}">{{ __('管理者新規登録') }}</a>
        </form>

        <!-- </div> -->
      </nav>
    </div>
  </div>
</div>
@endsection