<!-- JSの実装追加 -->
<!-- レイアウト修正 -->

<header>
    <nav class="navbar navbar-expand-lg navbar-left bg-left">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="{{(url('/main'))}}">メインページ</a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{(url('/commentall'))}}">口コミ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{(route('header.mypage'))}}">マイページ</a>
                    </li>
                    </li>
                    <li class="nav-item">
                        <!-- ポップアップ追加 -->
                        <a class="nav-link" href="{{route('logout')}}">ログアウト</a>
                    </li>
                    @if(Auth::user()->role == 1)
                    <li class="nav-item">
                        <!-- ポップアップ追加 -->
                        <a class="nav-link" href="{{url('/storecreate')}}">店舗追加</a>
                    </li>
                    @endif
                </ul>
                <!-- <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
            </div>
        </div>
    </nav>
</header>