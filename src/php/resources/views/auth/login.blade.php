@extends('layouts.app')

@section('title')
ログイン
@endsection

@section('content')
<div class="container">
    <div class="col-lg-offset-2 col-lg-8" style="margin-top: 30px">
        <div class="font-weight-bold text-center border-bottom pb-3" style="font-size: 24px">ログイン</div>

        <form method="POST" action="{{ route('login') }}" class="p-5">
            @csrf

            <div class="form-group">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">パスワード</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                        ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        ログイン状態を保存する
                    </label>
                </div>
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="btn btn-block btn-primary">
                    ログイン
                </button>
            </div>
            <div class="mt-3">
                アカウントをお持ちでない方は<a href="{{ route('register') }}">こちら</a>
            </div>
        </form>
    </div>
</div>
@endsection