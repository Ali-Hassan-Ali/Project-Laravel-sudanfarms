@extends('home.layout.app')

@section('content')

@section('title', __('home.about'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('lang.about_me')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('lang.about_me')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section about-company">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>@lang('lang.about_me_web')</h2>
                        <p>
                            @if (app()->getLocale() == 'ar')
                                
                                {{ setting('about_me_ar') }}

                            @else

                                {{ setting('about_me_en') }}    

                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <img src="{{ asset('home_files/image/blog/08.jpg') }}" alt="about">
                        <img src="{{ asset('home_files/image/blog/01.jpg') }}" alt="about">
                        <img src="{{ asset('home_files/image/blog/06.jpg') }}" alt="about">
                        <img src="{{ asset('home_files/image/blog/07.jpg') }}" alt="about">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="inner-section about-testimonial">
        <div class="container">
            <ul class="testi-slider slider-arrow">
                @foreach ($about_customers as $data)
                    
                    <li>
                        <div class="testi-content"><a class="testi-img" href="#">
                            <img src="{{ $data->image_path }}" alt="testimonial"></a>
                            <div class="testi-quote"><i class="icofont-quote-left"></i>
                                <p>{!! $data->body  !!}</p>
                                <h4>{{ $data->name }}</h4>
                                <h6>{{ $data->title }}</h6>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
        </div>
    </section>

    <section class="about-choose">
        <div class="container">
            <div class="row">
                <div class="col-11 col-md-9 col-lg-7 col-xl-6 mx-auto">
                    <div class="section-heading">
                        <h2>@lang('lang.why_hosen')</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="choose-card">
                        <div class="choose-icon"><i class="icofont-fruits"></i></div>
                        <div class="choose-text">
                            <h4>@lang('lang.target')</h4>
                            <p>
                                @if (app()->getLocale() == 'ar')
                                    
                                    {{ setting('target_ar') }}

                                @else

                                    {{ setting('target_en') }}    

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-card">
                        <div class="choose-icon"><i class="icofont-vehicle-delivery-van"></i></div>
                        <div class="choose-text">
                            <h4>@lang('lang.the_message')</h4>
                            <p>
                                @if (app()->getLocale() == 'ar')
                                    
                                    {{ setting('the_message_ar') }}

                                @else

                                    {{ setting('the_message_en') }}    

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-card">
                        <div class="choose-icon"><i class="icofont-loop"></i></div>
                        <div class="choose-text">
                            <h4>@lang('lang.vision')</h4>
                            <p>
                                @if (app()->getLocale() == 'ar')
                                    
                                    {{ setting('vision_ar') }}

                                @else

                                    {{ setting('vision_en') }}    

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="choose-card">
                        <div class="choose-icon"><i class="icofont-support"></i></div>
                        <div class="choose-text">
                            <h4>@lang('lang.rate_us')</h4>
                            <p>
                                @if (app()->getLocale() == 'ar')
                                    
                                    {{ setting('rate_us_ar') }}

                                @else

                                    {{ setting('rate_us_en') }}    

                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection