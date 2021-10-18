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
                        <h4>الملف الشخصي</h4><button data-bs-toggle="modal" data-bs-target="#profile-edit">تعديل الملف الشخصي</button>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="profile-image"><a href="#">
                                	<img src="{{ auth()->user()->image_path }}" class="rounded-circle" alt="user" width="150"></a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">الإسم</label>
                                	<input class="form-control" type="text" name="name" value="{{ auth()->user()->name }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">البريد الإلكتروني</label>
                                	<input class="form-control" type="email" name="email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-lg-2 form-group">
                                <div class="profile-btn"><a href="change-password.html">تغيير كلمة المرور</a></div>
                            </div>

                            <div class="col-lg-2"></div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">الهاتف</label>
                                	<input class="form-control" type="phone" name="phone" value="{{ auth()->user()->phone }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">البلد</label>
                                	<input class="form-control" type="text" name="country" value="{{ auth()->user()->country }}">
                                </div>
                            </div>

                            <div class="col-lg-2">
                            </div>

                            <div class="col-lg-2">
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">المدينة</label>
                                	<input class="form-control" type="text" name="city" value="{{ auth()->user()->city }}">
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                	<label class="form-label">العنوان</label>
                                	<input class="form-control" type="text" name="title" value="{{ auth()->user()->title }}">
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
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact active">
                                    <h6><i class="fas fa-user" style="margin-left: 9px"></i>إشترك لتصبح تاجر</h6>
                                    <a href="{{ route('promoted_dealers.index') }}">ترقية</a>
                                    <ul>
                                        <li><button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button></li>
                                        <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                    </ul>
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