@extends('home.layout.app')

@section('content')

@section('title', __('home.profile'))    

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.dashboard')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.dashboard')</li>
        </ol>
    </div>
</section>

<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                @if ($promoted_dealer)

                    @if ($promoted_dealer->status == -1)
                
                        <div class="alert alert-danger py-3 my-5 text-center" role="alert">
                          @lang('lang.account_activation')
                        </div>

                    @endif

                @endif

            </div>

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>@lang('dashboard.dashboard')</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/setting.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.settings')
                                    </h6>
                                    <a href="{{ route('setting.index') }}">
                                        @lang('dashboard.settings')
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/messages.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.messages')
                                    </h6>
                                    <a href="{{ route('chat.index') }}">
                                        @lang('dashboard.messages')
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/consultant.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.request_custmers')
                                    </h6>
                                    <a href="{{ route('request_custmers.index') }}">@lang('dashboard.request_custmers')</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <h4>@lang('dashboard.orders')</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/shipping.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.orders')
                                    </h6>
                                    <a href="{{ route('orders.index') }}">
                                        @lang('dashboard.orders')
                                    </a>
                                </div>
                            </div>

                            @if ($user)
                            
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact">
                                        <h6>
                                            <img src="{{ asset('icon/consultant.svg') }}" width="25" class="mx-1">
                                            @lang('dashboard.orders')
                                        </h6>
                                        <a href="{{ route('my_order.show') }}">@lang('dashboard.new_orders')</a>
                                    </div>
                                </div>
                                
                            @endif

                        </div>
                    </div>
                </div>
            </div>
            
            @if (auth()->user()->hasPermission('dashboard_read'))

                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.dashboard')</h4>
                        </div>
                        <div class="account-content">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact">
                                        <h6><i class="fas fa-list"></i> @lang('dashboard.dashboard')</h6>
                                        <a href="{{ route('dashboard.welcome') }}">@lang('dashboard.dashboard')</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endif
            
            @if (auth()->id() == '1')
                
            @else



            @if ($promoted_dealer)
                
                @if ($promoted_dealer->PromotedDealerFirst->count() > 0)

                    @if ($promoted_dealer->status == '-1')

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('dashboard.packages')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        {{-- <h3 class="text-danger">@lang('lang.wait_request')</h3> --}}
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.package')</h6>
                                                <a href="{{ route('promoted_dealers.packages.this_packages') }}">@lang('dashboard.show') @lang('dashboard.package')</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif

                    @if ($promoted_dealer->status == 0)

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('lang.correspondence')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        @if ($user)
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-envelope"></i> @lang('lang.mailing') ( 0 )</h6>
                                                <a href="messages.html">@lang('lang.mailing')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact active">
                                                <h6>
                                                    <i class="fas fa-user" style="margin-left: 9px">
                                                    </i> {{ $user->category_dealer->name }} | 
                                                </h6>
                                                <a href="{{ route('promoted_dealers.edit') }}">@lang('dashboard.edit')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li>
                                                        <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>    
                                        @else
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact active">
                                                <h6><i class="fas fa-user" style="margin-left: 9px"></i>@lang('lang.subscribe_promotion')</h6>
                                                <a href="{{ route('promoted_dealers.index') }}">@lang('lang.promotion')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li>
                                                        <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('dashboard.packages')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">

                                        <h3 class="text-danger">@lang('lang.add_new_Packages')</h3>

                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.package')</h6>
                                                <a href="{{ route('promoted_dealers.packages') }}">@lang('dashboard.create') @lang('dashboard.package')</a>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.package')</h6>
                                                <a href="{{ route('promoted_dealers.packages.this_packages') }}">@lang('dashboard.show') @lang('dashboard.package')</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    @endif

                    @if ($promoted_dealer->status == 1)

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('lang.correspondence')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        @if ($user)
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-envelope"></i> @lang('lang.mailing') ( 0 )</h6>
                                                <a href="messages.html">@lang('lang.mailing')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact active">
                                                <h6>
                                                    <i class="fas fa-user" style="margin-left: 9px">
                                                    </i> {{ $user->category_dealer->name }} | 
                                                </h6>
                                                <a href="{{ route('promoted_dealers.edit') }}">@lang('dashboard.edit')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li>
                                                        <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>    
                                        @else
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact active">
                                                <h6><i class="fas fa-user" style="margin-left: 9px"></i>@lang('lang.subscribe_promotion')</h6>
                                                <a href="{{ route('promoted_dealers.index') }}">@lang('lang.promotion')</a>
                                                <ul>
                                                    <li>
                                                        <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                                    </li>
                                                    <li>
                                                        <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('dashboard.products')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.products')({{ $products }})</h6>
                                                <a href="{{ route('products.index') }}">@lang('dashboard.show') @lang('dashboard.products')</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-times"></i> @lang('dashboard.add') @lang('dashboard.products')</h6>
                                                <a href="{{ route('products.create') }}">@lang('dashboard.add')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('dashboard.packages')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.package')</h6>
                                                <a href="{{ route('promoted_dealers.packages.this_packages') }}">@lang('dashboard.show') @lang('dashboard.package')</a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="col-lg-12">
                            <div class="account-card">
                                <div class="account-title">
                                    <h4>@lang('dashboard.orders')</h4>
                                </div>
                                <div class="account-content">
                                    <div class="row">
                                        
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-list"></i> @lang('dashboard.orders') ({{ $orders }})</h6>
                                                <a href="{{ route('orders.index') }}">@lang('dashboard.show')</a>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 alert fade show">
                                            <div class="profile-card contact">
                                                <h6><i class="fas fa-times"></i> @lang('dashboard.request_custmers') ({{ $recustm }})</h6>
                                                <a href="{{ route('request_custmers.index') }}">@lang('dashboard.show')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        
                    @endif
                    
                @else

                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h4>@lang('dashboard.packages')</h4>
                            </div>
                            <div class="account-content">
                                <div class="row">
                                    <div class="col-md-6 col-lg-4 alert fade show">
                                        <div class="profile-card contact">
                                            <h6><i class="fas fa-list"></i> @lang('dashboard.package')</h6>
                                            <a href="{{ route('promoted_dealers.packages') }}">@lang('dashboard.create') @lang('dashboard.package')</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                @endif

            @else

                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('lang.correspondence')</h4>
                        </div>
                        <div class="account-content">
                            <div class="row">
                                @if ($user)
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact">
                                        <h6><i class="fas fa-envelope"></i> @lang('lang.mailing') ( 0 )</h6>
                                        <a href="messages.html">@lang('lang.mailing')</a>
                                        <ul>
                                            <li>
                                                <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                            </li>
                                            <li><button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact active">
                                        <h6>
                                            <i class="fas fa-user" style="margin-left: 9px">
                                            </i> {{ $user->category_dealer->name }} | 
                                        </h6>
                                        <a href="{{ route('promoted_dealers.edit') }}">@lang('dashboard.edit')</a>
                                        <ul>
                                            <li>
                                                <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                            </li>
                                            <li>
                                                <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>    
                                @else
                                <div class="col-md-6 col-lg-4 alert fade show">
                                    <div class="profile-card contact active">
                                        <h6><i class="fas fa-user" style="margin-left: 9px"></i>@lang('lang.subscribe_promotion')</h6>
                                        <a href="{{ route('promoted_dealers.index') }}">@lang('lang.promotion')</a>
                                        <ul>
                                            <li>
                                                <button class="edit icofont-edit" title="Edit This" data-bs-toggle="modal" data-bs-target="#contact-edit"></button>
                                            </li>
                                            <li>
                                                <button class="trash icofont-ui-delete" title="Remove This" data-bs-dismiss="alert"></button>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            @endif

            @endif{{-- end if auth super admin --}}
            
        </div>
    </div>
</section>

@endsection

@push('profile')
    <script type="text/javascript">
    // image preview certificate
        $("#user-image").change(function () {
            
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.company-certificate').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            }

        });
        
    </script>
@endpush