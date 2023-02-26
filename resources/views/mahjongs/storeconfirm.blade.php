@extends('mahjongs.layout')

@section('mahjongs.content')

<h3 class="w-100" style="background-color: #eee;">店店舗確認画面</h3>
<div class="mx-auto" style="width:400px;">
    <form action="{{route('store.confirm')}}" method="post" class="form">
        @csrf
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="area_id">エリア：</label>
                </div>
                @if($inputs['area_id'] == 1)
                <div class="col-6">渋谷</div>
                @elseif($inputs['area_id'] == 2)
                <div class="col-6">新宿</div>
                @else
                <div class="col-6">池袋</div>
                @endif
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="name">店舗</label>
                </div>
                <div class="col-6">{{ $inputs['name'] }}</div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="address">住所:</label>
                </div>
                <div class="col-6">{{ $inputs['address'] }}</div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="tel">電話番号</label>
                </div>
                <div class="col-6">{{ $inputs['tel'] }}</div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="station">最寄り駅</label>
                </div>
                <div class="col-6">{{ $inputs['station'] }}</div>
            </div>
        </div>
        <div class="mb-3">
            <div class="row">
                <div class="col-6">
                    <label class="" for="business_hours">営業時間</label>
                </div>
                <div class="col-6">{{ $inputs['business_hours'] }}</div>
            </div>
        </div>
</div>
<input type="hidden" name="area_id" value="{{ $inputs['area_id'] }}">
<input type="hidden" name="name" value="{{ $inputs['name'] }}">
<input type="hidden" name="address" value="{{ $inputs['address'] }}">
<input type="hidden" name="tel" value="{{ $inputs['tel'] }}">
<input type="hidden" name="station" value="{{ $inputs['station'] }}">
<input type="hidden" name="business_hours" value="{{ $inputs['business_hours'] }}">

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
@endsection