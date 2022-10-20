<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- <title>{{ config('app.name', 'chat') }}</title> -->
        <title>chat</title>

        <!-- CSS -->
        <link href="css/style.css" rel="stylesheet">

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
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div id="app" class="d-flex">
                <div class="">
                    <a class="navbar-brand" style="font-size:40px;" href="{{ url('/display') }}">
                        chat
                    </a>
                </div>
                <div class="d-flex align-self-center col-md-8">
                        @if(Auth::check())
                            <span class="my-navbar-item"><a style="text-decoration:none;" href="{{ route('display.show', ['display' => Auth::user()->id]) }}">{{ Auth::user()->name}}</a></span>
                         
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="text-secondary" style="border: none; background: none;">ログアウト</button>
                        </form>
                        <script>
                        document.getElementById('logout').addEventListener('click', function(event) {
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                        </script>
                    @else
                    <a class="" href="{{ route('login') }}">ログイン</a>
                    <a class="" href="{{ route('register') }}">会員登録</a>
                    @endif   
                </div>            
            </div>
        </nav>
        @yield('content')
    </body>
</html>