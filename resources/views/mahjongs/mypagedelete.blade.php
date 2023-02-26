<!-- アカウント削除 -->
@extends('mahjongs.layout')

@section('mahjongs.content')

<div class="">
    <h3 class="w-100" style="background-color: #eee;">アカウント削除</h3>

    <!-- データ取得 -->
    <form method="post" action="">
        @csrf
        <div class="mx-auto" style="width: 400px;">
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label class="" for="name">名前：</label>
                    </div>
                    <div class="col-6">name</div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label class="" for="mail">Email:</label>
                    </div>
                    <div class="col-6">email</div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label class="" for="gender">性別：</label>
                    </div>
                    <div class="col-6">gender</div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-6">
                        <label class="" for="residence">住まい：</label>
                    </div>
                    <div class="col-6">residence</div>
                </div>
            </div>

            <div class="d-flex">
                <div class="p-2 w-50"> <button type="submit" class="btn btn-outline-primary">削除</button>
                </div>
                <div class="p-2 flex-shrink-1">
                    <button type="button" onclick="history.back()" class="btn btn-outline-primary">戻る</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection