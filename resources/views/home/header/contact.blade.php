@extends('home.layout.app')

@section('content')

@section('contact', __('home.contact'))  

<section class="inner-section single-banner">
    <div class="container">
        <h2>تواصل معنا</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">تواصل معنا</li>
        </ol>
    </div>
</section>
<section class="inner-section contact-part">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="contact-card"><i class="icofont-location-pin"></i>
                    <h4>الموقع</h4>
                    <p>السودان - الخرطوم - الرياض شارع عبدالله مبنى رقم واحد</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-card active"><i class="icofont-phone"></i>
                    <h4>رقم الهاتف</h4>
                    <p>
                        <a href="#">249-12-4444-313+ <span>(whatsapp)</span></a>
                        <a href="#">249-96-3343-339+</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-card"><i class="icofont-email"></i>
                    <h4>البريد الإلكتروني</h4>
                    <p><a href="#">info@sudanfarms.com</a><a href="#">sales@sudanfarms.com</a></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4417.587377557134!2d32.680970426350825!3d15.444944069437451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x168e98e5f0fd4dc9%3A0xddc302e7152bf711!2sKhartoum%2C%20Sudan!5e0!3m2!1sen!2s!4v1632122292466!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="100%" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="contact-form" action="{{ route('home.contact.store') }}" method="post">
                    @csrf

                    <h4>تواصل معنا</h4>
                    <div class="form-group">
                        <div class="form-input-group">
                            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="الإسم">
                            <i class="icofont-user-alt-3"></i>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input-group">
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" placeholder="البريد الإلكتروني">
                            <i class="icofont-email"></i>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input-group">
                            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="phone" name="phone" placeholder="رقم الهاتف">
                            <i class="icofont-phone"></i>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input-group">
                            <input class="form-control @error('body') is-invalid @enderror" value="{{ old('body') }}" type="text" name="body" placeholder="الموضوع">
                            <i class="icofont-book-mark"></i>
                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-input-group">
                            <textarea class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" name="message" placeholder="الرسالة"></textarea>
                            <i class="icofont-paragraph"></i>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="form-btn-group">
                        <i class="fas fa-envelope"></i><span>إرسال الرسالة</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section> 

@endsection 