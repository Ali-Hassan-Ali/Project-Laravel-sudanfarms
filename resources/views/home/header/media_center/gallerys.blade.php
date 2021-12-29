@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.gallerys'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.gallerys')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.gallerys')</li>
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

                        	@foreach ($gallery_categorys as $index=>$category)

                            	<li class="filter" data-filter=".category-{{ $category->id }}">{{ $category->name }}</li>

                        	@endforeach

                        </ul>
                    </div>
                </div>
            </div>


            <div class="row" id="content-mix">

            	@foreach ($gallerys as $gallery)
            		
	                <div class="col-sm-6 col-md-6 col-lg-3 mix category-{{ $gallery->gallery_categories_id }}">
	                    <a href="{{ $gallery->image_path }}" class="thumbnail thumbnail-2" title="{{ $gallery->name }}" contenteditable="link-work">
	                        <div class="photo">
	                            <div class="over">
	                                <i class="fas fa-eye"></i>
	                            </div>
	                            <img src="{{ $gallery->image_path }}" alt="">
	                        </div>
	                    </a>
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