<aside class="main-sidebar">

    <section class="sidebar">

        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">

            @if (auth()->user()->hasPermission('dashboard_read'))
                <li class="{{ Route::Is('dashboard.welcome') ? 'active' : '' }}">
                    <a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i><span>@lang('dashboard.dashboard')</span></a>
                </li>
            @endif

            <li class="{{ Route::Is('dashboard.promoted_dealer_count') ? 'active' : '' }}">
                <a href="{{ route('dashboard.promoted_dealer_count') }}">
                    <i class="fa fa-dashboard"></i><span>@lang('dashboard.promoted_dealer_count')</span>
                </a>
            </li>

            <li class="{{ Route::Is('dashboard.price_tables.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.price_tables.index') }}">
                    <i class="fa fa-dashboard"></i><span>@lang('dashboard.price_tables')</span>
                </a>
            </li>

            <li class="{{ Route::Is('dashboard.settings.units.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.settings.units.index') }}">
                    <i class="fa fa-dashboard"></i><span>@lang('dashboard.units')</span>
                </a>
            </li>

            <li class="{{ Route::Is('dashboard.orders.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.orders.index') }}">
                    <i class="fa fa-dashboard"></i><span>@lang('dashboard.orders')</span>
                </a>
            </li>

            <li class="{{ Route::Is('dashboard.currenccys.index') ? 'active' : '' }}">
                <a href="{{ route('dashboard.currenccys.index') }}">
                    <i class="fa fa-dashboard"></i><span>@lang('dashboard.currenccys')</span>
                </a>
            </li>

            @if (auth()->user()->hasPermission('users_read'))
                <li class="{{ Route::Is(['dashboard.users.index','dashboard.users.create','dashboard.users.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.users.index') }}"><i class="fas fa-users-cog"></i><span> @lang('dashboard.users') </span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('clients_read'))
                <li class="{{ Route::Is(['dashboard.clients.index','dashboard.clients.create','dashboard.clients.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.clients.index') }}"><i class="fa fa-users"></i><span>@lang('dashboard.clients')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('categoreys_read'))
                <li class="{{ Route::Is(['dashboard.categoreys.index','dashboard.categoreys.create','dashboard.categoreys.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.categoreys.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.categories')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('sub_categoreys_read'))
                <li class="{{ Route::Is(['dashboard.sub_categoreys.index','dashboard.sub_categoreys.create','dashboard.sub_categoreys.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.sub_categoreys.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.sub_categoreys')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('packages_read'))
                <li class="{{ Route::Is(['dashboard.packages.index','dashboard.packages.create','dashboard.packages.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.packages.index') }}"><i class="fa fa-list-alt"></i><span>@lang('dashboard.packages')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('products_read'))
                <li class="{{ Route::Is(['dashboard.products.index','dashboard.products.create','dashboard.products.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.products.index') }}"><i class="fab fa-product-hunt"></i><span> @lang('dashboard.products') </span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('category_dealers_read'))
                <li class="{{ Route::Is(['dashboard.category_dealers.index','dashboard.category_dealers.create','dashboard.category_dealers.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.category_dealers.index') }}"><i class="fab fa-product-hunt"></i><span> @lang('dashboard.category_dealers') </span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('promoted_dealers_read'))
                <li class="{{ Route::Is(['dashboard.promoted_dealers.index','dashboard.promoted_dealers.create','dashboard.promoted_dealers.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.promoted_dealers.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.promoted_dealers')</span></a>
                </li>
            @endif


            @if (auth()->user()->hasPermission('gallery_categorys_read'))
                <li class="{{ Route::Is(['dashboard.settings.gallery_categorys.index','dashboard.settings.gallery_categorys.create','dashboard.settings.gallery_categorys.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.gallery_categorys.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.gallery_categorys')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('gallerys_read'))
                <li class="{{ Route::Is(['dashboard.settings.gallerys.index','dashboard.settings.gallerys.create','dashboard.settings.gallerys.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.gallerys.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.gallerys')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('video_categorys_read'))
                <li class="{{ Route::Is(['dashboard.settings.video_categorys.index','dashboard.settings.video_categorys.create','dashboard.settings.video_categorys.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.video_categorys.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.video_categorys')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('videos_read'))
                <li class="{{ Route::Is(['dashboard.settings.videos.index','dashboard.settings.videos.create','dashboard.settings.videos.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.videos.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.videos')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('blogs_read'))
                <li class="{{ Route::Is(['dashboard.settings.blogs.index','dashboard.settings.blogs.create','dashboard.settings.blogs.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.blogs.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.blogs')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('contacts_read'))
                <li class="{{ Route::Is(['dashboard.contacts.index','dashboard.contacts.create','dashboard.contacts.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.contacts.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.contacts')</span></a>
                </li>
            @endif


            @if (auth()->user()->hasPermission('files_read'))
                <li class="{{ Route::Is(['dashboard.settings.files.index','dashboard.settings.files.create','dashboard.settings.files.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.files.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.files')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('common_questions_read'))
                <li class="{{ Route::Is(['dashboard.settings.common_questions.index','dashboard.settings.common_questions.create','dashboard.settings.common_questions.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.common_questions.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.common_questions')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('offers_read'))
                <li class="{{ Route::Is(['dashboard.offers.index','dashboard.offers.create','dashboard.offers.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.offers.index') }}"><i class="fa fa-gift"></i><span>@lang('dashboard.offers')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('orders_read'))
                <li class="{{ Route::Is(['dashboard.orders.index','dashboard.orders.show']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.orders.index') }}"><i class="fa fa-shopping-cart"></i><span>@lang('dashboard.orders')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('supports_read'))
                <li class="{{ Route::Is(['dashboard.supports.index','dashboard.supports.create','dashboard.supports.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.supports.index') }}"><i class="fa fa-comment-alt"></i><span>@lang('dashboard.supports')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('sends_read'))
                <li class="{{ Route::Is(['dashboard.settings.sends.index','dashboard.settings.sends.create','dashboard.settings.sends.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.sends.index') }}"><i class="fa fa-comment-alt"></i><span>@lang('dashboard.sends')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('payments_read'))
                <li class="{{ Route::Is(['dashboard.payments.index','dashboard.payments.create','dashboard.payments.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.payments.index') }}"><i class="fa fa-credit-card"></i><span>@lang('dashboard.payments')</span></a>
                </li>
            @endif

           @if (auth()->user()->hasPermission('advertisements_read'))
                <li class="{{ Route::Is(['dashboard.settings.advertisements.index','dashboard.settings.advertisements.create','dashboard.settings.advertisements.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.advertisements.index') }}"><i class="fa fa-credit-card"></i><span>@lang('dashboard.advertisements')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('newsletters_read'))
                <li class="{{ Route::Is(['dashboard.newsletters.index','dashboard.newsletters.create','dashboard.newsletters.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.newsletters.index') }}"><i class="fa fa-credit-card"></i><span>@lang('dashboard.newsletters')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('about_customers_read'))
                <li class="{{ Route::Is(['dashboard.settings.about_customers.index','dashboard.settings.about_customers.create','dashboard.settings.about_customers.edit']) ? 'active' : '' }}">
                    <a href="{{ route('dashboard.settings.about_customers.index') }}"><i class="fa fa-credit-card"></i><span>@lang('dashboard.about_customers')</span></a>
                </li>
            @endif

            @if (auth()->user()->hasPermission('settings_read'))
                <li class="{{ Route::Is(['dashboard.settings.index','dashboard.contact_us.index','dashboard.social_links.index']) ? 'treeview menu-open' : 'treeview' }}" style="height: auto;">
                  
                  <a href="#">
                    <i class="fa fa-gear"></i> 
                    <span>@lang('dashboard.settings')</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                      
                  <ul class="treeview-menu 
                  {{  Route::Is(['dashboard.settings.setting_banners.index',
                                 'dashboard.settings.setting_banners.create',
                                 'dashboard.settings.contact_us.index',
                                 'dashboard.settings.social_links.index',
                                 'dashboard.settings.manager_word.index',
                                 'dashboard.settings.services.index',
                                 'dashboard.settings.about.index']) ? 'treeview menu-open' : 'treeview' }}" style="display: {{  request()->routeIs(['dashboard.settings.setting_banners.index','dashboard.settings.setting_banners.create','dashboard.settings.setting_banners.edit','dashboard.settings.social_links.index','dashboard.settings.services.index','dashboard.settings.about.index']) ? 'block' : 'none' }};">

                    <li class="{{ Route::Is('dashboard.settings.contact_us') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.contact_us.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('settings.contact_us')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.account_number') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.account_number.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('settings.account_number')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.about.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.about.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.about')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.setting_banners.index','dashboard.settings.setting_banners.create','dashboard.settings.setting_banners.edit') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.setting_banners.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.setting_banners')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.social_links.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.social_links.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.social_links')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.manager_word.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.manager_word.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.manager_word')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.services.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.services.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.services')
                        </a>
                    </li>

                  </ul>

                </li>
            @endif

            @if (auth()->user()->hasPermission('policys_read'))
                <li class="{{ Route::Is(['dashboard.settings.policys.edit','dashboard.settings.policys.create']) ? 'treeview menu-open' : 'treeview' }}" style="height: auto;">
                  
                  <a href="#">
                    <i class="fa fa-gear"></i> 
                    <span>@lang('dashboard.policys')</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                      
                  <ul class="treeview-menu 
                  {{  Route::Is(['dashboard.settings.policys.copyrights.index',
                                 'dashboard.settings.policys.privacys.index',
                                 'dashboard.settings.policys.terms_conditions.index',
                                 'dashboard.settings.policys.evacuation_responsibilatys.index']) ? 'treeview menu-open' : 'treeview' }}" style="display: {{  request()->routeIs(['dashboard.settings.copyrights.index','dashboard.settings.privacys.index','dashboard.settings.terms_conditions.index','dashboard.settings.evacuation_responsibilatys.index','dashboard.settings.policys.edit','dashboard.settings.policys.create']) ? 'block' : 'none' }};">

                    <li class="{{ Route::Is('dashboard.settings.copyrights.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.copyrights.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.copyrights')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.privacys.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.privacys.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.privacys')
                        </a>
                    </li>
                    <li class="{{ Route::Is('dashboard.settings.terms_conditions.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.terms_conditions.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.terms_conditions')
                        </a>
                    </li>

                    <li class="{{ Route::Is('dashboard.settings.evacuation_responsibilatys.index') ? 'active' : '' }}">
                        <a href="{{ route('dashboard.settings.evacuation_responsibilatys.index') }}">
                            <i class="fa fa-concierge-bell"></i> 
                            @lang('dashboard.evacuation_responsibilatys')
                        </a>
                    </li>

                  </ul>

                </li>
            @endif

        </ul>

    </section>

</aside>

