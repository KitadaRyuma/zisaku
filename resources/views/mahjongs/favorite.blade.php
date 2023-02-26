<!-- お気に入りページ -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<div class="wrap">
    <div id="main">
        <div class="mt-3 mx-3">
            <div class="title border-bottom border-danger">
                <h1>お気に入りした口コミ</h1>
            </div>
            <div class="list-reviw mt-4">
                <div class="row border">
                    <div class="col-3 mt-2">
                        <p class="list_review_store">
                            <a href="">店舗名</a>
                        </p>
                    </div>
                    <div class="col-3 mt-2">
                        <p class="list_review_title">
                            <a href="">タイトル</a>
                        </p>
                    </div>
                    <div class="col-3 mt-2">
                        <span class="float: right;">
                            <span class="star">★(評価)</span>
                            [評価:4.0]
                        </span>
                    </div>
                    <div class="col-3 mt-2">
                        <span style="display:inlinebox;">
                            <a href="">[口コミを投稿する]</a>
                        </span>

                    </div>
                </div>
            </div>
            <!-- ページング -->
            <div class="pager"></div>
        </div>
    </div>
</div>
@endsection