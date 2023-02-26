<!-- 口コミ詳細ページ -->
@extends('mahjongs.layout')

@section('mahjongs.content')
<form name="form" method="post" action="">
    @csrf
    <div class="wrap">
        <div id="main">
            <div class="frame mt-3 mx-3">
                <!-- データ持ってくる -->
                <div class="store-inner">
                    <h1><a href="" class="text-decoration-none">{{$comments->name}}</a></h1>
                </div>
                <div class="review-detail">
                    <h2 class="store-title text-success border-bottom border-success">{{$comments->title}}</h2>
                    <p class="review-com">{{$comments->comment}}</p>
                    <div class="row border border-dark">
                        <div class="review-gb col-6 text-center border-end">
                            <div class="review-gb-head border-bottom text-primary">ここがオススメ</div>
                            <div class="review-gb-com">{{$comments->recommended}}</div>
                        </div>
                        <div class="col-6 text-center">
                            <div class="review-gb-head border-bottom text-danger">気になる点</div>
                            <div class="review-gb-com">{{$comments->point_of_concern}}</div>
                        </div>
                    </div>
                </div>
                <div class="comprehensive evaluation row mt-4">
                    <div class="col-6 text-center">
                        <p class="review-head fs-4">総合評価</p>
                    </div>
                    <div class="col-6 ">
                        <!-- ☆の機能つける -->
                        <p class="review-hyouka fs-4">
                            <span class="star text-warning">{{$comments->review}}</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="row">
    <div class="col-3">
        @if(Auth::id() == $user_comment->user_id || Auth::user()->role == 1)
        <form action="{{route('store.commentedit')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$comments->comment_id}}">
            <input type="hidden" name="name" value="{{$comments->name}}">
            <input type="hidden" name="title" value="{{$comments->title}}">
            <input type="hidden" name="comment" value="{{$comments->comment}}">
            <input type="hidden" name="recommended" value="{{$comments->recommended}}">
            <input type="hidden" name="point_of_concern" value="{{$comments->point_of_concern}}">
            <input type="hidden" name="review" value="{{$comments->review}}">
            <button type="submit" class="btn btn-outline-primary">編集</button>
        </form>
        @endif
    </div>
    <div class="col-3">
        @if(Auth::id() == $user_comment->user_id || Auth::user()->role == 1)
        <form action="{{route('comment.delete')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$comments->comment_id}}">
            <input type="hidden" name="name" value="{{$comments->name}}">
            <input type="hidden" name="title" value="{{$comments->title}}">
            <input type="hidden" name="comment" value="{{$comments->comment}}">
            <input type="hidden" name="recommended" value="{{$comments->recommended}}">
            <input type="hidden" name="point_of_concern" value="{{$comments->point_of_concern}}">
            <input type="hidden" name="review" value="{{$comments->review}}">
            <button type="submit" class="btn btn-outline-primary">削除</button>
        </form>
        @endif
    </div>
    <div class="col-6"></div>
</div>
@endsection