@extends('home.layout.app')

@section('content')

@section('contact', __('dashboard.files'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.download_file')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.download_file')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section images-part">
        <div class="container">
            <div class="row">
            	@foreach ($files as $file)
            		
	                <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
	                    <div class="attachment-box">
	                        <img src="{{ asset('home_files/image/attach-pdf.png') }}" alt="">
	                        <h4>{{ $file->title }}</h4>
	                        {{-- <h4>ملف PDF</h4> --}}
	                        <a href="{{ $file->file_path }}" download="{{ $file->file_path }}">
	                        	@lang('dashboard.download') <i class="fas fa-arrow-circle-down"></i>
	                        </a>
	                    </div>
	                </div>

            	@endforeach

            </div>
        </div>
    </section>

@endsection