@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products'))

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.request_custmers')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.request_custmers')</li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.add')</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>@lang('home.prfile')</h4></a>
                    </div>
                    <div class="account-content">
                        <div class="row">

		                    <form action="{{ route('request_custmers.store') }}" method="post">

		                        {{ csrf_field() }}
		                        {{ method_field('post') }}

		                        <div class="form-group">
		                            <label>@lang('dashboard.name')</label>
		                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
		                            @error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.phone')</label>
		                            <input type="number" name="phone" value="{{ auth()->user()->phone }}" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
		                            @error('phone')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.email')</label>
		                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
		                            @error('email')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.title')</label>
		                            <input type="text" name="title" value="{{ auth()->user()->title }}" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
		                            @error('title')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.product_name')</label>
		                            <input type="text" name="product_name" class="form-control @error('product_name') is-invalid @enderror" value="{{ old('product_name') }}">
		                            @error('product_name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.quantity_guard')</label>
		                            <select name="units_id" class="form-control">
		                            	@foreach ($units as $unit)
		                            		
		                                	<option value="{{ $unit->id }}">{{ $unit->name }}</option>

		                            	@endforeach
		                            </select>
		                        </div>


		                        <div class="form-group">
		                            <label>@lang('dashboard.quantity')</label>
		                            <input type="number" step="0.01" step="any" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity') }}">
		                            @error('quantity')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.date_shipment')</label>
		                            <input type="datetime-local" name="date_shipment" class="form-control @error('date_shipment') is-invalid @enderror" value="{{ old('date_shipment') }}">
		                            @error('date_shipment')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_time')</label>
		                            <input type="datetime-local" name="end_time" class="form-control @error('end_time') is-invalid @enderror" value="{{ old('end_time') }}">
		                            @error('end_time')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong>{{ $message }}</strong>
	                                    </span>
                                    @enderror
		                        </div>


		                        <div class="col-md-6 col-lg-4 mx-auto">
		                            <div class="form-group">
		                                <button class="form-btn" type="submit">
		                                	<i class="fa fa-plus"></i> @lang('dashboard.add')
		                                </button>
		                            </div>
		                        </div>

		                    </form><!-- end of form -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection