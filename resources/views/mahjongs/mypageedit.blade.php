<!-- アカウント編集 -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<body>
    <h3 class="w-100" style="background-color: #eee;">アカウント編集画面</h3>
    <div class="mx-auto" style="width: 300px;">
        <form action="{{route('mypageedit.main')}}" method="post" id="form">
            @csrf
            <div class="">
                <div class="mb-3">
                    <label for="name">名前</label>
                    @if ($errors->has('name'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <input type="name" name="name" class="form-control" id="name" value="{{ session()->has('name') ? session('name') : $user['name']}}" placeholder="名前*">
                </div>
            </div>
            <div class="mb-3">
                <label for="email">メールアドレス</label>
                @if ($errors->has('email'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('email') }}</p>
                @endif
                <input type="email" name="email" class="form-control" id="email" value="{{ session()->has('email') ? session('email') : $user['email']}}" placeholder="メールアドレス*">
            </div>
            <div class="mb-3">
            </div>
            <div class="mb-3">
                <label for="gender">性別</label><br>
                @if($errors->has('gender'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('gender') }}</p>
                @endif
                <input type="radio" name="gender" id="gender" value="0" {{ $user['gender'] == 0 ? "checked" : "" }}>男性
                <input type="radio" name="gender" id="gender" value="1" {{ $user['gender'] == 1 ? "checked" : "" }}>女性
            </div>
            <!--  タグープルダウン -->
            <div class="mb-3">
                <label for="residence">{{ __('住まい') }}<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label><br>
                <select class="form-control" id="residence" name="residence">
                    @foreach (Config::get('tag.tag_name') as $key => $val)
                    <option value="{{ $key }}" {{ $user['residence'] == $key ? "selected" : ""  }}>{{ $val }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex">
                <div class="p-2 w-50"> <button type="submit" class="btn btn-outline-primary">保存</button>
                </div>
                <div class="p-2 flex-shrink-1">
                    <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
                </div>
            </div>
        </form>
    </div>
</body>
@endsection