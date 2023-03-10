<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ピザ屋のネット注文</title>
  <link href="../css/bootstrap.css" rel="stylesheet" />
  <link href="../css/piza.css" rel="stylesheet" />
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="item_list_pizza.html">
            <!-- 企業ロゴ -->
            <img alt="main log" src="../images/header_logo.png" height="35" />
          </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <p class="navbar-text navbar-right">
            <a href="cart_list.html" class="navbar-link">ショッピングカート</a>&nbsp;&nbsp;
            <a href="order_history.html" class="navbar-link">注文履歴</a>&nbsp;&nbsp;
            <a href="login.html" class="navbar-link">ログイン</a>&nbsp;&nbsp;
            <a href="item_list_pizza.html" class="navbar-link">ログアウト</a>
          </p>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
    </nav>

    @include('components.cart_list')

    @section('content')
    @component('components.cart_list', [
    'items' => $items,
    'toppings' => $toppings
    ])
    @endcomponent
    @endsection

    <div class="row">
      <div class="col-xs-offset-5 col-xs-3">
        <div class="form-group">
          <form action="{{route('order.confirm')}}">
            <input class="form-control btn btn-warning btn-block" type="submit" value="注文に進む" />
          </form>
        </div>
      </div>
    </div>

  </div>
  <!-- end container -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script> --}}
</body>

</html>