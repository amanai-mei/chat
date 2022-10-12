<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  

<h2 class='text-center'>チャット</h2>
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
              <a class="btn btn-link d-block" href="{{ route('password.request') }}">
                {{ __('パスワードを忘れた方はこちら') }}
              </a>
            @endif
        
            <div class="text-right text-center">
              <button type="submit" class="btn btn-primary">ログイン</button>
            </div>
            <br>
            <h5 class="text-center">登録はこちら</h5>
            <div class="text-center">
              <a class="btn btn-outline-primary mx-auto" href="{{ route('register') }}">{{ __('アカデミア新規登録') }}</a>
              <br>
              <br>
              <a class="btn btn-outline-primary mx-auto" href="{{ url('register_admin') }}">{{ __('管理者新規登録') }}</a>
              <br>
            </div>
        </form>
        
        <!-- </div> -->
      </nav>
    </div>
  </div>
</div>
</body>
</html>