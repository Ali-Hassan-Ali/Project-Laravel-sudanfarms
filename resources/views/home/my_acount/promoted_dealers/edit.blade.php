@extends('home.layout.app')

@section('content')

@section('title', __('home.promoted_dealers'))

<div style="margin-bottom: 100px;"></div>

<section class="inner-section inner-section2 profile-part">
	<div class="container">
		
		@php
            $user = App\Models\PromotedDealer::where('user_id',auth()->user()->id)->first();
        @endphp

		@if ($user->status == '0')

	    	<div class="alert alert-danger py-3 text-center" role="alert">
			  لم يتم تفعيل الحساب
			</div>

		@endif

	    <div class="row">
	        <div class="col-lg-12">
	            <div class="account-card">
	                <div class="account-title">
	                    <h4>إعداد باقة</h4>
	                </div>
	                <div class="account-content">
	                	<form action="{{ route('promoted_dealers.update') }}" method="post" enctype="multipart/form-data">
	                		@csrf
		                    <div class="row">
		                    	@include('partials._errors')
		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.company_name_ar')</label>
		                            	<input class="form-control" type="text" name="company_name_ar" 
		                            	value="{{ $user->company_name_ar }}" placeholder="@lang('dashboard.company_name_ar')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.company_name_en')</label>
		                            	<input class="form-control" type="text" name="company_name_en" value="{{ $user->company_name_en }}" placeholder="@lang('dashboard.company_name_en')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.promotion')</label>
		                                <select name="category_dealer_id" class="form-control">
		                                	@foreach (App\Models\CategoryDealer::all() as $data)
		                                    	<option value="{{ $data->id }}" {{ $data->id == $user->category_dealer_id ? 'selected' : '' }}>{{ $data->name }}</option>
		                                	@endforeach
		                                </select>
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.email')</label>
		                            	<input class="form-control" minlength="9" type="email" name="email" value="{{ $user->email }}" 
		                            	placeholder="البريد الإلكتروني">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.phone_master')</label>
		                            	<input class="form-control" minlength="9" type="tel" name="phone_master" value="{{ $user->phone_master }}" 
		                            	placeholder="+240-114929635">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.phone')</label>
		                            	<input class="form-control" minlength="9" type="tel" name="phone" value="{{ $user->phone }}" 
		                            	 placeholder="+240-114929635">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.other_phone')</label>
		                            	<input class="form-control" type="tel" name="other_phone" value="{{ $user->other_phone }}" 
		                            	placeholder="+240-114929635">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.web_site')</label>
		                            	<input class="form-control" type="text" name="web_site" value="{{ $user->web_site }}" 
		                            	placeholder="@lang('dashboard.web_site')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.country')</label>
		                            	<input class="form-control" type="text" name="country" value="{{ $user->country }}" 
		                            	placeholder="@lang('dashboard.country')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.state')</label>
		                            	<input class="form-control" type="text" name="state" value="{{ $user->state }}" 
		                            	placeholder="@lang('lang.state')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('dashboard.city')</label>
		                            	<input class="form-control" type="text" name="city" value="{{ $user->city }}" 
		                            	placeholder="@lang('dashboard.city')">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
                            			<label class="form-label">@lang('dashboard.title')</label>
		                            	<input class="form-control" type="text" name="title" value="{{ $user->title }}" 
		                            	placeholder="@lang('dashboard.title')">
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                            <div class="form-group">
		                            	<label class="form-label">@lang('lang.company_profile')</label>
		                                <textarea name="description" class="form-control" cols="30" rows="10" 
		                                placeholder="@lang('lang.company_profile')">{{ $user->description }}</textarea>
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
				                        <img src="{{ $user->logo_path }}" style="width: 100px" class="img-thumbnail company-logo" alt="">
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
				                        <img src="{{ $user->file_path }}" style="width: 100px" class="img-thumbnail company-certificate" alt="">
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