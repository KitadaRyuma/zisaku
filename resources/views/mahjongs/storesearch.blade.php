<!-- 店舗検索結果ページ -->
@extends('mahjongs.layout')

@section('mahjongs.content')

<!-- データ取得 -->
<div class="main">
    <div class="main-inner">
        <form action="{{route('search')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-6">
                    <input type="text" name="search" class="form-control" id="storesearch" placeholder="店舗検索">
                </div>
                <div class="col-6">
                    <button class="btn btn-outline-success" type="submit">検索</button>
                </div>
            </div>
        </form>
        <div class="lst-search">
            @foreach($mahjongs as $key => $value)
            <div class="row">
                <div class="col-3">
                    <h2 class="lst-search-name">
                        {{$value->name}}
                    </h2>
                </div>
                <div class="col-3">
                    <form action="{{route('storelist.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$value->id}}">
                        <button type="submit" class="btn btn-outline-primary">詳細</button>
                    </form>
                </div>
                <div class="col-3"></div>
                <div class="col-3"></div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection