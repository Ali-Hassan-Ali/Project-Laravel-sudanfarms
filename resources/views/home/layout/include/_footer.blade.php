<section class="news-part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-5 col-lg-6 col-xl-7">
                    <div class="news-text">
                        <h2>@lang('home.newsletter')</h2>
                        <p>@lang('home.enter_emai')</p>
                    </div>
                </div>
                <div class="col-md-7 col-lg-6 col-xl-5">
                    <form class="news-form">
                        <input type="text" placeholder=" @lang('dashboard.email')">
                        <button><span><i class="icofont-ui-email"></i> @lang('home.participation')</span></button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="intro-part">
        <div class="container">
            <div class="row intro-content">
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon"><i class="fas fa-truck"></i></div>
                        <div class="intro-content">
                            <h5>@lang('home.delivery_service')</h5>
                            @if (app()->getLocale() == 'ar')
                                    
                                <p>{{ setting('delivery_service_ar') }}</p>

                            @else

                                <p>{{ setting('delivery_service_en') }}</p>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon"><i class="fas fa-sync-alt"></i></div>
                        <div class="intro-content">
                            <h5>@lang('home.return_policy')</h5>
                            @if (app()->getLocale() == 'ar')
                                    
                                <p>{{ setting('return_policy_ar') }}</p>

                            @else

                                <p>{{ setting('return_policy_en') }}</p>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon"><i class="fas fa-headset"></i></div>
                        <div class="intro-content">
                            <h5>@lang('home.support_system')</h5>
                            @if (app()->getLocale() == 'ar')
                                    
                                <p>{{ setting('support_system_ar') }}</p>

                            @else

                                <p>{{ setting('support_system_ar') }}</p>

                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="intro-wrap">
                        <div class="intro-icon"><i class="fas fa-lock"></i></div>
                        <div class="intro-content">
                            <h5>@lang('home.payment_methods')</h5>
                            @if (app()->getLocale() == 'ar')
                                    
                                <p>{{ setting('payment_methods_ar') }}</p>

                            @else

                                <p>{{ setting('payment_methods_en') }}</p>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-part">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <a class="footer-logo" href="#">
                            <img src="{{ asset('home_files/image/logo.svg') }}" alt="logo">
                        </a>
                        <p class="footer-desc">
                            @if (app()->getLocale() == 'ar')
                                    
                                {{ setting('about_ar') }}

                            @else

                                {{ setting('about_en') }}

                            @endif
                        </p>
                        <ul class="footer-social">
                            <li><a class="icofont-facebook" target="_blank" href="{{ setting('facebook') }}"></a></li>
                            <li><a class="icofont-twitter" target="_blank" href="{{ setting('twitter') }}"></a></li>
                            <li><a class="icofont-instagram" target="_blank" href="{{ setting('instagram') }}"></a></li>
                            <li><a class="icofont-pinterest" target="_blank" href="{{ setting('pinterest') }}"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">@lang('home.quick_links')</h3>
                        <div class="footer-links">
                            <ul>
                                <li><a href="about.html">من نحن</a></li>
                                <li><a href="{{ route('manager_word.index') }}">@lang('dashboard.manager_word')</a></li>
                                <li><a href="{{ route('gallerys.index') }}">@lang('dashboard.gallerys')</a></li>
                                <li><a href="{{ route('videos.index') }}">@lang('dashboard.videos')</a></li>
                                <li><a href="{{ route('blogs.index') }}">@lang('dashboard.blogs')</a></li>
                            </ul>
                            <ul>
                                <li><a href="{{ route('common_questions.index') }}">@lang('dashboard.common_questions')</a></li>
                                <li><a href="{{ route('evacuation_responsibilatys.index') }}">@lang('dashboard.evacuation_responsibilatys')</a></li>
                                <li><a href="{{ route('terms_conditions.index') }}">@lang('dashboard.terms_conditions')</a></li>
                                <li><a href="{{ route('privacys.index') }}">@lang('dashboard.privacys')</a></li>
                                <li><a href="{{ route('copyrights.index') }}">@lang('dashboard.copyrights')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget contact">
                        <h3 class="footer-title">@lang('dashboard.contacts')</h3>
                        <ul class="footer-contact">
                            <li><i class="icofont-ui-email"></i>
                                <p>
                                    <span><a href="mailto:{{ setting('email_one') }}" class="text-dark">{{ setting('email_one') }}</a></span>
                                    <span><a href="mailto:{{ setting('email') }}" class="text-dark">{{ setting('email') }}</a></span>
                                </p>
                            </li>
                            <li><i class="icofont-ui-touch-phone"></i>
                                <p>
                                    <span><a href="tel:{{ setting('phone_one') }}" class="text-dark">{{ setting('phone_one') }}</a></span>
                                    <span><a href="tel:{{ setting('phone') }}" class="text-dark">{{ setting('phone') }}</a></span>
                                </p>
                            </li>
                            <li><i class="icofont-location-pin"></i>
                                @if (app()->getLocale() == 'ar')
                                    
                                    <p>{{ setting('map_ar') }}</p>

                                @else

                                    <p>{{ setting('map_en') }}</p>

                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="footer-widget">
                        <h3 class="footer-title">@lang('dashboard.products')</h3>
                        <div class="footer-links">
                            @php
                                $subcategory  = App\Models\Categorey::where('sub_categoreys','>','0')->latest()->paginate(5);
                                $sub_category = App\Models\Categorey::where('sub_categoreys','>','0')->paginate(5);
                            @endphp
                            <ul>
                                @foreach ($subcategory as $category)

                                    <li><a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a></li>
                                
                                @endforeach
                            </ul>
                            <ul>
                                @foreach ($sub_category as $category)

                                    <li><a href="{{ route('category.show',$category->id) }}">{{ $category->name }}</a></li>
                                
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="footer-bottom">
            <div class="container">
                <div class="content">
                    <p class="footer-copytext">
                        <span>&copy;</span> جميع حقوق الموقع محفوظة لـ<a target="_blank" href="#">مزارع السودان </a>
                    </p>
                </div>
            </div>
        </div>
        
    </footer>