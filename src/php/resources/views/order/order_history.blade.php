<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @foreach ($orders as $order)
        @foreach ($order->orderItems as $orderItem)
            {{ $orderItem->order_name }}
        @endforeach
    @endforeach

</body>

</html>
