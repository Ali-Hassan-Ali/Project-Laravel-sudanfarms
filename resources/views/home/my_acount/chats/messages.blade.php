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
                            
                        <div class="container mt-3 mb-4">
                            <div class="col-12 mt-4 mt-lg-0">
                                <div class="row">
                                <div class="col-md-12">
                                    <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                                        <table class="table manage-candidates-top mb-0">
                                            <thead>
                                              <tr>
                                                <th>@lang('dashboard.name')</th>
                                                <th class="text-center">@lang('dashboard.action')</th>
                                              </tr>
                                            </thead>
                                            <tbody>

                                                @if ($seller)
                                                    
                                                    @foreach ($users as $data)

                                                    <tr class="candidates-list">
                                                        <td class="title">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ $data->image_path }}" alt="">
                                                            </div>
                                                            <div class="candidate-list-details">
                                                                <div class="candidate-list-info">
                                                                    <div class="candidate-list-title">
                                                                        <h5 class="m-3">
                                                                            <a href="{{ route('chats.index', ['to'=>$data->id]) }}">
                                                                                {{ $data->name }}
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="candidate-list-favourite-time text-center">
                                                            <span class="candidate-list-time order-1">
                                                                <a href="{{ route('chats.index', ['to'=>$data->id]) }}" class="btn btn-success">
                                                                    @lang('dashboard.show')
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>

                                                    @endforeach

                                                @else

                                                    @foreach ($promoted_dealer as $data)

                                                    <tr class="candidates-list">
                                                        <td class="title">
                                                            <div class="thumb">
                                                                <img class="img-fluid" src="{{ $data->logo_path }}" alt="">
                                                            </div>
                                                            <div class="candidate-list-details">
                                                                <div class="candidate-list-info">
                                                                    <div class="candidate-list-title">
                                                                        <h5 class="m-3">
                                                                            <a href="{{ route('chats.index', ['to'=>$data->user->id]) }}">
                                                                                {{ $data->company_name }}
                                                                            </a>
                                                                        </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="candidate-list-favourite-time text-center">
                                                            <span class="candidate-list-time order-1">
                                                                <a href="{{ route('chats.index', ['to'=>$data->user->id]) }}" class="btn btn-success">
                                                                    @lang('dashboard.show')
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    
                                                    @endforeach

                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
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