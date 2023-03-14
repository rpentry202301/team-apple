@extends('layouts.app')

@section('title')
ピザ屋のネット注文
@endsection

@section('content')
<div class="container">
    @include('components.cart_list')

    @section('content')
    @component('components.cart_list', [
    'items' => $items,
    'toppings' => $toppings,
    'tax' => $tax,
    'total_price' => $total_price,
    ])
    @endcomponent
    @endsection

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
        {{-- {{ $data['zipcode'] }} --}}
        <!-- table -->
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
                                <input type="text" name='destination_name' value="{{ old('destination_name') }}" />
                            </td>
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
                                <div class="text-center">メールアドレス</div>
                            </td>
                            <td>
                                @if ($errors->has('destination_email'))
                                <div style="color: red">
                                    <strong>{{ $errors->first('destination_email') }}
                                </div>
                                @endif
                                <input type="text" name='destination_email' value="{{ old('destination_email') }}" />
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
                                        class="api-address" type="button">住所検索</button>
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
