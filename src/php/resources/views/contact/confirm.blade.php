@extends('layouts.app')

@section('title')
メール内容確認ページ
@endsection

@section('content')

<body class="confirm">

    <div class="container">
        <div class="row">
            <div class="col-lg-offset-2">


                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf
                    <h5><label>【お客様のメールアドレス】</label></h5><br>
                    {{ $inputs['email'] }}<br>
                    <input name="email" value="{{ $inputs['email'] }}" type="hidden">
                    <br>
                    <br>

                    <h5><label>【お問合せ種別】</label></h5><br>
                    <!-- titleの値によって表示を変更 -->
                    @if ($inputs['title'] == 'item-and-service')
                    商品やサービスついて<br>
                    @elseif ($inputs['title'] == 'homepage')
                    ホームページについて<br>
                    @else
                    その他<br>
                    @endif

                    <input name="title" value="{{ $inputs['title'] }}" type="hidden">
                    <br>
                    <br>

                    <h5><label>【お問合わせ内容】</label><br></h5>
                    {!! nl2br(e($inputs['body'])) !!}<br>
                    <input name="body" value="{{ $inputs['body'] }}" type="hidden">
                    <br>
                    <br>

                    <button class="btn-primary" type="submit" name="action" value="back">入力内容修正</button>
                    <button class="btn-success" type="submit" name="action" value="submit">送信する</button>
                    <br><br><br><br><br><br><br><br><br>
                </form>


            </div>
        </div>
    </div>
</body>
@endsection

</html>