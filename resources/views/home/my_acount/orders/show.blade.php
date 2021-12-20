@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.orders') .' | '. __('dashboard.show'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.dashboard')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('orders.index') }}">@lang('dashboard.orders')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.show')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section inner-section2 checkout-part" style="margin-top:200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        
                        <div class="account-title">
                            <h4>@lang('dashboard.products') <small>{{ $orderItems->count() }}</small></h4>
                        </div>

                        <div class="account-content">
                            <div class="table-scroll">
                                <table class="table-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">@lang('dashboard.image')</th>
                                            <th scope="col">@lang('dashboard.name')</th>
                                            <th scope="col">@lang('dashboard.price')</th>
                                            <th scope="col">@lang('dashboard.quantity')</th>
                                            <th scope="col">@lang('dashboard.totalprice')</th>
                                            <th scope="col">@lang('dashboard.created_at')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($orderItems as $index=>$order)

	                                        <tr>
	                                            <td class="table-name">
	                                                <h6>{{ $index + 1 }}</h6>
	                                            </td>
	                                            <td class="table-name">
	                                                <h6>{{ $order->product->name }}</h6>
	                                            </td>
                                                @php
                                                    $image = App\Models\ImageProduct::where('product_id', $order->product->id)->first();
                                                @endphp
                                                <td class="table-name">
                                                    <img src="{{ $image->image_path }}" width="200">
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{ $order->price }}</h6>
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{ $order->quantity }}</h6>
                                                </td>
                                                <td class="table-name">
                                                    <h6>{{ number_format($order->subtotal,2) }}</h6>
                                                </td>
	                                            <td class="table-price">
	                                                <h6>{{ $order->created_at }}</h6>
	                                            </td>
	                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-12 mt-3">
                    <ul class="pagination">
                        @include('paginations.defulte',['products'=>$orderItems])
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection