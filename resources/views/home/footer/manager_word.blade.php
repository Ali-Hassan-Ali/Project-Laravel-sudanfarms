@extends('home.layout.app')

@section('content')

@section('contact', __('home.manager_word'))

    <section class="single-banner inner-section">
        <div class="container">
            <h2>@lang('dashboard.manager_word')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.manager_word')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-content">
                        <h3 class="details-name details-name3">
                        	@lang('dashboard.manager_word')
                        </h3>
                        @if (app()->getLocale() == 'ar')

                        	{!! setting('manager_word_ar') !!}
                        	
                        @else

                        	{!! setting('manager_word_en') !!}

                        @endif

                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="product-details-frame frame2">
                        <div class="tab-descrip">
                        	<img src="images/video.jpg" alt="video">
                        	<a title="كلمة المدير" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection