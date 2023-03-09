@extends('layouts.app')

@section('title')
商品詳細ページ
@endsection

@section('content')
<div class="container my-5">
<form method="POST" action="{{ route('contact.confirm') }}">
    @csrf

 <div class="form-group">
    <label>メールアドレス</label>
    <br>
    <input
        name="email"
        value="{{ old('email') }}"
        type="text">
    @if ($errors->has('email'))
        <p class="error-message" color="red">{{ $errors->first('email') }}</p>
    @endif
</div>
<br>
 <div class="form-group">
    <label>タイトル</label>
    <br>
    <input
        name="title"
        value="{{ old('title') }}"
        type="text">
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
    <button type="submit"  class="btn btn-outline-primary">入力内容確認</button>
</form>
@endsection
</div>
</html>