<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">chat</a></li>
            @foreach($users as $user)
            <li><a href="">{{ $user['name'] }}</a></li>
            @endforeach
            <li><a href="">ログアウト</a></li>
        </ul>
    </nav>
    <h2>マイページ</h2>
<!-- 画像を入れる -->
<a href="">編集</a>
    
</body>
</html>