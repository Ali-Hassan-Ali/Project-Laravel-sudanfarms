<header class="main-header">

    {{--<!-- Logo -->--}}
    <a href="{{ asset('dashboard') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>S</b>FC</span>
        <span class="logo-lg"><b>Sudanfarms</b></span>
    </a>

    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                @php
                    $notys = App\Models\Notification::with('user')->latest()->limit(10)->get();
                @endphp
                <!-- Messages: style can be found in dropdown.less-->
                <li class="dropdown messages-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        @if ($notys->count() > 0)
                            
                            <span class="label label-success">{{ $notys->count() }}</span>
                            
                        @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">You have {{ $notys->count() }} messages</li>
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu">
                                @foreach ($notys as $noty)

                                    <li><!-- start message -->
                                        <a href="{{ route('dashboard.notification.show',['notification_id'=>$noty->id]) }}">
                                            <div class="pull-left">
                                                <img src="{{ $noty->user->image_path }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                {{ $noty->user->name }}
                                                <small>
                                                    <i class="fa fa-clock-o"></i> 5 mins
                                                </small>
                                            </h4>
                                            <p>{{ $noty->title }}</p>
                                        </a>
                                    </li>
                                    
                                @endforeach
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="#">See All Messages</a>
                        </li>
                    </ul>
                </li>

                {{-- Notifications: style can be found in dropdown.less --}}


                <!-- Tasks: style can be found in dropdown.less -->
                <li class="dropdown tasks-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i></a>
                    <ul class="dropdown-menu">
                        <li>
                            <!-- inner menu: contains the actual data -->
                            <ul class="menu text-lang">
                                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <li class="text-dark">
                                        <a rel="alternate" class="text-dark" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                            {{ $properties['native'] }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>

                {{-- User Account: style can be found in dropdown.less --}}
                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ auth()->user()->image_path }}" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{ auth()->user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu" style="margin-top: 13px;">

                        {{-- !User image  --}}
                        <li class="user-header">
                            <img src="{{ auth()->user()->image_path }}" class="img-circle" alt="User Image">

                            <p>
                                {{ auth()->user()->name }}
                                {{-- <small>Member since 2 days</small> --}}
                            </p>
                        </li>

                         {{-- Menu Footer --}}
                        <li class="user-footer">
                            
                            @if (auth()->user()->id == 1)
                                
                                {{-- <a href="{{ route('dashboard.admin.edit',auth()->user()->id) }}" 
                                    class="btn btn-default btn-flat">
                                    @lang('dashboard.edit_admin')
                                </a> --}}

                            @endif
                            
                            <a href="{{ route('dashboard.logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">@lang('dashboard.logout')</a>

                            <form id="logout-form" action="{{ route('dashboard.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <a href="/" class="btn btn-default btn-flat">@lang('dashboard.home')</a>
                            <a href="{{ route('dashboard.profile.edit') }}" class="btn btn-default btn-flat">@lang('home.profile')</a>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

</header>