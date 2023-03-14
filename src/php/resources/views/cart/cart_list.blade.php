@extends('layouts.app')

@section('title')
カートリスト
@endsection

@section('content')
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
    'toppings' => $toppings,
    'tax' => $tax,
    'total_price' => $total_price
    ])
    @endcomponent
    <div class="row">
      <div class="col-xs-offset-5 col-xs-3">
        <div class="form-group">
          <a href="cart_list.html" class="btn btn-success btn-block">商品一覧に戻る</a>
          <form action="{{route('order.confirm')}}">
            <input class="form-control btn btn-warning btn-block" type="submit" value="注文に進む" />
          </form>
        </div>
      </div>
    </div>

  
    @endsection
  </div>
  <!-- end container -->
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script> --}}
@endsection