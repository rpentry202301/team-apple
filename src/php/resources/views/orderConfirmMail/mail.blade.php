<h1>**** ご注文内容 ****</h1><br>
<br>
<div>
    <h2>注文者氏名</h2>
     {{$userName}}<br>
    <br>
</div>
<div>
    <h2>ご注文内容</h2>
    <table>
@foreach($orderItems as $item)
        <tr>
            <th>{{$item->order_name}}</th>
            <th>{{$item->quantity}}点</th>
        </tr>
@endforeach
    </table>
</div>
<div>
    <h2>合計金額</h2>
    {{$totalPrice}}円<br>
    <br>
</div>
<h2>配送先氏名</h2>
 {{$destinationName}}<br>

<h2>配送先住所</h2>
{{$destinationZipcode}}<br>
{{$destinationPrefectures}}<br>
{{$destinationMunicipalities}}<br>
{{$destinationAddressLine1}}<br>
{{$destinationAddressLine2}}<br>

<h2>お届け予定時刻</h2>
{{$deliveryTime}} にお届けします！<br>

<h2>次回ご利用可能なクーポンコード</h2>
【THANKYOU】<br>

</html>

