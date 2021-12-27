@extends('home.layout.app')

@section('content')

@section('title', __('home.promoted_dealers'))

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.dashboard')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.dashboard')</li>
        </ol>
    </div>
</section>

<div style="margin-bottom: 100px;"></div>

<section class="inner-section inner-section2 profile-part">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="account-card">
	                <div class="account-title">
	                    <h4>@lang('lang.bouquet_setup')</h4>
	                </div>
	                <div class="account-content">

	                	<form action="{{ route('promoted_dealers.store') }}" method="post" enctype="multipart/form-data">
	                		@csrf
		                    <div class="row">
		                    	@php
		                    		$names  = ['company_name_ar','company_name_en'];
		                    	@endphp

		                    	@foreach ($names as $name)

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                                <label>@lang('dashboard.' . $name)</label>
		                                <input type="text" name="{{ $name }}" placeholder="@lang('dashboard.' . $name)" class="form-control @error($name) is-invalid @enderror" value="{{ old($name) }}">
		                                @error($name)
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>
		                            
		                        @endforeach

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.promotion')</label>
		                                <select name="category_dealer_id" id="category-dealer-id" required class="form-control">
		                                    	<option value="">@lang('lang.promotion_categorey')</option>
		                                	@foreach (App\Models\CategoryDealer::all() as $data)
		                                    	<option value="{{ $data->id }}" data-id="{{ $data->id }}"
		                                    		{{ old('category_dealer_id') == $data->id ? 'selected' : '' }}>{{ $data->name }}</option>
		                                	@endforeach
		                                </select>
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.email')</label>
		                            	<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ auth()->user()->email }}" 
		                            	placeholder="@lang('lang.email')">
		                            	@error('email')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.phone_master')</label>
		                            	<input class="form-control @error('phone_master') is-invalid @enderror" value="{{ old('phone_master') }}" type="number" name="phone_master" placeholder="@lang('lang.phone_master')">
		                            	@error('phone_master')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.phone')</label>
		                            	<input class="form-control @error('phone') is-invalid @enderror" value="{{ auth()->user()->phone }}" type="number" name="phone" placeholder="@lang('dashboard.phone')">
		                            	@error('phone')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.other_phone')</label>
		                            	<input class="form-control @error('other_phone') is-invalid @enderror" value="{{ old('other_phone') }}" type="number" name="other_phone" placeholder="@lang('lang.other_phone')">
		                            	@error('other_phone')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.web_site')</label>
		                            	<input class="form-control @error('web_site') is-invalid @enderror" type="text" value="{{ old('web_site') }}" name="web_site" placeholder="@lang('dashboard.web_site')">
		                            	@error('web_site')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.country')</label>
		                            	<input class="form-control @error('country') is-invalid @enderror" type="text" value="{{ auth()->user()->country }}" name="country" placeholder="@lang('dashboard.country')">
		                            	@error('country')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.state')</label>
		                            	<input class="form-control @error('state') is-invalid @enderror" type="text" value="{{ auth()->user()->state }}" name="state" placeholder="@lang('lang.state')">
		                            	@error('state')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.city')</label>
		                            	<input class="form-control @error('city') is-invalid @enderror" type="text" value="{{ auth()->user()->city }}" name="city" placeholder="@lang('dashboard.city')">
		                            	@error('city')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.title')</label>
		                            	<input class="form-control @error('title') is-invalid @enderror" type="text" value="{{ auth()->user()->title }}" name="title" placeholder="@lang('dashboard.title')">
		                            	@error('title')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.company_profile')</label>
		                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" placeholder="@lang('lang.company_profile')">{{ old('description') }}</textarea>
		                                @error('description')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
		                            </div>
		                        </div>

	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                	<label class="form-label">@lang('lang.company_logo')</label>
	                                    <input class="form-control" type="file" id="company-logo" name="company_logo">
	                                    @error('company_logo')
			                                <span class="invalid-feedback" role="alert">
			                                    <strong>{{ $message }}</strong>
			                                </span>
			                            @enderror
	                                </div>
	                            </div>

	                            <div class="col-sm-12">
		                            <div class="form-group">
				                        <img src="#" style="width: 100px" class="img-thumbnail company-logo" alt="">
				                    </div>
				                </div>

	                            <div class="col-sm-12" id="company-certificate">
	                                <div class="form-group">
	                                	<label class="form-label">@lang('lang.commercial_license')</label>
	                                    <input class="form-control" type="file" name="company_certificate">
	                                </div>
	                            </div>

	                            <div class="col-sm-12">
		                            <div class="form-group">
				                        <img src="#" style="width: 100px" class="img-thumbnail company-certificate" alt="">
				                    </div>
				                </div>

	                            <div class="col-md-6 col-lg-4 mx-auto">
	                                <div class="form-group">
	                                    <button class="form-btn" type="submit">@lang('lang.save')</button>
	                                </div>
	                            </div>

		                    </div>
	                    </form>
	                </div>
	            </div>{{-- account-card --}}
	        </div>{{-- col-lg-12 --}}
    	</div>{{-- row --}}
	</div>{{-- container --}}
</section>

@endsection 