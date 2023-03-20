@extends('layouts.app')

@section('title')
カートリスト
@endsection

<body class="order_confirm">
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
  @endsection
</body>
@endsection