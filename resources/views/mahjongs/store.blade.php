<!-- 店舗詳細ページ -->

@extends('mahjongs.layout')

@section('mahjongs.content')

<div class="main mx-3 mt-3">
    <div class="main-inner">
        <div class="frame">
            <div class="store">
                <!-- 店名 -->
                <h1>{{$mahjongs->name}}</h1>
            </div>
            <div class="store-inner">
                <div class="">
                    <p class="fs-3">
                        <span class="text-success">
                            基本情報
                        </span>
                    </p>
                </div>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">住所</th>
                            <td>{{$mahjongs->address}}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{$mahjongs->tel}}</td>
                        </tr>
                        <tr>
                            <th>最寄り駅</th>
                            <td>{{$mahjongs->station}}</td>
                        </tr>
                        <tr>
                            <th>営業時間</th>
                            <td>{{$mahjongs->business_hours}}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-3">
                        @if(Auth::user()->role == 1)
                        <form action="{{route('store.edit')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$mahjongs->id}}">
                            <button type="submit" class="btn btn-outline-primary">編集</button>
                        </form>
                        @endif
                    </div>
                    <div class="col-3">
                        @if(Auth::user()->role == 1)
                        <form action="{{route('store.main')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$mahjongs->id}}">
                            <button type="submit" class="btn btn-outline-primary">削除</button>
                        </form>
                        @endif
                    </div>
                    <div class="col-6"></div>
                </div>
                <p class="fs-3 text-success">
                    口コミ
                </p>
                <table class="">
                    <tr>
                        <td>
                            <ul class="store-review-list list-unstyled border-bottom">
                                @foreach($comments as $key => $value)
                                <li class="style">
                                    <p>
                                        <b>
                                            <form action="{{route('commentdetail')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="comment_id" value="{{$value->id}}">
                                                <button type="submit" class="btn btn-link text-decoration-none text-success">{{$value->title}}</button>
                                            </form>
                                        </b>
                                        <span class="star text-warning">★</span>
                                        <span class="hyouka">{{$value->review}}</span>
                                    </p>
                                    <p class="store-review-list-contents">{{$value->comment}}</p>
                                    <div class="com-good">
                                        <span class="text-danger">オススメ</span>
                                        <p>{{$value->recommended}}</p>
                                    </div>
                                    <div class="com-bad">
                                        <span class="text-primary">気になる点</span>
                                        <p>{{$value->point_of_concern}}</p>
                                    </div>
                                    @if(Auth::user()->role == 1 )
                                    <form action="{{route('store.commentedit')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$value->comment_id}}">
                                        <input type="hidden" name="name" value="{{$value->name}}">
                                        <input type="hidden" name="title" value="{{$value->title}}">
                                        <input type="hidden" name="comment" value="{{$value->comment}}">
                                        <input type="hidden" name="recommended" value="{{$value->recommended}}">
                                        <input type="hidden" name="point_of_concern" value="{{$value->point_of_concern}}">
                                        <input type="hidden" name="review" value="{{$value->review}}">
                                        <button type="submit" class="btn btn-outline-primary">編集</button>
                                    </form>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            <p style="margin:15px 0px 10px; font-size:16px;">
                                <!-- 口コミ投稿ページ遷移 -->
                            <form action="{{route('comment')}}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{$mahjongs->id}}">
                                <button type="submit" class="btn btn-outline-primary">口コミを投稿する</button>
                            </form>
                            </p>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection