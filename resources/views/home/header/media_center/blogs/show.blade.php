@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.blogs') . ' | ' . __('dashboard.blog_details'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.blog_details')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blogs.index') }}">@lang('dashboard.blogs')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.blog_details')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section blog-details-part">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-xl-10">
                    <article class="blog-details">
                        <a class="blog-details-thumb" href="" style="width:100%">
                        <img src="{{ $blog->image_path }}" alt="blog"></a>
                        <div class="blog-details-content">
                            <ul class="blog-details-meta">
                                <li><i class="icofont-ui-calendar"></i><span>{{ $blog->created_at }}</span></li>
                                <li><i class="icofont-user-alt-3"></i><span>@lang('dashboard.admin')</span></li>
                                <li><i class="icofont-speech-comments"></i><span>@lang('home.commints') {{ $commints->count() }}</span></li>
                                {{-- <li><i class="icofont-share-boxed"></i><span>34 مشاركة</span></li> --}}
                            </ul>
                            <h2 class="blog-details-title">{{ $blog->title }}</h2>
                            <p class="blog-details-desc">{!! $blog->description !!}</p>
                        </div>
                    </article>
                    <div class="blog-details-profile">
                    	<a href=""><img src="{{ $blog->user->image_path }}" alt="avatar"></a>
                        <h3>{{ $blog->user->name }}</h3>
                        <h4>{{ $blog->user->email }}</h4>
                        <ul>
                            <li><a href="{{ setting('facebook') }}" class="icofont-facebook"></a></li>
                            <li><a href="{{ setting('twitter') }}" class="icofont-twitter"></a></li>
                            <li><a href="{{ setting('instagram') }}" class="icofont-instagram"></a></li>
                            <li><a href="{{ setting('pinterest') }}" class="icofont-pinterest"></a></li>
                        </ul>
                    </div>
                    <div class="blog-details-navigate">
                        <div class="row">
                        	@if (!$next_blog == '0')
                        		
	                            <div class="col-md-6 col-lg-6">
	                                <div class="blog-details-prev">
	                                    <h4><a href="{{ route('blogs.show',$next_blog->id) }}">{{ $next_blog->title }}</a>
	                                    </h4><a class="nav-arrow" href="{{ route('blogs.show',$next_blog->id) }}"> <i class="icofont-arrow-right"></i>@lang('lang.next_blog')</a>
	                                </div>
	                            </div>

                        	@endif

                        	@if (!$prev_blog == '0')
                        		
	                            <div class="col-md-6 col-lg-6">
	                                <div class="blog-details-next">
	                                    <h4><a href="{{ route('blogs.show',$prev_blog->id) }}">{{ $prev_blog->title }}</a>
	                                    </h4><a class="nav-arrow" href="{{ route('blogs.show',$prev_blog->id) }}">@lang('lang.prev_blog') <i class="icofont-arrow-left"></i></a>
	                                </div>
	                            </div>

                        	@endif
                        </div>
                    </div>
                    <div class="blog-details-comment">
                        <h3 class="comment-title">@lang('home.commints') {{ $commints->count() }}</h3>
                        <ul class="comment-list">
                            @foreach ($commints as $commint)

                            <li class="comment-item">
                                <div class="comment-media">
                                    <a class="comment-avatar" href="#">
                                        <img src="{{ $commint->user->image_path }}" alt="review">
                                    </a>
                                    <h6 class="comment-meta">
                                        <a href="#">{{ $commint->user->name }}</a>
                                        <span>{{ $commint->created_at }}</span>
                                    </h6>
                                </div>
                                <p class="comment-desc">{{ $commint->message }}</p>

                                <ul class="comment-reply-list">

                                    @if ($commint->commints_id == $commint->id)
                                        
                                        <li class="comment-reply-item">
                                            <div class="comment-media">
                                                <a class="comment-avatar" href="#">
                                                    <img src="{{ $commint->user->image_path }}" alt="review">
                                                <h6 class="comment-meta">
                                                    <a href="#">{{ $commint->user->name }}</a>
                                                    <span>{{ $commint->created_at }}</span>
                                                </h6>
                                            </div>
                                            <p class="comment-desc">{{ $commint->message }}</p>
                                            <form class="comment-reply">
                                                <input type="text" placeholder="الرد على التعليق">
                                                <button><i class="icofont-reply"></i>رد</button>
                                            </form>
                                        </li>

                                    @endif

                                </ul>

                            </li>
                                
                            @endforeach
                        </ul>
                    </div>
                    
                    @auth

                        <form class="blog-details-form" action="{{ route('commints.store') }}" method="post">
                            @csrf
                            @method('post')

                            <h3 class="details-form-title">@lang('home.commints')</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" placeholder="@lang('home.enter_commints')"></textarea>
                                    </div>
                                </div>

                                <input type="number" hidden name="blog_id" value="{{ $blog->id }}">

                            </div>
                            <button class="form-btn">@lang('dashboard.add')</button>
                        </form>
                        
                    @else

                        <a href="{{ route('home.login') }}" class="form-btn">@lang('lang.no_login')</a>

                    @endauth
                </div>
            </div>
        </div>
    </section>

@endsection