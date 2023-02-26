<!-- マイページ -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<div class="mt-3 mx-3">
    <h3>マイページ</h3>

    <!-- データ取得 -->
    <form method="post" action="">
        @csrf
        <div class="row mt-3">
            <label class="col-sm-2 control-label" for="name">名前：</label>
            <div class="col-sm-10">{{$mahjongs['name']}}</div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 control-label" for="email">Email:</label>
            <div class="col-sm-10">{{$mahjongs['email']}}</div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 control-label" for="gender">性別：</label>
            @if($mahjongs['gender'] == 0)
            <div class="col-sm-2">男性</div>
            @else
            <div class="col-sm-2">女性</div>
            @endif
            <div class="col-sm-8"></div>
        </div>
        <div class="row mt-3">
            <label class="col-sm-2 control-label" for="residence">住まい：</label>
            @foreach (Config::get('tag.tag_name') as $key => $val)
            @if($key == $mahjongs['residence'])
            <div class="col-sm-2">{{ $val }}</div>
            <div class="col-sm-8"></div>
            @endif
            @endforeach
        </div>

        <h5 class="mt-4 border-bottom border-primary">過去の口コミ</h5>
        <div class="list-reviw">
            @foreach($comments as $key => $value)
            <div class="row border">
                <div class="col-4 mt-2">
                    <p>{{$value->name}}</p>
                </div>
                <div class="col-4 mt-2">
                    <form action="{{route('commentdetail')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$value->comment_id}}">
                        <button type="submit" class="text-decoration-none btn btn-link">{{$value->title}}</button>
                    </form>
                </div>
                <div class="col-4 mt-2">
                    <span class="float: right;">
                        <span class="star">評価：{{$value->review}}</span>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        <h5 class="mt-4 border-bottom border-danger">お気に入りした口コミ</h5>
        <div class="list-reviw">
            @foreach($favorite_comments as $key => $value)
            <div class="row border">
                <div class="col-4 mt-2">
                    <form action="{{route('commentdetail')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$value->comment_id}}">
                        <button type="submit" class="text-decoration-none btn btn-link">{{$value->title}}</button>
                    </form>
                </div>
                <div class="col-4 mt-2">
                    <span class="float: right;">
                        <span class="star">評価：{{$value->review}}</span>
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        <button type="button" class="btn btn-link"><a href="{{route('mypage.mypageedit')}}">アカウント編集</a></button>
        <button type="button" class="btn btn-link"><a href="{{route('mypage.delete')}}">退会</a></button>
    </form>
</div>
@endsection