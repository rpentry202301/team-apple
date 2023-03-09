@extends('layouts.app')

@section('title')
商品詳細ページ
@endsection

@section('content')

<div class="container">
<div class="main container-fluid">
    <div class="row bg-light text-dark py-5">
        <div class="col-md-8 offset-md-2">
            <h2 class="fs-1 mb-5 text-center fw-bold">お問い合わせ</h2>
            <form method="post" action="mail.php">
                <div class="mb-3">
                    <label>メールアドレス</label>
                    <input
                    name="email"
                    value="{{ old('email') }}"
                    type="text">
                    @if ($errors->has('email'))
        <p class="error-message">{{ $errors->first('email') }}</p>
    @endif
                </div>
                <br>
                <div class="mb-3">
                    <label>タイトル</label>
    <input
        name="title"
        value="{{ old('title') }}"
        type="text">
    @if ($errors->has('title'))
        <p class="error-message">{{ $errors->first('title') }}</p>
    @endif
                </div>
                <div class="mb-4">
                    <label>お問い合わせ内容</label>
                    <textarea name="body">{{ old('body') }}</textarea>
                    @if ($errors->has('body'))
                        <p class="error-message">{{ $errors->first('body') }}</p>
                    @endif
                </div>
                  </div>
                <div class="text-center pt-4 col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-primary">送信</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
</div>
</html>