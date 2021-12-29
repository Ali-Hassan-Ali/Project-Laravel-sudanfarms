@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.request_custmers'))  

<section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.request_custmers')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.request_custmers')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section checkout-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert-info">
                    	@auth

                    		<p>
                    			<a href="{{ route('request_custmers.create') }}">@lang('dashboard.add') @lang('dashboard.request_custmers')</a>
                    		</p>
                    		
                    	@else

                        	<p>@lang('home.former_customer')<a href="{{ route('home.login') }}">@lang('home.click_here')</a></p>

                    	@endauth
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.request_custmers')</h4>
                        </div>
                        @if ($request_custmers->count() > 0)

                            <div class="account-content">

                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('dashboard.name')</th>
                                                <th scope="col">@lang('dashboard.phone')</th>
                                                <th scope="col">@lang('home.product_name')</th>
                                                <th scope="col">@lang('dashboard.quantity')</th>
                                                <th scope="col">@lang('dashboard.end_time')</th>
                                                <th scope="col">@lang('dashboard.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($request_custmers as $request_custmer)
                                                <tr>
                                                    <td>
                                                        <h6>{{ $request_custmer->name }}</h6>
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->product_name }}</h6>
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->phone }}</h6>
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->quantity }} {{ $request_custmer->quantity_guard }}</h6>
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->end_time }}</h6>
                                                    </td>
                                                    <td>
                                                        <a href="tel:{{ $request_custmer->phone }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-phone"></i>
                                                        </a>
                                                        <a href="mailto:{{ $request_custmer->enail }}" class="btn btn-info btn-sm">
                                                            <i class="fa fa-envelope"></i>
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

                @include('paginations.request_custmers',$request_custmers)

            </div>
        </div>
    </section>

@endsection