@yield('cart_list')

<div class="container">
    <div class="table-responsive col-lg-offset-1 col-lg-10 col-md-offset-1 col-md-10 col-sm-10 col-xs-12">
        <h3 class="text-center">ショッピングカート</h3>
        @if (count($items) == 0)
        <p style="margin-bottom: 520px"><strong>カートに商品が存在しません</strong></p>
        @else
        <table class="table table-striped item-list-table" style="margin-top: 20px">
            <thead>
                <th>商品名</th>
                <th>サイズ、個数</th>
                <th>トッピング名</th>
                <th>トッピングの金額</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                </tr>
                <tr>
                    <td>
                        <div class="center">
                            <img src="../images/{{$item->item->id}}.jpg"
                                class="img-responsive img-rounded item-img-center" width="100" height="300" /><br />
                            {{ $item->item->name }}
                        </div>
                    </td>
                    <td>
                        <span class="price">&nbsp;{{ $item->size }}</span>&nbsp;&nbsp;{{ $item->order_price ?
                        $item->order_price : 'No topping' }}円
                        &nbsp;&nbsp;{{ $item->quantity }}個
                    </td>
                    <td>
                        <ul class="list-unstyled">
                            @foreach ($item->cartToppings as $cartTopping)
                            <li>{{$cartTopping->topping->name}}</li>
                            @endforeach
                        </ul>
                    <td>
                        @foreach ($item->cartToppings as $cartTopping)
                            <div class="text-center">{{ $cartTopping->total_topping_price }}円</div>
                        @endforeach
                    </td>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('cart.delete') }}">
                            @csrf
                            <div class="text-center">
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button type="submit" class="btn btn-primary">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-offset-2 col-xs-8">
        <div class="panel panel-default" style="background-color: black">
            <div class="form-group text-center">
                <span id="total-price">消費税：{{ $tax }}円</span><br />
                <span id="total-price">ご注文金額合計：{{ $total_price }}円 (税込)</span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-offset-4 col-xs-4">
        <div class="form-group">
            <form action="{{route('order.confirm')}}">
                <input class="form-control btn btn-warning btn-bloc" type="submit" value="注文に進む" />
                <a href="{{route('top')}}" class="form-control btn btn-info btn-bloc"
                    style="margin-top: 10px; margin-bottom: 100px">注文に戻る</a>
            </form>
        </div>
    </div>
</div>
@endif