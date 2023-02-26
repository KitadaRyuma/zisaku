<!-- パスワード忘れ -->

<!-- パスワード再設定位置調整 -->

<head>
    <meta charset="UTF-8">
    <title>雀荘 まとめ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- @yield('css') -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>

<body>
    <h3 class="w-100" style="background-color: #eee;">パスワード再設定</h3>
    <div class="mx-auto" style="width: 300px;">
        <form action="{{route('password.login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1">メールアドレス</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="メールアドレス*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">パスワード</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="パスワード*">
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-outline-primary">送信</button><br>
            </div>
            <div class="d-grid gap-2 col-6 mx-auto">
                <div class="mod-link">
                    <a href="{{(url('/login'))}}">＞ログインに戻る</a>
                </div>
            </div>
        </form>
    </div>
</body>
<footer>
    <img src="{{ asset('img/mahjongs3.png') }}" class="rounded mx-auto d-block" style="width:350px;" alt="Responsive image">
</footer>
