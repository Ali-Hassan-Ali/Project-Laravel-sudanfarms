@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.videos'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.videos')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.videos')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section images-part">
        <div class="container">
            <div class="row">

                <div class="col-sm-12">
                    <div class="list-one">
                        <ul class="list-usntyled">
                            <li class="filter active" data-filter="all">all</li>
                            @foreach ($video_categorys as $categorey)
                            	
                            	<li class="filter" data-filter=".category-{{ $categorey->id }}">{{ $categorey->name }}</li>

                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>


            <div class="row" id="content-mix">

            	@foreach ($videos as $video)
            		
	                <div class="col-sm-6 col-md-6 col-lg-3 mix category-{{ $video->video_categories_id }}">
	                    <div class="photo video">
	                        <a title="{{ $video->name }}" href="{{ $video->video_url }}" class="venobox" data-autoplay="true" data-vbtype="video">
	                            <div class="play">
	                                <i class="fas fa-play"></i>
	                            </div>
	                        </a>
	                        <img src="{{ $video->image_path }}" alt="">
	                    </div>
	                </div>

            	@endforeach

            </div>
        </div>
    </section>

@endsection

@push('gallery')
	
    <script>
        // TRIGGER VIEW BOX 
        $(document).ready(function() {
            $('.thumbnail').viewbox();
            $('.thumbnail-2').viewbox({
                fullscreenButton: true
            });

            (function() {
                var vb = $('.popup-link').viewbox();
                $('.popup-open-button').click(function() {
                    vb.trigger('viewbox.open');
                });
                $('.close-button').click(function() {
                    vb.trigger('viewbox.close');
                });
            })();
        });
    </script>
    <script>
        $('#content-mix').mixItUp();
    </script>

@endpush