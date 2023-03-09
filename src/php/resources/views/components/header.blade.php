<div class="container">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span> <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">
                    <!-- 企業ロゴ -->
                    <img alt="main log" src="../images/header_logo.png" height="35" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <p class="navbar-text navbar-right">
                    <a href="{{route('cart')}}" class="navbar-link">ショッピングカート</a>&nbsp;&nbsp;
                    <a href="/cart" class="navbar-link">ショッピングカート</a>&nbsp;&nbsp;
                    <!--注文履歴は機能実装後ルーティングを追加-->
                    <a href="order_history.html" class="navbar-link">注文履歴</a>&nbsp;&nbsp;

                    @guest

                    <a href="/login" class="navbar-link">ログイン</a>&nbsp;&nbsp;
                    @endguest

                    @auth
                    <a href="{{route('logout')}}" class="navbar-link">ログアウト</a>
                    @endauth

                </p>
            </div>
        </div>
    </nav>
</div>