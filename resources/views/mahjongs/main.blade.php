<!-- メインページ -->
@extends('mahjongs.layout')

@section('mahjongs.content')

<body>
    <div class="p-4">
        <section class="store_list">
            <div class="mt-3">
                <div class="row">
                    <div class="col">
                        <h2>店舗一覧</h2>
                    </div>
                    <div class="col">
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
                    </div>
                </div>
            </div>
            <!-- 店舗一覧 -->
            <div class="mx-4">
                <div class="row">
                    <div class="col-4">
                        <form action="{{ route('main.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="store" value="1">
                            <button type="submit" class="btn btn-outline-primary">渋谷</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <form action="{{ route('main.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="store" value="2">
                            <button type="submit" class="btn btn-outline-primary">新宿</button>
                        </form>
                    </div>
                    <div class="col-4">
                        <form action="{{ route('main.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="store" value="3">
                            <button type="submit" class="btn btn-outline-primary">池袋</button>
                        </form>
                    </div>
                </div>
            </div>

        </section>

        <section>
            <div>
                <!-- 口コミ一覧 -->
                <div class="comment_list">
                    <div class="mt-3">
                        <a href=""></a>
                        <h2>口コミ一覧</h2>
                    </div>
                    <!-- データで店舗情報持ってくる -->
                    <div class="list_review">
                        @foreach($mahjongs as $key => $value)
                        <div class="list_review_row1 mt-3 mx-2 border border-4 border-success">
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
                            <div class="row mx-2">
                                <div class="col-6">
                                    <form action="{{route('comment')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$value->store_id}}">
                                        <button type="submit" class="text-decoration-none btn btn-link">[口コミを投稿する]</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <!-- お気に入り機能 -->
                                    <button type="button" class="favo" onclick="favorite_ay( {{ $value->comment_id }}, {{ Auth::id() }}, {{ $key }} );">
                                        <?php $index = 0; ?>
                                        @foreach ($favorite as $favokey => $favoval)
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
                        <div class="list_review_more">
                            <div class="text-end">
                                <div class="mt-5 mx-5">
                                    <a href="{{(url('/commentall'))}}">もっと見る…</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>
</body>
@endsection