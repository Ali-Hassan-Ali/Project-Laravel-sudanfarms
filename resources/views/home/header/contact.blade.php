@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.contacts'))  

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.contacts')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page"> @lang('dashboard.contacts')</li>
        </ol>
    </div>
</section>

<section class="inner-section contact-part">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="contact-card"><i class="icofont-location-pin"></i>
                    <h4>@lang('dashboard.map')</h4>
                    @if (app()->getLocale() == 'ar')
                        <p>{{ setting('contact_map_ar') }}</p>
                    @else
                        <p>{{ setting('contact_map_en') }}</p>
                    @endif
                    
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-card active"><i class="icofont-phone"></i>
                    <h4>@lang('dashboard.phone')</h4>
                    <p>
                        <a href="tel:{{ setting('contact_phone_whatsapp') }}">{{ setting('contact_phone_whatsapp') }} <span>(whatsapp)</span></a>
                        <a href="tel:{{ setting('contact_phone') }}">{{ setting('contact_phone') }}</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="contact-card"><i class="icofont-email"></i>
                    <h4>@lang('dashboard.email')</h4>
                    <p>
                        <a href="mailto:{{ setting('contact_email_one') }}">{{ setting('contact_email_one') }}</a>
                        <a href="mailto:{{ setting('contact_email_tow') }}">{{ setting('contact_email_tow') }}</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="contact-map">
                    <iframe src="{{ setting('link_map') }}" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="100%" aria-hidden="false" tabindex="0" loading="lazy"></iframe>
                </div>
            </div>
            <div class="col-lg-6">
                <form class="contact-form" action="{{ route('home.contact.store') }}" method="post">
                    @csrf

                    <h4>@lang('dashboard.contacts')</h4>
                    <div class="form-group">
                        <div class="form-input-group">
                            <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text" name="name" placeholder="@lang('dashboard.name')">
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
                            <input class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email" placeholder="@lang('dashboard.email')">
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
                            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="phone" name="phone" placeholder="@lang('dashboard.phone')">
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
                            <input class="form-control @error('body') is-invalid @enderror" value="{{ old('body') }}" type="text" name="body" placeholder="@lang('dashboard.body')">
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
                            <textarea class="form-control @error('message') is-invalid @enderror" value="{{ old('message') }}" name="message" placeholder="@lang('dashboard.message')"></textarea>
                            <i class="icofont-paragraph"></i>
                            @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="form-btn-group">
                        <i class="fas fa-envelope"></i><span>@lang('home.send')</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section> 

@endsection 