@extends('layouts.app')

@section('title')
商品詳細ページ
@endsection

@section('content')
<body class="confirm">
<div class="container my-5" style="margin-top: 100px">
    <form method="POST" action="{{ route('contact.confirm') }}">
        @csrf

        <div class="form-group">
            <label>お客様のメールアドレス</label>
            <br>
            <input name="email" value="{{ old('email') }}" type="text">
            @if ($errors->has('email'))
            <p class="error-message" color="red">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <br>
        <div class="form-group">
            <label>お問い合わせ種別</label>
            <br>
            <select class="title" name="title">
                <option value="item-and-service">商品やサービスについて</option>
                <option value="homepage">ホームページ</option>
                <option value="other">その他</option>
            </select>
            <!-- <input
        name="title"
        value="{{ old('title') }}"
        type="text"> -->
            @if ($errors->has('title'))
            <p class="error-message">{{ $errors->first('title') }}</p>
            @endif
        </div>
        <br>
        <div class="form-group">
            <label>お問い合わせ内容</label>
            <br>
            <textarea name="body" rows="4" cols="50">{{ old('body') }}</textarea>
            @if ($errors->has('body'))
            <p class="error-message">{{ $errors->first('body') }}</p>
            @endif
        </div>
        <br>
        <button type="submit" class="btn btn-primary" style="margin-bottom: 120px">入力内容確認</button>
    </form>
    @endsection
</div>
</body>
</html>