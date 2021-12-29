@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.common_questions'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.common_questions')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.common_questions')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section faq-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="faq-parent">
                    	@foreach ($common_questions as $common_question)
                    		
	                        <div class="faq-child">
	                            <div class="faq-que"><button>{{ $common_question->question }}</button></div>
	                            <div class="faq-ans">
	                                {!! $common_question->answer !!}
	                            </div>
	                        </div>

                    	@endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection