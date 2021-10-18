@extends('home.layout.app')

@section('content')

@section('title', __('home.promoted_dealers'))

<div style="margin-bottom: 100px;"></div>

<section class="inner-section inner-section2 profile-part">
	<div class="container">
	    <div class="row">
	        <div class="col-lg-12">
	            <div class="account-card">
	                <div class="account-title">
	                    <h4>إعداد باقة</h4>
	                </div>
	                <div class="account-content">
	                	<form action="{{ route('promoted_dealers.store') }}" method="post" enctype="multipart/form-data">
	                		@csrf
		                    <div class="row">
		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">إسم الشركة</label>
		                            	<input class="form-control" type="text" name="company_name_ar" placeholder="إسم الشركة">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">إسم الشركة</label>
		                            	<input class="form-control" type="text" name="company_name_en" placeholder="إسم الشركة">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group"><label class="form-label">الفئة</label>
		                                <select name="category_dealer_id" class="form-control">
		                                	@foreach (App\Models\CategoryDealer::all() as $data)
		                                    	<option value="{{ $data->id }}">{{ $data->name }}</option>
		                                	@endforeach
		                                </select>
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">البريد الإلكتروني</label>
		                            	<input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" 
		                            	placeholder="البريد الإلكتروني">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الشخص المسؤول عن الإتصال</label>
		                            	<input class="form-control" type="text" name="phone_master" placeholder="ادخل إسم">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الموبايل</label>
		                            	<input class="form-control" type="text" name="phone" placeholder="الموبايل">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الهاتف</label>
		                            	<input class="form-control" type="text" name="other_phone" placeholder="الهاتف">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الهاتف</label>
		                            	<input class="form-control" type="text" placeholder="الفاكس">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الموقع الإلكتروني</label>
		                            	<input class="form-control" type="text" name="web_site" placeholder="الموقع الإلكتروني">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الدولة</label>
		                            	<input class="form-control" type="text" name="country" placeholder="الدولة">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">الولاية</label>
		                            	<input class="form-control" type="text" name="state" placeholder="الولاية">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">المدينة</label>
		                            	<input class="form-control" type="text" name="city" placeholder="المدينة">
		                            </div>
		                        </div>

		                        <div class="col-md-6 col-lg-4">
		                            <div class="form-group">
		                            	<label class="form-label">العنوان</label>
		                            	<input class="form-control" type="text" name="title" placeholder="العنوان">
		                            </div>
		                        </div>

		                        <div class="col-sm-12">
		                            <div class="form-group">
		                            	<label class="form-label">الوصف</label>
		                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="الوصف"></textarea>
		                            </div>
		                        </div>

	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                	<label class="form-label">رفع شعار الشركة</label>
	                                    <input class="form-control" type="file" name="company_logo">
	                                </div>
	                            </div>

	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                	<label class="form-label">شهاده الشركه</label>
	                                    <input class="form-control" type="file" name="company_certificate">
	                                </div>
	                            </div>

	                            <div class="col-md-6 col-lg-4 mx-auto">
	                                <div class="form-group">
	                                    <button class="form-btn" type="submit">حفظ المعلومات و المتابعة</button>
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