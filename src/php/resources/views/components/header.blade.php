<div class="row">
    <nav class="border border-dark navbar p-5 bg-transparent navbar-default" id="navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span> <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <span class="pizapple-logo">
                    <a href="/"> <img class="header-logo" alt="main logo" src="../images/pizapple - MarkMaker Logo.png"
                            href="/" width="300" height="120" /></a>
                </span>
                <span class="navbar-text navbar-right">
                    <a href="{{route('cart')}}" class="navbar-link text-center">ShoppingCart</a>&nbsp;&nbsp;
                    <!--注文履歴は機能実装後ルーティングを追加-->
                    <a href="order_history.html" class="navbar-link">OrderHistory</a>&nbsp;&nbsp;
                    @guest
                    <a href="/login" class="navbar-link">Login</a>&nbsp;&nbsp;
                    @endguest
                    @auth
                    <a href="{{route('logout')}}" class="navbar-link">Logout</a>
                    @endauth
                    <a href="{{route('contact.index')}}" class="navbar-link">ContactUs</a>&nbsp;&nbsp;
                    <!-- <form action="/search" class="form-horizontal"> -->
                    @csrf
                </span>
                <!-- <label for="code" class="control-label col-sm-2">キーワード</label>
                        <input type="text" name="keyword" id="keyword" style="width: 200px; height: 20px" />
                        <span class="text-center" id="serch-bar">
                            <button type="submit" value="検索" class="btn btn-primary">
                                検索
                            </button>
                            <button type="reset" value="クリア" class="btn btn-default">
                                クリア
                            </button>
                        </span>
                    </form> -->
            </div>
        </div>
    </nav>
</div>