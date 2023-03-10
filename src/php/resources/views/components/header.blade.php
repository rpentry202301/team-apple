{{--
<div class="row">
    <nav class="border border-dark navbar p-5 bg-transparent navbar-light" id="navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <!-- 企業ロゴ -->
                    <img class="" alt="main log" src="../images/logo.png" width="100" height="100" />
                </a>
            </div>
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
</div> --}}



<nav class="border border-dark navbar p-5 bg-transparent navbar-light" , style="background:rgba(255,255,255,1);"
    id="navi">
    <img class="float-left" alt="main log" src="../images/logo.png" width="100" height="100" />
    <span class="text text-dark" , style="font-family: Hannotate SC;"><i class="fas fa-calendar"></i>pizapple</span>
    <div class="container-fluid">

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