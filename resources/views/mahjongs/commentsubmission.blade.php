<!-- 口コミ投稿 -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<!-- 口コミ投稿サイト調べる -->
<form name="form" method="post" action="{{route('comment.main')}}">
    @csrf
    <input type="hidden" name="store_id" value="{{$mahjongs}}">
    <div class="store-inner mt-3 mx-3">
        <h2 class="store-title">
            <!-- タイトルデータ持ってくる -->
            口コミを投稿
        </h2>
        <div class="mx-auto" style="width:400px;">
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        タイトル
                    </p>
                </div>
                <div class="col-6">
                    <input type="text" name="title" id="review-title">
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        コメント
                    </p>
                </div>
                <div class="col-6">
                    <textarea name="comment" rows="4"></textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        ここがオススメ
                    </p>
                </div>
                <div class="col-6">
                    <textarea name="recommended" rows="3"></textarea>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-6">
                    <p class="review-form-head">
                        気になる点
                    </p>
                </div>
                <div class="col-6">
                    <textarea name="point_of_concern" rows="3"></textarea>
                </div>
            </div>
            <!-- 評価★ボタン -->
            <div class="row mb-4">
                <div class="col-6">
                    <p>総合評価</p>
                </div>
                <!-- ↓☆評価ボタン処理 -->
                <div class="col-6">
                    <!-- 画像挿入　ボタン -->
                    <div>
                        <label for="volume">1</label>
                        <input type="range" id="volume" name="review" min="1" max="5">
                        <label for="volume">5</label>
                    </div>
                </div>
            </div>
            <div class="d-flex">
            <div class="p-2 w-50">
                <button type="submit" class="btn btn-outline-primary">登録する</button>
            </div>
            <div class="p-2 flex-shrink-1">
                <button type="button" class="btn btn-outline-primary" onclick="history.back()">戻る</button>
            </div>
        </div>
        </div>
    </div>
    </div>
</form>
@endsection