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


        {{-- <div class="row">
            <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                <h3 class="text-center">ショッピングカート</h3>
                @if (count($items) == 0)
                    <p><strong>カートに商品が存在しません</strong></p>
                @else
                    <table class="table table-striped item-list-table">
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="center">
                                            <img src="../images/1.jpg"
                                                class="img-responsive img-rounded item-img-center" width="100"
                                                height="300" /><br />
                                            {{ $item->item->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <span
                                            class="price">&nbsp;{{ $item->size }}</span>&nbsp;&nbsp;{{ $item->order_price ? $item->order_price : 'No topping' }}円
                                        &nbsp;&nbsp;{{ $item->quantity }}個
                                    </td>
                                    <td>
                                        <ul class="list-unstyled">
                                            @foreach ($item->cartToppings as $cartTopping)
                                                <li>{{ $cartTopping->topping ? $cartTopping->topping->name : 'No topping' }}
                                                </li>
                                        </ul>
                                    <td>
                                        <div class="text-center">{{ $cartTopping->total_topping_price }}円</div>
                            @endforeach
                            </td>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('cart.delete') }}">
                                    @csrf
                                    <div class="text-center">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
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
                    <span id="total-price">消費税：{{ $tax }}円</span><br />
                    <span id="total-price">ご注文金額合計：{{ $total_price }}円 (税込)</span>
                </div>
            </div>
        </div>
        @endif --}}



        {{-- <!-- table -->
        <div class="row">
            <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                <h3 class="text-center">注文内容確認</h3>
                <table class="table table-striped item-list-table">
                    <tbody>
                        <tr>
                            <th>
                                <div class="text-center">商品名</div>
                            </th>
                            <th>
                                <div class="text-center">サイズ、価格(税抜)、数量</div>
                            </th>
                            <th>
                                <div class="text-center">トッピング、価格(税抜)</div>
                            </th>
                            <th>
                                <div class="text-center">小計</div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <div class="center">
                                    <img src="../images/1.jpg" class="img-responsive img-rounded item-img-center"
                                        width="100" height="300" /><br />
                                    じゃがバターベーコン
                                </div>
                            </td>
                            <td>
                                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円
                                &nbsp;&nbsp;1個
                            </td>
                            <td>
                                <ul>
                                    <li>ピーマン300円</li>
                                    <li>オニオン300円</li>
                                    <li>あらびきソーセージ300円</li>
                                </ul>
                            </td>
                            <td>
                                <div class="text-center">3,280円</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="center">
                                    <img src="../images/1.jpg" class="img-responsive img-rounded item-img-center"
                                        width="100" height="300" /><br />
                                    じゃがバターベーコン
                                </div>
                            </td>
                            <td>
                                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円
                                &nbsp;&nbsp;1個
                            </td>
                            <td>
                                <ul>
                                    <li>ピーマン300円</li>
                                    <li>オニオン300円</li>
                                    <li>あらびきソーセージ300円</li>
                                </ul>
                            </td>
                            <td>
                                <div class="text-center">3,280円</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="center">
                                    <img src="../images/1.jpg" class="img-responsive img-rounded item-img-center"
                                        width="100" height="300" /><br />
                                    じゃがバターベーコン
                                </div>
                            </td>
                            <td>
                                <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;2,380円
                                &nbsp;&nbsp;1個
                            </td>
                            <td>
                                <ul>
                                    <li>ピーマン300円</li>
                                    <li>オニオン300円</li>
                                    <li>あらびきソーセージ300円</li>
                                </ul>
                            </td>
                            <td>
                                <div class="text-center">3,280円</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-offset-2 col-xs-8">
                <div class="form-group text-center">
                    <span id="total-price">消費税：8,000円</span><br />
                    <span id="total-price">ご注文金額合計：38,000円 (税込)</span>
                </div>
            </div>
        </div> --}}

        <!-- table -->
        <form action="{{ route('order.buy') }}" method="POSt">
            @csrf
            <div class="row">
                <div class="table-responsive col-lg-offset-3 col-lg-6 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                    <h3 class="text-center">お届け先情報</h3>
                    <table class="table table-striped item-list-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="text-center">お名前</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_name' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">メールアドレス</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_email' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">郵便番号</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_zipcode'
                                        id="zip" />&nbsp;&nbsp;<button class="api-address"
                                        type="button">住所検索</button>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">都道府県</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_prefectures' id="destination_prefectures" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">市区町村</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_municipalities'
                                        id="destination_municipalities" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">番地</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_address_line1'
                                        id="destination_address_line1" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">建物名</div>
                                </td>
                                <td>
                                    <input type="text" name='destination_address_line2' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">電話番号</div>
                                </td>
                                <td>
                                    <input type="text" name="destination_tell" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">配達日時</div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="control-label" style="color: red"
                                                    for="inputPeriod">配達日時を入力してください</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="date" name="delivery_date" id="name"
                                                    class="form-control input-sm" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time"
                                                        checked="checked" value="10:00:00" />
                                                    10時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="11:00:00" />
                                                    11時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="12:00:00" />
                                                    12時 </label><br />
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="13:00:00" />
                                                    13時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="14:00:00" />
                                                    14時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="15:00:00" />
                                                    15時 </label><br />
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="16:00:00" />
                                                    16時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="17:00:00" />
                                                    17時
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="delivery_time" value="18:00:00" />
                                                    18時 </label><br />
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- table -->
            <div class="row">
                <div class="table-responsive col-lg-offset-3 col-lg-6 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                    <h3 class="text-center">お支払い方法</h3>
                    <table class="table table-striped item-list-table">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="text-center">代金引換</div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="responsibleCompany" checked="checked" />
                                                代金引換
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="text-center">クレジットカード決済</div>
                                </td>
                                <td align="center">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label class="radio-inline">
                                                <input type="radio" name="responsibleCompany" checked="checked" />
                                                クレジットカード </label><br /><br />
                                        </div>
                                    </div>
                                </td>

                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="row">
                                        <div class="col-8 offset-2">
                                            <div class="card-form-alert alert alert-danger" role="alert"
                                                style="display: none"></div>
                                            <div class="form-group mt-3">
                                                <label for="number-form">カード番号</label>
                                                <div id="number-form" class="form-control">
                                                    <!-- ここにカード番号入力フォームが生成されます -->
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="expiry-form">有効期限</label>
                                                <div id="expiry-form" class="form-control">
                                                    <!-- ここに有効期限入力フォームが生成されます -->
                                                </div>
                                            </div>
                                            <div class="form-group mt-3">
                                                <label for="expiry-form">セキュリティコード</label>
                                                <div id="cvc-form" class="form-control">
                                                    <!-- ここにCVC入力フォームが生成されます -->
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-offset-4 col-xs-4">
                    <div class="form-group">
                        <input class="form-control btn btn-warning btn-block" type="submit" value="この内容で注文する" />
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- end container -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../static/js/bootstrap.min.js"></script> --}}
</body>
<script>
    //イベントリスナの設置：ボタンをクリックしたら反応する
    document.querySelector('.api-address').addEventListener('click', () => {
        //郵便番号を入力するテキストフィールドから値を取得
        const elem = document.querySelector('#zip');
        const zip = elem.value;
        //fetchでAPIからJSON文字列を取得する
        fetch('../api/address/' + zip)
            .then((data) => data.json())
            .then((obj) => {
                //郵便番号が存在しない場合，空のオブジェクトが返ってくる
                //オブジェクトが空かどうかを判定
                if (!Object.keys(obj).length) {
                    //オブジェクトが空の場合
                    txt = '住所が存在しません。'
                } else {
                    //オブジェクトが存在する場合
                    //住所は分割されたデータとして返ってくるので連結する
                    txt = obj.pref + obj.city + obj.town;
                }
                //住所を入力するテキストフィールドに文字列を書き込む
                document.querySelector('#destination_prefectures').value = obj.pref;
                document.querySelector('#destination_municipalities').value = obj.city;
                document.querySelector('#destination_address_line1').value = obj.town;
            });
    });
</script>

</html>
