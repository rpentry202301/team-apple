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

    <!-- table -->
    <div class="row">
      <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
        <h3 class="text-center">ショッピングカート</h3>
        @if(count($items) == 0)
        <p><strong>カートに商品が存在しません</strong></p>
        @else
        <table class="table table-striped item-list-table">
          <tbody>
            @foreach($items as $item)
            <tr>
            </tr>
            <tr>
              <td>
                <div class="center">
                  <img src="../images/1.jpg" class="img-responsive img-rounded item-img-center" width="100"
                    height="300" /><br />
                  {{$item->item->name}}
                </div>
              </td>
              <td>
                <span class="price">&nbsp;{{$item->size}}</span>&nbsp;&nbsp;{{$item->order_price ? $item->order_price : 'No topping'}}円
                &nbsp;&nbsp;{{$item->quantity}}個
              </td>
              <td>
                <ul class="list-unstyled">
                  @foreach($item->cartToppings as $cartTopping)
                  <li>{{ $cartTopping->topping ? $cartTopping->topping->name : 'No topping' }}</li>
                </ul>
              <td>
                <div class="text-center">{{$cartTopping->total_topping_price}}円</div>
                @endforeach
              </td>
              </td>
              <td>
                <form method="POST" action="{{route('cart.delete')}}">
                  @csrf
                  <div class="text-center">
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <button type="submit" class="btn btn-primary">削除</button>
                  </div>
                </form>
              </td>
            </tr>
          </tbody>
          @endforeach
        </table>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-offset-2 col-xs-8">
        <div class="form-group text-center">
          <span id="total-price">消費税：{{$tax}}円</span><br />
          <span id="total-price">ご注文金額合計：{{$total_price}}円 (税込)</span>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-offset-5 col-xs-3">
        <div class="form-group">
          <form action="{{route('order.confirm')}}">
            <input class="form-control btn btn-warning btn-block" type="submit" value="注文に進む" />
          </form>
        </div>
      </div>
    </div>
    @endif

  </div>
  <!-- end container -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script> --}}
</body>

</html>