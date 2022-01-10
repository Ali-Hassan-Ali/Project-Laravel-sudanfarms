@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.gobs'))  

<section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.gobs')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.gobs')</li>
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
                    			<a href="{{ route('gobs.create') }}">@lang('dashboard.add') @lang('dashboard.gobs')</a>
                    		</p>
                    		
                    	@else

                        	<p>@lang('home.former_customer')<a href="{{ route('home.login') }}">@lang('home.click_here')</a></p>

                    	@endauth
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.gobs')</h4>
                        </div>
                        @if ($gobs->count() > 0)

                            <div class="account-content">

                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('dashboard.name')</th>
                                                {{-- <th scope="col">@lang('dashboard.email')</th> --}}
                                                {{-- <th scope="col">@lang('dashboard.phone')</th> --}}
                                                <th scope="col">@lang('dashboard.count')</th>
                                                <th scope="col">@lang('dashboard.start_data')</th>
                                                <th scope="col">@lang('dashboard.end_data')</th>
                                                <th scope="col">@lang('dashboard.description')</th>
                                                <th scope="col">@lang('dashboard.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($gobs as $request_custmer)
                                                <tr>
                                                    <td>
                                                        <h6>{{ $request_custmer->name }}</h6>
                                                    </td>

                                                    {{-- <td>
                                                        <h6>{{ $request_custmer->email }}</h6>
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->phone }}</h6>
                                                    </td> --}}

                                                    <td>
                                                        {{ $request_custmer->count }}
                                                    </td>

                                                    <td>
                                                        <h6>{{ $request_custmer->start_data }}</h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $request_custmer->end_data }}</h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $request_custmer->description }}</h6>
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

                @include('paginations.defulte',['products'=>$gobs])

            </div>
        </div>
    </section>

@endsection