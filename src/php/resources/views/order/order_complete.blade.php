<!DOCTYPE html>
<html lang="ja">

<head>
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
  <!-- Import Materialize CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
  <!-- Import Font Wesome -->
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet" />
  <link rel="stylesheet" href="css/common.css" />
  <link rel="stylesheet" href="css/header.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/register_admin.css" />
  <link rel="stylesheet" href="css/login.css" />
  <link rel="stylesheet" href="css/item_list.css" />
  <link rel="stylesheet" href="css/item_detail.css" />
  <link rel="stylesheet" href="css/cart_list.css" />
  <link rel="stylesheet" href="css/order_confirm.css" />
  <link rel="stylesheet" href="css/order_finished.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ラクラクアロハ</title>
</head>

<body>
  <header>
    <div class="container">
      <div class="header">
        <div class="header-left">
          <a href="top.html">
            <img class="logo" src="img/header_logo.png" />
          </a>
        </div>

        <div class="header-right">
          <a href="item_list.html">商品一覧</a>
          <a href="register_admin.html">会員登録</a>
          <a href="#"><i class="fas fa-shopping-cart"></i>カート</a>
          <a href="login.html" class="login">
            <i class="fas fa-sign-in-alt"></i>ログイン
          </a>

          <a href="order_history.html">注文履歴</a>
        </div>
      </div>
    </div>
  </header>
  <div class="top-wrapper">
    <div class="container">
      <h1 class="page-title">決済が完了しました！</h1>
      <div class="order-finished-thanks-message">
        <p>この度はご注文ありがとうございます。</p>
        <p>
          お支払い先は、お送りしたメールに記載してありますのでご確認ください。
        </p>
        <p>メールが届かない場合は「注文履歴」からご確認ください。</p>
      </div>
      <div class="row order-finished-btn">
        <button class="btn" type="button" onclick="location.href='item_list.html'">
          <span>トップ画面を表示する</span>
        </button>
      </div>
    </div>
    <!-- end container -->
  </div>
  <!-- end top-wrapper -->
  <footer>
    <div class="container">
      <img src="img/header_logo.png" />
      <p>アロハな気分をあなたにお届け！</p>
    </div>
  </footer>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>