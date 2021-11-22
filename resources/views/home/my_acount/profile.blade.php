@extends('home.layout.app')

@section('content')

@section('title', __('home.prfile'))    

<section class="inner-section single-banner">
    <div class="container">
        <h2>لوحة التحكم</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('change_password.index') }}"><h4>الملف الشخصي</h4></a>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="profile-image">
                            	   <img src="{{ auth()->user()->image_path }}" class="rounded-circle" alt="user" width="150">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">الإسم</label>
                                	<input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ auth()->user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">البريد الإلكتروني</label>
                                	<input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{ auth()->user()->email }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-2 form-group">
                                <div class="profile-btn"><a href="{{ route('change_password.index') }}">تغيير كلمة المرور</a></div>
                            </div>

                            <div class="col-lg-2"></div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">الهاتف</label>
                                	<input class="form-control @error('phone') is-invalid @enderror" type="phone" name="phone" value="{{ auth()->user()->phone }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">البلد</label>
                                	<input class="form-control @error('country') is-invalid @enderror" type="text" name="country" value="{{ auth()->user()->country }}">
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-2">
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">المدينة</label>
                                	<input class="form-control @error('city') is-invalid @enderror" type="text" name="city" value="{{ auth()->user()->city }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">العنوان</label>
                                	<input class="form-control @error('title') is-invalid @enderror" type="text" name="title" value="{{ auth()->user()->title }}">
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 mx-auto">
                                <div class="form-group">
                                    <button class="form-btn" type="submit">حفظ معلومات الملف</button>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>الطلبات</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6><i class="fas fa-list"></i> الطلبات ( 5)</h6>
                                    <a href="orders-users.html">التفاصيل</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6><i class="fas fa-times"></i> طلبات غير متوفرة ( 3)</h6>
                                    <a href="orders-users.html">التفاصيل</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>المراسلات و الترقية</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6><i class="fas fa-envelope"></i> المراسلات ( 0)</h6>
                                    <a href="messages.html">المراسلات</a>
                                    <ul>
                                        <li>
                                        	<button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                        </li>
                                        <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                    </ul>
                                </div>
                            </div>
                            @php
                                $user = App\Models\PromotedDealer::where('user_id',auth()->user()->id)->first();
                                $products = App\Models\Product::where('user_id',auth()->user()->id)->count();
                            @endphp
                            @if ($user)
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact active">
                                    <h6><i class="fas fa-user" style="margin-left: 9px"></i> {{ $user->category_dealer->name }} | </h6>
                                    <a href="{{ route('promoted_dealers.edit') }}">@lang('dashboard.edit')</a>
                                    <ul>
                                        <li>
                                            <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                        </li>
                                        <li>
                                            <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>    
                            @else
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact active">
                                    <h6><i class="fas fa-user" style="margin-left: 9px"></i>إشترك لتصبح تاجر</h6>
                                    <a href="{{ route('promoted_dealers.index') }}">ترقية</a>
                                    <ul>
                                        <li>
                                            <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                        </li>
                                        <li>
                                            <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>المنتجات</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6><i class="fas fa-list"></i> @lang('dashboard.products')({{ $products }})</h6>
                                    <a href="{{ route('products.index') }}">التفاصيل</a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6><i class="fas fa-times"></i> @lang('dashboard.add') @lang('dashboard.products')</h6>
                                    <a href="{{ route('products.create') }}">@lang('dashboard.add')</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection 