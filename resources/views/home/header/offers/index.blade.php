@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.offers'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.offers')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.offers')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section offer-part">
        <div class="container">
            <div class="row justify-content-center">

            	@foreach ($offers as $offer)
            		
	                <div class="col-sm-6 col-md-4 col-lg-3">
	                    <div class="offer-card">
	                    	<a href="{{ route('offers.clients.show',$offer->category_id) }}">
                                <img src="{{ $offer->image_path }}" alt="offer">
                            </a>
	                        <div class="offer-div">
	                            <h5 class="offer-code">@lang('dashboard.sale_offer') {{ $offer->category->name }}</h5>
	                            <button class="offer-select">{{ $offer->price }}</button>
	                        </div>
	                    </div>
	                </div>

            	@endforeach
                
            </div>
        </div>
    </section>

@endsection