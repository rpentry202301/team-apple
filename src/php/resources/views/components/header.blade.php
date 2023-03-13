<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header" style="display:inline-block;vertical-align:middle;">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="display:inline-block;vertical-align:middle;">
                    <!-- 企業ロゴ -->
                    <img alt="main log" src="../images/header_logo.png" height="35" />
                </a>
            </div>
            <div class="navbar-right" style="display:inline-block;vertical-align:middle;">
                <p class="navbar-text">
                    <!-- カテゴリー検索 -->
                    <span class="text-center">
                    <span class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <span class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto">
                                <form class="form-inline" method="GET" action="{{ route('top') }}">
                                    @csrf
                        <span class="input-group">
                            {{-- <span class="input-group-prepend"> --}}
                                <select class="custom-select" name="category">
                                    <option value="" selected>カテゴリー検索</option>
                                @foreach ($categories as $category)
                                    <option value="primary:{{$category->id}}" class="font-weight-bold" {{ $defaults['category'] == "primary:" . $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                    @foreach ($category->secondaryCategories as $secondary)
                                <option value="secondary:{{$secondary->id}}" {{ $defaults['category'] == "secondary:" . $secondary->id ? 'selected' : ''}}> {{$secondary->name}}</option>
                                @endforeach
                                @endforeach
                            </select>
                        </span>
                        {{-- </span> --}}
                        <!--キーワード検索-->
                        <input type="text" name="keyword" class="form-control" aria-label="Text input with dropdown button" placeholder="キーワード検索">
                        {{-- <input type="text" name="keyword" class="form-control" value="{{$defaults['keyword']}}" aria-label="Text input with dropdown button" placeholder="キーワード検索">                         --}}
                        {{-- <span class="input-group-append"> --}}
                            <button type="submit" class="btn btn-outline-dark">検索<i class="fas fa-search"></i></button>
                            <button type="reset" value="クリア" class="btn btn-default">クリア <i class="fas fa-search"></i></button>
                            </span>
                        </span>
                    </span>
                </span>
                <span></span>                 
            </form>
        </ul>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <p class="navbar-text navbar-right">
                        <a href="{{route('cart')}}" class="navbar-link">ショッピングカート</a>&nbsp;&nbsp;
                        <!--注文履歴は機能実装後ルーティングを追加-->

                    <a href="order_history.html" class="navbar-link">注文履歴</a>&nbsp;&nbsp;

                    @guest

                    <a href="/login" class="navbar-link">ログイン</a>&nbsp;&nbsp;
                    @endguest

                    @auth
                    <a href="{{route('logout')}}" class="navbar-link">ログアウト</a>
                    @endauth
                    <a href="{{route('contact.index')}}" class="navbar-link">お問い合わせ</a>&nbsp;&nbsp;

                </p>
            </div>
        </div>
    </nav>
</div>