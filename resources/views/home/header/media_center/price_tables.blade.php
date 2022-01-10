@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.price_tables'))  

<section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.price_tables')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.price_tables')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section checkout-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.price_tables')</h4>
                        </div>
                        @if ($price_tables->count() > 0)

                            <div class="account-content">

                                <div class="table-scroll">
                                    <table class="table-list">
                                        <thead>
                                            <tr>
                                                <th scope="col">@lang('dashboard.name')</th>
                                                <th scope="col">@lang('dashboard.title')</th>
                                                <th scope="col">@lang('dashboard.price')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($price_tables as $price)
                                                <tr>
                                                    <td>
                                                        <h6>{{ $price->name }}</h6>
                                                    </td>

                                                    <td>
                                                        {{ $price->title }}
                                                    </td>

                                                    <td>
                                                        <h6>{{ $price->new_price }}</h6>
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

                @include('paginations.defulte',['products'=>$price_tables])

            </div>
        </div>
    </section>

@endsection