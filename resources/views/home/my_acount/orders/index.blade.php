@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.orders') .' | '. __('dashboard.show'))
    
    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.dashboard')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.orders')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section inner-section2 checkout-part" style="margin-top:200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.orders') <small>{{ $orders->count() }}</small></h4>
                        </div>
                        
                        @if ($orders->count() > 0)
                            
                            <div class="account-content">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">order number</th>
                                                <th scope="col">@lang('dashboard.totalprice')</th>
                                                <th scope="col">@lang('dashboard.created_at')</th>
                                                <th scope="col">@lang('dashboard.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($orders as $index=>$order)

    	                                        <tr>
    	                                            <td class="table-name">
    	                                                <h6>{{ $order->id }}</h6>
    	                                            </td>
    	                                            <td class="table-name">
    	                                                <h6>{{ $order->totle_price }}</h6>
    	                                            </td>
    	                                            <td class="table-price">
    	                                                <h6>{{ $order->created_at }}</h6>
    	                                            </td>
    	                                            <td class="table-price">
    	                                                <a href="{{ route('orders.show', $order->id) }}" class="btn-info btn-sm">
    	                                                	<i class="fa fa-eye"></i> ordera detilse
    	                                                </a>
    	                                            </td>
    	                                        </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        @else

                            <h2>@lang('dashboard.no_data_found')</h2>

                        @endif

                    </div>
                </div>


                <div class="col-lg-12 mt-3">

                    <ul class="pagination">
                        @include('paginations.defulte',['products'=>$orders])
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection