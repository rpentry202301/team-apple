@extends('layouts.app')

@section('title')
商品詳細ページ
@endsection

@section('content')

<div id="youtube-wrap">
  <div id="youtube" data-property="{
      videoURL: 'https://youtu.be/3231gqH9Wao',
      containment: '#youtube-wrap',
      autoPlay: true,
      loop: 1,
      mute: true,
      startAt: 0,
      opacity: 0.5,
      showControls: false,
      showYTLogo: false
    }"></div>

  <form action="/cart/add" method="post" name="cart_list">
    @csrf
    <div class="row">
      <div class=" col-xs-offset-2 col-xs-8 ">
        <h3 class="text-center">商品詳細</h3>
        <div class="row">
          <div class="col-xs-5">
            <img src="../images/{{$item->id}}.jpg" class="img-responsive img-rounded item-img-center" />
          </div>
          <div class="col-xs-5">
            <div class="bs-component" data-piza-mprice="{{$item->price_m}}" data-piza-lprice="{{$item->price_l}}">
              <h4>{{$item->name}}</h4>
              <br />
              <br />
              <p>
                {{$item->description}}
              </p>
            </div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-xs-offset-2 col-xs-8">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label for="inputResponsibleCompany">サイズ</label>
                </div>
                <div class="col-sm-12">
                  <label class="radio-inline">
                    <input type="radio" name="size" checked="checked" value="M" />
                    <input type="hidden" name="size_m" value="{{$item->price_m}}">
                    <span class="price">&nbsp;М&nbsp;</span>&nbsp;&nbsp;{{$item->price_m}}(税抜)
                  </label>
                  <label class="radio-inline">

                    <input type="radio" name="size" value="L" />
                    <input type="hidden" name="size_l" value="{{$item->price_l}}">
                    <span class="price">&nbsp;Ｌ</span>&nbsp;&nbsp;{{$item->price_l}}(税抜)
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-xs-offset-2 col-xs-8">
            <div class="form-group">
              <div class="row">
                <div class="col-sm-12">
                  <label for="inputResponsibleCompany">
                    トッピング：&nbsp;1つにつき
                    <span>&nbsp;М&nbsp;</span>&nbsp;&nbsp;200円(税抜)
                    <span>&nbsp;Ｌ</span>&nbsp;&nbsp;300円(税抜)
                  </label>
                </div>
                <div class="col-sm-12">
                  @foreach($toppings as $topping)
                  <label class="checkbox-inline">
                    <input class="topping" type="checkbox" value="{{$topping->id}}" id="topping"
                      name="topping[]" />{{$topping->name}}
                    <input type="hidden" name="topping_m" value="{{$topping->price_m}}">
                    <input type="hidden" name="topping_l" value="{{$topping->price_l}}">
                  </label>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-offset-2 col-xs-8">
            <div class="form-group">
              <div class="row">
                <div class="col-xs-5 col-sm-5">
                  <label for="">数量:</label>
                  <label class="control-label" style="color: red" for="inputError">数量を選択してください</label>
                  <select name="quantity" class="form-control" id="quantity">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br />
        <div class="row">
          <div class="col-xs-offset-2 col-xs-10">
            <div class="form-group">
              <span>この商品の合計金額は</span><span id="total-price">{{$item->price_m}}</span><span>円です</span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-offset-2 col-xs-3">
            <div class="form-group">
              <p>
                <input class="form-control btn btn-warning btn-block" type="submit" value="カートに入れる" />
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <input type="hidden" name="id" value="{{$item->id}}">

</div>

</form>


<!--ピザのサイズ、トッピング、数量が変更された際に合計金額を自動計算する処理-->
<script>
  $('#youtube').YTPlayer();
      $('input[name="size"]:radio, input.topping, select[name="quantity"]').change(function() {
        

//radioボタン('piza-size')でチェックされたサイズのvalueを取得
        var elements = document.getElementsByName('size');
        var len = elements.length;
        var checkValue = '';

        for (let i = 0; i < len; i++) {
          if (elements.item(i).checked) {
            checkValue = elements.item(i).value;
          }
        };

//サイズに応じてピザとトッピングの本体価格を設定
        if (checkValue === "M") {
          var pizaPrice = parseInt($(".bs-component").attr("data-piza-mprice"));
          var toppingPrice = 200;
        } else if (checkValue === "L") {
          var pizaPrice = parseInt($(".bs-component").attr("data-piza-lprice"));
          var toppingPrice = 300;
        }

//checkbox('topping')の選択された項目の名前を配列に取得する
        var topping_list = [];
        var chk1 = document.getElementsByClassName("topping");

        for (let i = 0; i < chk1.length; i++) {
          if (chk1[i].checked) {
            topping_list.push(chk1[i].value);
          }

//ピザの価格、トッピングの価格、合計価格を計算
          var pizaTotalPrice = pizaPrice * parseInt($('#quantity').val());
          var toppingTotalPrice = toppingPrice * parseInt(topping_list.length);
          var TotalPrice = pizaTotalPrice + toppingTotalPrice;

//合計金額を表示する<span>タグを書き変える
          var elem = document.getElementById("total-price");
          elem.innerHTML = String(TotalPrice);
        }
  });
</script>
@endsection
</div>

</html>