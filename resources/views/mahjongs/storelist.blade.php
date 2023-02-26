@extends('mahjongs.layout')

@section('mahjongs.content')

<!-- データ取得 -->
<div class="main">
    <div class="main-inner">
        @if($area == 1)
        <div class="search-title fs-1 bg-success">
            <p class="text-light">渋谷</p>
        </div>
        @elseif($area == 2)
        <div class="search-title fs-1 bg-success">
            <p class="text-light">新宿</p>
        </div>
        @else
        <div class="search-title fs-1 bg-success">
            <p class="text-light">池袋</p>
        </div>
        @endif
        <div class="mx-auto mb-5 mt-5" style="width:350px;">
            @foreach($mahjongs as $key => $value)
            <div class="row">
                <div class="col-6">
                    <h2 class="lst-search-name">
                        {{$value->name}}
                    </h2>
                </div>
                <div class="col-6">
                    <form action="{{route('storelist.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$value->id}}">
                        <button type="submit" class="btn btn-outline-primary">詳細</button>
                    </form>
                </div>
                <!-- <div class="col-3"></div>
                <div class="col-3"></div> -->
            </div>
            @endforeach
        </div>
        <!-- ページング -->
        <div class="pager"></div>
    </div>
</div>
@endsection