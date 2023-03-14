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
  <div class="col-xs-offset-4 col-xs-3">
    <div class="form-group">
      <form action="{{route('order.confirm')}}">
        <input class="form-control btn btn-warning btn-block" type="submit" value="注文に進む" />
      </form>
    </div>
  </div>
</div>
@endsection
<!-- end container -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="../static/js/bootstrap.min.js"></script> --}}
@endsection