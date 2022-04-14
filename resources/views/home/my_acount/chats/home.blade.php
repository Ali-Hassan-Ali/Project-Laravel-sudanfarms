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
                <div class="account-card">
                    <div class="account-title">
                        <h4>@lang('dashboard.dashboard')</h4>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/messages.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.messages')
                                    </h6>
                                    <a href="{{ route('chat.messages') }}">
                                        @lang('dashboard.incoming_messages')
                                    </a>
                                </div>
                            </div>

                            
                            <div class="col-md-6 col-lg-4 alert fade show">
                                <div class="profile-card contact">
                                    <h6>
                                        <img src="{{ asset('icon/messages.svg') }}" width="25" class="mx-1">
                                        @lang('dashboard.messages')
                                    </h6>
                                    <a href="{{ route('chat.messages') }}">
                                        @lang('dashboard.sent_messages')
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

@endsection