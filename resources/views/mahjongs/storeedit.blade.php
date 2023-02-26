<!-- 店舗編集ページ -->

@extends('mahjongs.layout')

@section('mahjongs.content')


<form name="form" method="post" action="{{route('edit.main')}}">
    @csrf

    <input type="hidden" name="id" value="{{$store->id}}">
    <div class="store-inner">
        <h2 class="store-title">
            <!-- タイトルデータ持ってくる -->
            {{$store->name}}店
        </h2>
        <div class="mx-auto" style="width:400px;">
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        住所
                    </p>
                </div>
                <div class="col-6">
                    @if ($errors->has('address'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('address') }}</p>
                    @endif
                    <input type="text" name="address" class="form-control" id="address" value="{{ session()->has('address') ? session('address') : $store->address}}" placeholder="名前*">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        電話番号
                    </p>
                </div>
                <div class="col-6">
                    @if ($errors->has('tel'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('tel') }}</p>
                    @endif
                    <input type="text" name="tel" class="form-control" id="tel" value="{{ session()->has('tel') ? session('tel') : $store->tel}}" placeholder="名前*">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        最寄り駅
                    </p>
                </div>
                <div class="col-6">
                    @if ($errors->has('station'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('station') }}</p>
                    @endif
                    <input type="text" name="station" class="form-control" id="station" value="{{ session()->has('station') ? session('station') : $store->station}}" placeholder="名前*">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        営業時間
                    </p>
                </div>
                <div class="col-6">
                    @if ($errors->has('business_hour'))
                    <p class="error-message mt-1 text-danger">{{ $errors->first('business_hour') }}</p>
                    @endif
                    <input type="text" name="business_hours" class="form-control" id="business_hours" value="{{ session()->has('business_hours') ? session('business_hours') : $store->business_hours}}" placeholder="名前*">
                </div>
            </div>
            <div class="d-flex">
                <div class="p-2 w-50">
                    <button type="submit" class="btn btn-outline-primary">保存</button>
                </div>
                <div class="p-2 flex-shrink-1">
                    <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
                </div>
            </div>

        </div>
</form>
@endsection