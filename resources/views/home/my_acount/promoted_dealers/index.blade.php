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
	                	@include('partials._errors')
	                	<form action="{{ route('promoted_dealers.store') }}" method="post" enctype="multipart/form-data">
	                		@csrf
		                    <div class="row">
		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.company_name_ar')</label>
		                            	<input class="form-control" type="text" name="company_name_ar" placeholder="@lang('dashboard.company_name_ar')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.company_name_en')</label>
		                            	<input class="form-control" type="text" name="company_name_en" placeholder="@lang('dashboard.company_name_en')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.promotion')</label>
		                                <select name="category_dealer_id" id="category-dealer-id" required class="form-control">
		                                    	<option value="">@lang('lang.promotion_categorey')</option>
		                                	@foreach (App\Models\CategoryDealer::all() as $data)
		                                    	<option value="{{ $data->id }}" data-id="{{ $data->id }}">{{ $data->name }}</option>
		                                	@endforeach
		                                </select>
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.email')</label>
		                            	<input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" 
		                            	placeholder="@lang('lang.email')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.phone_master')</label>
		                            	<input class="form-control" value="{{ old('phone_master') }}" type="number" name="phone_master" placeholder="@lang('lang.phone_master')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.phone')</label>
		                            	<input class="form-control" value="{{ old('phone') }}" type="number" name="phone" placeholder="@lang('dashboard.phone')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.other_phone')</label>
		                            	<input class="form-control" value="{{ old('other_phone') }}" type="number" name="other_phone" placeholder="@lang('lang.other_phone')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.web_site')</label>
		                            	<input class="form-control" type="text" value="{{ old('web_site') }}" name="web_site" placeholder="@lang('dashboard.web_site')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.country')</label>
		                            	<input class="form-control" type="text" value="{{ old('country') }}" name="country" placeholder="@lang('dashboard.country')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.state')</label>
		                            	<input class="form-control" type="text" value="{{ old('state') }}" name="state" placeholder="@lang('lang.state')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.city')</label>
		                            	<input class="form-control" type="text" value="{{ old('city') }}" name="city" placeholder="@lang('dashboard.city')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.title')</label>
		                            	<input class="form-control" type="text" value="{{ old('title') }}" name="title" placeholder="@lang('dashboard.title')">
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.company_profile')</label>
		                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="@lang('lang.company_profile')">{{ old('description') }}</textarea>
		                            </div>
		                        </div>

	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                	<label class="form-label">@lang('lang.company_logo')</label>
	                                    <input class="form-control" type="file" id="company-logo" name="company_logo">
	                                </div>
	                            </div>

	                            <div class="col-sm-12">
		                            <div class="form-group">
				                        <img src="#" style="width: 100px" class="img-thumbnail company-logo" alt="">
				                    </div>
				                </div>

	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                	<label class="form-label">@lang('lang.commercial_license')</label>
	                                    <input class="form-control" type="file" id="company-certificate" name="company_certificate">
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