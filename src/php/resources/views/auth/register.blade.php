@extends('layouts.app')

@section('title')
    会員登録
@endsection

@section('content')
    <div class="container">
        <div class="col-lg-offset-2 col-lg-8" style="margin-top: 60px">
            <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">ユーザ登録</div>

            <form method="POST" action="{{ route('register') }}" class="p-5">
                @csrf

                <div class="form-group">
                    <label for="name">名前</label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" autofocus placeholder="名前">
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="Eメール">
                </div>

                <div class="form-group">
                    <label for="zipcode">郵便番号</label><button class="api-address btn-primary" type="button">住所検索</button>
                    @error('zipcode')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="zipcode" type="text" class="form-control @error('zipcode') is-invalid @enderror"
                        name="zipcode" value="{{ old('zipcode') }}" autofocus placeholder="郵便番号">
                </div>

                <div class="form-group">
                    <label for="prefecture">住所</label>
                    <input id="prefecture" type="text" class="form-control @error('prefecture') is-invalid @enderror"
                        name="prefecture" value="{{ old('prefecture') }}" autofocus placeholder="都道府県">
                    @error('prefecture')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="municipalities" type="text"
                        class="form-control @error('municipalities') is-invalid @enderror" name="municipalities"
                        value="{{ old('municipalities') }}" autofocus placeholder="市区町村">
                    @error('municipalities')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="address_line1" type="text"
                        class="form-control @error('address_line1') is-invalid @enderror" name="address_line1"
                        value="{{ old('address_line1') }}" autofocus placeholder="番地等">
                    @error('address_line1')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input id="address_line2" type="text"
                        class="form-control @error('address_line2') is-invalid @enderror" name="address_line2"
                        value="{{ old('address_line2') }}" autofocus placeholder="建物名">
                    @error('address_line2')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="telephone">電話番号</label>
                    @error('telephone')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="telephone" type="text" class="form-control @error('telephone') is-invalid @enderror"
                        name="telephone" value="{{ old('telephone') }}" autofocus placeholder="電話番号">
                </div>

                <div class="form-group">
                    <label for="password">パスワード</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                    @enderror
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="パスワード">
                    <br>
                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            placeholder="確認用パスワード">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">登録</button>
                    <button type="reset" class="btn btn-primary">クリア</button>
                </div>
                <hr>
                <div>
                    アカウントをお持ちの方は<a href="{{ route('login') }}">こちら</a>
                </div>
            </form>
        </div>
    </div>
    <script>
        //イベントリスナの設置：ボタンをクリックしたら反応する
        document.querySelector('.api-address').addEventListener('click', () => {
            //郵便番号を入力するテキストフィールドから値を取得
            const elem = document.querySelector('#zipcode');
            const zip = elem.value;
            //fetchでAPIからJSON文字列を取得する
            fetch('/api/address/' + zip)
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
                    document.querySelector('#prefecture').value = obj.pref;
                    document.querySelector('#municipalities').value = obj.city;
                    document.querySelector('#address_line1').value = obj.town;
                });
        });
    </script>
@endsection
