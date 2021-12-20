<!DOCTYPE html>
<html>
<head>
    <title>sudan farms</title>
</head>
<body>
    
    <h2>{{ $orderItem->product->name }}</h2>
    <h2>{{ $orderItem->product->description }}</h2>
    <h2>{{ $orderItem->price }}</h2>
    <h2>{{ $orderItem->user->name }}</h2>
    <h2>{{ $orderItem->user->phone }}</h2>
    <h2>{{ $orderItem->user->email }}</h2>

    <h2>
        <a href="{{ route('orders.index') }}">
            @lang('dashboard.show')
        </a>
    </h2>

</body>
</html>