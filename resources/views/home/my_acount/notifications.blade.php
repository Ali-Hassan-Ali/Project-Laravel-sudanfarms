@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.notifications') .' | '. __('dashboard.show'))
    
    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.dashboard')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.notifications')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section inner-section2 checkout-part" style="margin-top:200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.notifications') <small>{{ $notifications->count() }}</small></h4>
                        </div>
                        
                        @if ($notifications->count() > 0)
                            
                            <div class="account-content">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('dashboard.title')</th>
                                                <th scope="col">@lang('dashboard.created_at')</th>
                                                <th scope="col">@lang('dashboard.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($notifications as $index=>$notification)

    	                                        <tr>
    	                                            <td class="table-name">
    	                                                <h6>{{ $notification->id }}</h6>
    	                                            </td>
    	                                            <td class="table-name">
    	                                                <h6>{{ $notification->totle_price }}</h6>
    	                                            </td>
    	                                            <td class="table-price">
    	                                                <h6>{{ $notification->created_at }}</h6>
    	                                            </td>
    	                                            <td class="table-price">
    	                                                <a href="{{ route('notifications.show', $notification->id) }}" class="btn-info btn-sm">
    	                                                	<i class="fa fa-eye"></i> notificationa detilse
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
                        @include('paginations.defulte',['products'=>$notifications])
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection