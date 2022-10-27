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

    <body class="">
        <div class="container mt-5 p-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card Regular shadow">
                        <div class="card-body">
                            <form class="m-5" method="POST" action="{{ route('register') }}">
                                <h4 class="text-center p-4 border-top border-bottom mb-5">管理者新規登録</h4>
                                @csrf
                                <input type="hidden" name="role" value="1">

                                <div class="form-group row">
                                    <label for="name" class="text-left m-1">{{ __('名前') }}</label>
                                    <div class="">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="text-left m-1">{{ __('パスワード') }}</label>
                                    <div class="">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="text-left m-1">{{ __('確認') }}</label>
                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            
                                <div class="d-flex justify-content-around m-5">
                                    <div>
                                        <a class="btn btn-secondary" href="{{ url('/') }}">戻る</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('登録') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div> 
    </body>
    <style>
  body{
        font-family: 'ヒラギノ丸ゴ ProN','Hiragino Maru Gothic ProN',sans-serif;
        background-color: #f0f8ff;
    }
</style>
</html>