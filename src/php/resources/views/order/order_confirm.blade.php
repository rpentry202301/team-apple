@extends('layouts.app')

@section('title')
    商品一覧ページ
@endsection

@section('content')
    {{-- <img src="../images/vegitable.jpg" style="background-size: auto" width="1500" height="1200"> --}}

    <body class="order_confirm">
        <div class="container">
            <!-- table -->
            <!-- クーポン適応機能を実装 -->
            <i class="fa-regular fa-ticket">
                <a href="{{ route('order.coupon-only') }}">クーポンをお持ちの方はこちら</a>
            </i>
            <form action="{{ route('order.buy') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="table-responsive col-lg-offset-3 col-lg-6 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
                        <h3 class="text-center">お届け先情報</h3>
                        <a href="{{ route('order.address') }}"><button type="button">お届け先所得</button></a>
                        <table class="table table-striped item-list-table">
                            <tbody>
                                <tr>
                                    <td>

                                        <div class="text-center">お名前</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_name'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_name') }}
                                            </div>
                                        @endif
                                        <input type="text" name='destination_name'
                                            value="{{ $data['name'] ?? old('destination_name') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">メールアドレス</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_email'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_email') }}
                                            </div>
                                        @endif
                                        <input type="text" name='destination_email'
                                            value="{{ $data['email'] ?? old('destination_email') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">郵便番号 (例：0001111)</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_zipcode'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_zipcode') }}
                                            </div>
                                        @endif
                                        {{-- {{ $data }} --}}
                                        {{-- {{ $items }} --}}
                                        <input type="text" name='destination_zipcode' id="zip"
                                            value="{{ $data['zipcode'] ?? old('destination_zipcode') }}" />&nbsp;&nbsp;<button
                                            class="btn-primary api-address" type="button">住所検索</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">都道府県</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_prefectures'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_prefectures') }}
                                            </div>
                                        @endif
                                        <input type="text" name='destination_prefectures' id="destination_prefectures"
                                            value="{{ $data['prefecture'] ?? old('destination_prefectures') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">市区町村</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_municipalities'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_municipalities') }}
                                            </div>
                                        @endif
                                        <input type="text" name='destination_municipalities'
                                            id="destination_municipalities"
                                            value="{{ $data['municipalities'] ?? old('destination_municipalities') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">番地</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_address_line1'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_address_line1') }}
                                            </div>
                                        @endif
                                        <input type="text" name='destination_address_line1'
                                            id="destination_address_line1"
                                            value="{{ $data['address_line1'] ?? old('destination_address_line1') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">建物名</div>
                                    </td>
                                    <td>
                                        <input type="text" name='destination_address_line2'
                                            value="{{ $data['address_line2'] ?? old('destination_address_line2') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">電話番号</div>
                                    </td>
                                    <td>
                                        @if ($errors->has('destination_tell'))
                                            <div style="color: red">
                                                <strong>{{ $errors->first('destination_tell') }}
                                            </div>
                                        @endif
                                        <input type="text" name="destination_tell"
                                            value="{{ $data['telephone'] ?? old('destination_tell') }}" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="text-center">配達日時</div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    @if ($errors->has('delivery_date'))
                                                        <div style="color: red">
                                                            <strong>{{ $errors->first('delivery_date') }}
                                                        </div>
                                                    @endif
                                                    <input type="date" name="delivery_date" id="name"
                                                        class="form-control input-sm" value="{{ old('delivery_date') }}" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <label class="radio-inline">
                                                        @if ($errors->has('delivery_time'))
                                                            <div style="color: red">
                                                                <strong>{{ $errors->first('delivery_time') }}
                                                            </div>
                                                        @endif
                                                        <input type="radio" name="delivery_time" checked="checked"
                                                            value="10:00:00" />
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
                                                    <input type="radio" name="responsibleCompany" value="クレジットカード" />
                                                    クレジットカード </label><br /><br />
                                            </div>
                                            <div id="credit-card-info" style="display: none;">
                                                {{-- クレジットカード入力フォーム --}}
                                                <script src="https://checkout.pay.jp/" class="payjp-button" data-key="{{ config('payjp.public_key') }}"
                                                    data-text="カード情報を入力" data-submit-text="購入する"></script>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="order-button">
                    <div class="row">
                        <div class="col-xs-offset-4 col-xs-4">

                            <div class="form-group">
                                <input class="form-control btn btn-warning btn-block" type="submit" value="この内容で注文する" />
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        </div>

        <!-- end container -->
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function() {
                $('input[name=responsibleCompany]').change(function() {
                    if ($(this).val() === 'クレジットカード') {
                        $('#credit-card-info').show();
                        $('#order-button').hide();
                    } else {
                        $('#credit-card-info').hide();
                        $('#order-button').show();

                    }
                });
            });
        </script>

        {{-- 郵便番号から住所を取得する処理 --}}
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
    @endsection
