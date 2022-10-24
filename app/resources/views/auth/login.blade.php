<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>chat</title>
  
  <!-- CSS -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->

  <!-- Scripts bootstrap -->
  <script src="{{ asset('js/app.js') }}" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles bootstrap -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  @yield('stylesheet')
</head>

<body>
  <!-- フラッシュメッセージ -->
  @if (session('flash_message'))
            <div class="flash_message alert alert-primary m-2 text-center">
                {{ session('flash_message') }}
            </div>
        @endif

        <main class="mt-4">
            @yield('content')
        </main>
  <h2 class='text-center'></h2>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <!-- <div class="card-header text-center">ログイン</div> -->
            <div class="card-body">
              @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              @endif
              </div>
            
              <form action="{{ route('login') }}" method="POST">
                <h4 class="text-center p-4 border-top border-bottom m-5">ログイン</h4>
                  @csrf
                  <div class="form-group px-5 m-3">
                    <!-- <label for="email">メールアドレス</label> -->
                    <input type="text" class="form-control border-0 border-bottom" id="email" name="email" value="{{ old('email') }}" placeholder="メールアドレス"/>
                  </div>

                  <div class="form-group px-5 m-3">
                    <!-- <label for="password">パスワード</label> -->
                    <input type="password" class="form-control border-0 border-bottom" id="password" name="password" placeholder="パスワード"/>
                  </div>

                    @if (Route::has('password.request'))
                      <a class="btn btn-link d-block" style="text-decoration:none;" href="{{ route('password_reset.email.form') }}">
                        {{ __('パスワードを忘れた方はこちら') }}
                      </a>
                    @endif
                
                    <div class="text-right text-center">
                      <button type="submit" class="btn btn-secondary">ログイン</button>
                    </div>
                    
                    <h5 class="text-center mt-5">登録はこちらから</h5>
                    <div class="text-center mb-2">
                      <a class="btn btn-outline-secondary m-1" href="{{ route('register') }}">{{ __('アカデミア新規登録') }}</a>
                    </div>
                    <div class="text-center">
                      <a class="btn btn-outline-secondary mb-5" href="{{ url('register_admin') }}">{{ __('管理者新規登録') }}</a>
                    </div>
              </form>
            </div>
          <!-- </div> -->
        </nav>
      </div>
    </div>
  </div>
</body>
<style>
  body{
        font-family: 'ヒラギノ丸ゴ ProN','Hiragino Maru Gothic ProN',sans-serif;
    }
</style>
</html>