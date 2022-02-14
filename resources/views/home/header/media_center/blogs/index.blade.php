@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.blogs'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.blogs')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.blogs')</li>
            </ol>
        </div>
    </section>

    <section class="inner-section blog-grid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-filter">
                                <div class="filter-show"><label class="filter-label">عرض :</label><select class="form-select filter-select">
                                        <option value="1">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select></div>
                                <div class="filter-short"><label class="filter-label">ترتيب بحسب :</label><select class="form-select filter-select">
                                        <option selected="">الإفتراضي</option>
                                        <option value="3">آخر الأخبار</option>
                                        <option value="1">التاريخ</option>
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	@foreach ($blogs as $blog)
                    		
	                        <div class="col-md-6 col-lg-6">
	                            <div class="blog-card">
	                                <div class="blog-media"><a class="blog-img" href="{{ route('blogs.show',$blog->id) }}">
	                                	<img src="{{ $blog->image_path }}" alt="blog"></a>
	                                </div>
	                                <div class="blog-content">
	                                    <ul class="blog-meta">
	                                        {{-- <li><i class="fas fa-user"></i><span>{{ $blog->user->name }}</span></li> --}}
	                                        <li><i class="fas fa-calendar-alt"></i><span>{{ $blog->created_at }}</span></li>
	                                    </ul>
	                                    <h4 class="blog-title">
                                            <a href="{{ route('blogs.show',$blog->id) }}">{{ $blog->title }}</a>
                                        </h4>
	                                    {{-- <p class="blog-desc">{{ $blog->description }}</p> --}}
	                                    <a class="blog-btn" href="{{ route('blogs.show',$blog->id) }}"><span>إقرء المزيد</span>
	                                        <i class="icofont-arrow-left"></i>
	                                    </a>
	                                </div>
	                            </div>
	                        </div>

                    	@endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bottom-paginate">
                                @include('paginations.defulte',['products'=>$blogs])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-lg-4">
                    <div class="blog-widget">
                        <h3 class="blog-widget-title">إبحث عن خبر</h3>
                        <form class="blog-widget-form" action="{{ route('blogs.index') }}" method="get">
                            <input type="text" name="search" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            <button class="icofont-search-1"></button>
                        </form>
                    </div>
                    <div class="blog-widget">
                        <h3 class="blog-widget-title">الأخبار الشائعة</h3>
                        <ul class="blog-widget-feed">
                            @foreach ($random_blogs as $in_blog)

                                <li>
                                    <a class="blog-widget-media" href="{{ route('blogs.show',$in_blog->id) }}">
                                        <img src="{{ $in_blog->image_path }}" alt="blog-widget">
                                    </a>
                                    <h6 class="blog-widget-text">
                                        <a href="{{ route('blogs.show',$in_blog->id) }}">{{ $in_blog->title }}</a>
                                        <span>{{ $in_blog->created_at }}</span>
                                    </h6>
                                </li>
                                
                            @endforeach
                        </ul>
                    </div>
                    <div class="blog-widget">
                        <h3 class="blog-widget-title">@lang('dashboard.social_links')</h3>
                        <ul class="blog-widget-social">
                            <li><a target="_blank" href="{{ setting('facebook') }}" class="icofont-facebook"></a></li>
                            <li><a target="_blank" href="{{ setting('twitter') }}" class="icofont-twitter"></a></li>
                            <li><a target="_blank" href="{{ setting('instagram') }}" class="icofont-instagram"></a></li>
                            <li><a target="_blank" href="{{ setting('whatsapp') }}" class="fab fa-whatsapp"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection