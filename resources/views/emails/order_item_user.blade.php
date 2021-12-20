<!DOCTYPE html>
<html>
<head>
    <title>sudan farms</title>
</head>
<body>
    
    <h2>{{ $orderItem->product->name_ar }}</h2>
    <h2>{{ $orderItem->quantity }}</h2>
    <h2>{{ $orderItem->price }}</h2>
    <h2>{{ $orderItem->subtotal }}</h2>

    <h2>
        <a href="{{ route('orders.index') }}">
            @lang('dashboard.show')
        </a>
    </h2>

</body>
</html>