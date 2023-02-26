<!-- 新規会員登録確認画面 -->

<!-- 確認画面テキスト位置調整 -->

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

<h3 class="w-100" style="background-color: #eee;">確認画面</h3>
<div class="mx-auto" style="width:400px;">
  <form action="{{route('signup.login')}}" method="post" class="form">
    @csrf
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label class="" for="name">名前：</label>
        </div>
        <div class="col-6">{{ $inputs['name'] }}</div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label class="" for="mail">Email:</label>
        </div>
        <div class="col-6">{{ $inputs['email'] }}</div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label class="" for="password">パスワード：</label>
        </div>
        <div class="col-6">{{ $inputs['password'] }}</div>
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label class="" for="gender">性別：</label>
        </div>
        @if($inputs['gender'] == 0)
        <div class="col-6">男性</div>
        @else
        <div class="col-6">女性</div>
        @endif
      </div>
    </div>
    <div class="mb-3">
      <div class="row">
        <div class="col-6">
          <label class="" for="residence">住まい：</label>
        </div>
        @foreach (Config::get('tag.tag_name') as $key => $val)
        @if($key == $inputs['residence'])
        <div class="col-6">{{ $val }}</div>
        @endif
        @endforeach
      </div>
    </div>
    <input type="hidden" name="name" value="{{ $inputs['name'] }}">
    <input type="hidden" name="email" value="{{ $inputs['email'] }}">
    <input type="hidden" name="password" value="{{ $inputs['password'] }}">
    <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
    <input type="hidden" name="residence" value="{{ $inputs['residence'] }}">


    <div class="d-flex">
      <div class="p-2 w-50"> <button type="submit" class="btn btn-outline-primary">登録</button>
      </div>
      <div class="p-2 flex-shrink-1">
        <button type="button" onclick="history.back()" class="btn btn-outline-primary">戻る</button>
      </div>
    </div>
    <!-- </div> -->
  </form>
</div>
<footer>
  <img src="{{ asset('img/mahjongs3.png') }}" class="rounded mx-auto d-block" style="width:350px;" alt="Responsive image">
</footer>