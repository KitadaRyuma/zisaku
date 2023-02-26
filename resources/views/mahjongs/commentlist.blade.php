<!-- 口コミ一覧ページ -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<div class="wrap">
    <div id="main">
        <div class="frame">
            <div class="title">
                <h1>雀荘口コミ情報</h1>
            </div>
            <section>
                <div>
                    <!-- データで店舗情報持ってくる -->
                    <div class="list_review">
                        @foreach($mahjongs as $key => $value)
                        <div class="list_review_row1 mt-3 mx-4 border border-4 border-success">
                            <div class="row mt-2 mx-2">
                                <div class="col-4">
                                    <form action="{{route('storelist.store')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$value->id}}">
                                        <button type="submit" class="text-decoration-none btn btn-link">{{$value->name}}</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <form action="{{route('commentdetail')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$value->comment_id}}">
                                        <button type="submit" class="text-decoration-none btn btn-link">{{$value->title}}</button>
                                    </form>
                                </div>
                                <div class="col-4">
                                    <span class="float: right;">
                                        <span class="star">評価：{{$value->review}}</span>
                                    </span>
                                </div>
                            </div>
                            <p></p>
                            <div class="row mt-2 mx-2">
                                <div class="col-6">
                                    <form action="{{route('comment')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$value->store_id}}">
                                        <button type="submit" class="text-decoration-none btn btn-link">[口コミを投稿する]</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="favo" onclick="favorite_ay( {{ $value->comment_id }}, {{ Auth::id() }}, {{ $key }} );">
                                        <?php $index = 0; ?>
                                        @foreach ($favorite as $favokey => $favoval )
                                        @if ($value->comment_id == $favoval->comment_id)
                                        <?php $index++; ?>
                                        @endif
                                        @endforeach
                                        {{$index== 1 ? "★" : "☆" }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- ページング -->
            <div class="row mt-3">
                <div class="col-4"></div>
                <div class="pagination justify-content-between col-4">
                    @for ($i = 0; $i < $count; $i++) <form action="{{route('comentAll')}}" method="post">
                        @csrf
                        <input type="hidden" name="num" value="{{ $i }}">
                        <button type="submit" class="btn btn-outline-primary">{{ $i + 1 }}</button>
                        </form>
                        @endfor
                </div>
                <div class="col-4"></div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection