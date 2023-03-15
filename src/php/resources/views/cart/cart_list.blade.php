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
'total_price' => $total_price
])

@endcomponent
<div class="row">
  <div class="col-xs-offset-4 col-xs-4">
    <div class="form-group">
      <form action="{{route('order.confirm')}}" method="POST">
        @csrf
        
        <input class="form-control btn btn-info btn-bloc" type="submit" value="注文に進む" />
      </form>
    </div>
  </div>
</div>
@endsection
@endsection