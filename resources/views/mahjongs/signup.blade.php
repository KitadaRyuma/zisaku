<!-- 新規会員登録 -->

<!-- 新規会員登録テキスト調整 -->

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
    <h3 class="w-100" style="background-color: #eee;">新規会員登録</h3>
    <div class="mx-auto" style="width: 300px;">
        <form action="{{route('mahjongs.signupconfirm')}}" method="post" id="form">
            @csrf
            <div class="">
                <div class="mb-3">
                    <label for="exampleInputEmail1">名前</label>
                    @if ($errors->has('name'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <input type="text" name="name" class="form-control" id="exampleInputName1" value="{{ session()->has('name') ? session('name') : old('name')}}" placeholder="名前*">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">メールアドレス</label>
                @if ($errors->has('email'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('email') }}</p>
                @endif
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" value="{{ session()->has('email') ? session('email') : old('email')}}" placeholder="メールアドレス*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">パスワード</label>
                @if ($errors->has('password'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('password') }}</p>
                @endif
                <input type="text" name="password" class="form-control" id="exampleInputPassword1" value="{{ session()->has('password') ? session('password') : old('password')}}" placeholder="パスワード*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">性別</label><br>
                @if($errors->has('female'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('gender') }}</p>
                @endif
                <input type="radio" name="gender" checked="checked" value="0">男性
                <input type="radio" name="gender" value="1">女性
            </div>
            <!--  タグープルダウン -->
            <div class="mb-3">
                <label for="tag-id">{{ __('住まい') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label><br>
                <select class="form-control" id="tag-id" name="residence">
                    @foreach (Config::get('tag.tag_name') as $key => $val)
                    <option value="{{ $key }}">{{ $val }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex">
                <div class="p-2 w-50"> <button type="submit" class="btn btn-outline-primary">登録</button>
                </div>
                <div class="p-2 flex-shrink-1">
                    <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
                </div>
            </div>
        </form>
    </div>
</body>
<footer>
    <img src="{{ asset('img/mahjongs3.png') }}" class="rounded mx-auto d-block" style="width:350px;" alt="Responsive image">
</footer>
