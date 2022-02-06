@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.packages') .' | '. __('dashboard.show'))
    
    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.dashboard')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.packages')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section inner-section2 checkout-part" style="margin-top:200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.packages') <small>{{ $packages->count() }}</small></h4>
                        </div>
                        
                        @if ($packages->count() > 0)
                            
                            <div class="account-content">
                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('dashboard.start_month')</th>
                                                <th scope="col">@lang('dashboard.end_month')</th>
                                                <th scope="col">@lang('dashboard.price')</th>
                                                <th scope="col">@lang('dashboard.qty_product')</th>
                                                <th scope="col">@lang('dashboard.image')</th>
                                                <th scope="col">@lang('dashboard.package')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach ($packages as $index=>$package)

    	                                        <tr>
    	                                            <td class="table-name">
    	                                                <h6>{{ $package->start_month }}</h6>
    	                                            </td>
    	                                            <td class="table-name">
    	                                                <h6>{{ $package->end_month }}</h6>
    	                                            </td>
                                                    <td class="table-name">
                                                        <h6>{{ $package->package->price }}</h6>
                                                    </td>
                                                    <td>
                                                        <h6>{{ $package->package->qty_product }}</h6>
                                                    </td>
    	                                            <td class="table-price">
    	                                                <h6><img src="{{ $package->image_path }}" width="100"></h6>
    	                                            </td>
                                                    <td class="table-price">
                                                        <h6>{{ $package->package->name }}</h6>
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
                        @include('paginations.defulte',['products'=>$packages])
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection