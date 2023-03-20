<div class="row">
    <nav class="border border-dark navbar p-5 bg-transparent navbar-default" id="navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header" style="height: 100px">
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
                            href="/" width="250" height="120" /></a>
                </span>

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
                                        {{-- <option value="primary:{{$category->id}}" class="font-weight-bold" {{ $defaults['category'] == "primary:" . $category->id ? 'selected' : ''}}>{{$category->name}}</option> --}}
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
    

                <span class="navbar-text navbar-right">
                    <!--注文履歴は機能実装後ルーティングを追加-->
                    @guest
                    <span style="background:none; border:none; color: red"><i class="fas fa-sign-in-alt"></i></span>
                    <a href="/login" class="navbar-link" style="margin-right: 80px">Login</a>&nbsp;&nbsp;
                    <span style="background:none; border:none; color: red"><i class="fas fa-envelope"></i></span>
                    <a href="{{route('contact.index')}}" class="navbar-link">ContactUs</a>&nbsp;&nbsp;
                    @endguest
                    @auth
                    <span style="background:none; border:none; color: red"><i class="fas fa-shopping-cart"></i></span>
                    <a href="{{route('cart')}}" class="navbar-link text-center">ShoppingCart</a>&nbsp;&nbsp;
                    <span style="background:none; border:none; color: red"><i class="fas fa-envelope"></i></span>
                    <a href="{{route('contact.index')}}" class="navbar-link">ContactUs</a>&nbsp;&nbsp;
                    <span style="background:none; border:none; color: red"><i class="fas fa-sign-out-alt"></i></span>
                    <a href="{{route('logout')}}" class="navbar-link">Logout</a>
                    @endauth
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