@extends('layouts.app')

@section('title')
クーポン適応画面
@endsection

@section('content')

<div class="coupon-form " id="coupon-container">
  <h3 id="coupon-title">クーポンコードを入れてください</h3><br>
  <h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;↓</h2>
  <form action="{{ route('order.coupon')}}" method="post">
    @csrf
  <input class="text-danger" type="text" name="coupon_code" id="coupon-input">
    <br>
    <br>
    &nbsp;&nbsp;<input class="form-control btn btn-warning btn-block" type="submit" value="クーポンを適応する" id="coupon-button" />
  </form>

  <form action="{{route('order.confirm')}}">
  <input class="form-control btn btn-info btn-block" type="submit" value="注文確認画面に戻る" id="coupon-button" />
  </form>
  <br>
  <br>
  @if(isset( $message ))
  <h4>
    <p class="text-danger" id="coupon-message">*****{{$message}}*****</p>
  </h4>
  @endif
  @if(isset($discountMessage))
  <h4>
    <p>クーポン割引額:{{$discountMessage}}円</p>
  </h4>
  @endif

  <h4>
    <p>現在の合計金額：{{$totalPrice}}円
    <p>
  </h4>
</div>

@endsection