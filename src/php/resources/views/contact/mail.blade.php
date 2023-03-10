<h1>**** お問い合わせ内容 ****</h1><br>
<br>
<div>
    <h2>メールアドレス</h2>
    {!! $email !!}<br>
    <br>
</div>
<h2>お問い合わせ種別</h2>
@if ($title == 'item-and-service')
商品やサービスついて<br>
@elseif ($title == 'homepage')
ホームページについて<br>
@else
その他<br>
@endif
<br>
<div>
    <h2>お問い合わせ内容</h2>
    {!! nl2br($body) !!}<br>

</div>

</html>