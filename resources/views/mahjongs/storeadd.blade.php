@extends('mahjongs.layout')

@section('mahjongs.content')

<body>
    <h3 class="w-100" style="background-color: #eee;">店舗追加</h3>
    <div class="mx-auto" style="width: 300px;">
        <form action="{{route('store.add')}}" method="post" id="form">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1">エリア</label>
                <select class="form-control" id="tag-id" name="area_id">
                    <option value="1" {{ session('area_id') == 1 ? "selected" : ""  }}>渋谷</option>
                    <option value="2" {{ session('area_id') == 2 ? "selected" : ""  }}>新宿</option>
                    <option value="3" {{ session('area_id') == 3 ? "selected" : ""  }}>池袋</option>
                </select>
            </div>
            <div class="">
                <div class="mb-3">
                    <label for="exampleInputEmail1">店舗</label>
                    @if ($errors->has('name'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <input type="text" name="name" class="form-control" id="name" value="{{ session()->has('name') ? session('name') : old('name')}}" placeholder="店舗名*">
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1">住所</label>
                @if ($errors->has('address'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('address') }}</p>
                @endif
                <input type="text" name="address" class="form-control" id="address" value="{{ session()->has('address') ? session('address') : old('address')}}" placeholder="住所*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">電話番号</label>
                @if ($errors->has('tel'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('tel') }}</p>
                @endif
                <input type="text" name="tel" class="form-control" id="tel" value="{{ session()->has('tel') ? session('tel') : old('tel')}}" placeholder="電話番号*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">最寄り駅</label>
                @if ($errors->has('station'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('station') }}</p>
                @endif
                <input type="text" name="station" class="form-control" id="station" value="{{ session()->has('station') ? session('station') : old('station')}}" placeholder="最寄り駅*">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1">営業時間</label>
                @if ($errors->has('business_hours'))
                <p class="error-message mt-1 text-danger">{{ $errors->first('business_hours') }}</p>
                @endif
                <input type="text" name="business_hours" class="form-control" id="business_hours" value="{{ session()->has('business_hours') ? session('business_hours') : old('business_hours')}}" placeholder="営業時間*">
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
@endsection