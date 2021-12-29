@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.manager_word'))

    <section class="single-banner inner-section pt-5">
        <div class="container">
            <h2>@lang('dashboard.manager_word')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
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
                @php
                    $user = App\Models\User::find(1);
                @endphp
                <div class="col-lg-4">
                    <div class="product-details-frame frame2">
                        <div class="tab-descrip">
                        	<img src="{{ $user->image_path }}" alt="video">
                        	<a title="كلمة المدير" href="{{ setting('link_video') }}" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection