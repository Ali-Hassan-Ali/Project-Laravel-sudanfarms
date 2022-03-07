@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.packages'))  

<section class="inner-section single-banner">
    <div class="container">
        <h2>@lang('dashboard.packages')</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profile.index') }}">@lang('home.profile')</a></li>
            <li class="breadcrumb-item active" aria-current="page"> @lang('dashboard.packages')</li>
        </ol>
    </div>
</section>

<section class="inner-section contact-part">
    <div class="container">
        <div class="row">
            @foreach ($packages as $package)

                <a href="" class="col-md-6 col-lg-4">
                    <div class="contact-card"><i class="icofont-email"></i>
                        <h4>{{ $package->name }}</h4>
                        <h4>@lang('dashboard.' . $package->guard == 0 ? 'free' : 'infree')</h4>
                        <p>@lang('dashboard.price') {{ $package->price }}</p>
                        <p>@lang('dashboard.count_month') | {{ $package->month }}</p>
                        <p>@lang('dashboard.qty_product') | {{ $package->qty_product }}</p>
                    </div>
                </a>

            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form class="contact-form" action="{{ route('promoted_dealers.packages') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <h4>@lang('dashboard.contacts')</h4>

                    <div class="form-group">
                        <label>@lang('dashboard.packages')</label>
                        <select name="package_id" required class="form-control">
                            <option value="">@lang('dashboard.select_package')</option>
                            @foreach ($packages as $package)
                                <option value="{{ $package->id }}"
                                    {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                    @lang('dashboard.' . $package->guard == 0 ? 'free' : 'infree') 
                                    - {{ $package->price }} 
                                    - {{ $package->month }}
                                    - {{ $package->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>
                            {{-- @lang('dashboard.bill')  --}}
                            @if (app()->getLocale() == 'ar')
                                
                                {{ setting('account_number_details_ar') }}

                            @else

                                {{ setting('account_number_details_ar') }}

                            @endif
                            : {{ setting('account_number') }}
                        </label>
                        <div class="form-input-group">
                            <input class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" 
                                    type="file" name="image" required placeholder="@lang('dashboard.image')">
                            <i class="icofont-image"></i>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="form-btn-group">
                        <i class="fas fa-envelope"></i><span>@lang('home.send')</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section> 

@endsection 