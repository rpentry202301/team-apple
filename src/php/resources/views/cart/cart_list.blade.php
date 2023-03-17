@extends('layouts.app')

@section('title')
カートリスト
@endsection

@section('content')

@include('components.cart_list')
@section('content')

@component('components.cart_list', [
'items' => $items,
'toppings' => $toppings,
'tax' => $tax,
'total_price' => $total_price,
])
@endcomponent
<div class="row">
  <div class="col-xs-offset-4 col-xs-4">
    <div class="form-group">
      <form action="{{route('order.confirm')}}">
        <input class="form-control btn btn-info btn-bloc" type="submit" value="注文に進む" />
        <a href="{{route('top')}}" class="form-control btn btn-success btn-bloc" style="margin-top: 10px">注文に戻る</a>
      </form>
    </div>
  </div>
</div>
@endsection
@endsection