@extends('layouts.app')

@section('title')
注文完了画面
@endsection

@section('content')
<div class="container">
    <!-- table -->
    <div class="row">
        <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
            <h3 class="text-center">決済が完了しました！</h3>
            <div class="text-center">
                <p>この度はご注文ありがとうございます。</p>
                <p>
                    お支払い先は、お送りしたメールに記載してありますのでご確認ください。
                </p>
                <p>メールが届かない場合は「注文履歴」からご確認ください。</p>
            </div>
        </div>
    </div>

    <br /><br />
    <div class="row">
        <div class="col-xs-offset-5 col-xs-2">
            <div class="form-group">
                <form action="{{ route('top') }}">
                    <input class="form-control btn btn-warning btn-block" type="submit" value="トップ画面を表示する" />
                </form>
            </div>
        </div>
    </div>
</div>
<!-- end container -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script> --}}
@endsection