@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products'))



<section class="inner-section profile-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="account-card">
                    <div class="account-title">
                        <a href="{{ route('profile.index') }}"><h4>@lang('home.prfile')</h4></a>
                    </div>
                    <div class="account-content">
                        <div class="row">
                            <div class="col-lg-2 mx-auto my-3">
                                <div class="profile-image">
                            	   <img src="{{ auth()->user()->image_path }}" class="rounded-circle" alt="user" width="150">
                                </div>
                            </div>

                            ؤؤ

		                    <form action="{{ route('request_custmers.store') }}" method="post">

		                        {{ csrf_field() }}
		                        {{ method_field('post') }}

		                        <div class="form-group">
		                            <label>@lang('dashboard.name')</label>
		                            <input type="text" name="name" value="{{ auth()->user()->name }}" class="form-control" value="{{ old('name') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.phone')</label>
		                            <input type="number" name="phone" value="{{ auth()->user()->phone }}" class="form-control" value="{{ old('phone') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.email')</label>
		                            <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control" value="{{ old('email') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.title')</label>
		                            <input type="text" name="title" value="{{ auth()->user()->title }}" class="form-control" value="{{ old('title') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.product_name')</label>
		                            <input type="text" name="product_name" class="form-control" value="{{ old('product_name') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.quantity_guard')</label>
		                            <select name="quantity_guard" class="form-control">
		                                <option value="حبة">حبة</option>
		                                <option value="طن">طن</option>
		                                <option value="كياوو">كياوو</option>
		                            </select>
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.promoted_dealers')</label>
		                            <select name="promoted_dealer_id" class="form-control">
		                                <option value="">@lang('home.all')</option>
		                                @foreach ($promoted_dealers as $promoted_dealer)
		                                    <option value="{{ $promoted_dealer->id }}"
		                                        {{ old('promoted_dealer_id') == $promoted_dealer->id ? 'selected' : '' }}>{{ $promoted_dealer->name }}</option>
		                                @endforeach
		                            </select>
		                        </div>


		                        <div class="form-group">
		                            <label>@lang('dashboard.quantity')</label>
		                            <input type="number" step="0.01" step="any" name="quantity" class="form-control" value="{{ old('quantity') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('home.date_shipment')</label>
		                            <input type="datetime-local" name="date_shipment" class="form-control" value="{{ old('date_shipment') }}">
		                        </div>

		                        <div class="form-group">
		                            <label>@lang('dashboard.end_time')</label>
		                            <input type="datetime-local" name="end_time" class="form-control" value="{{ old('end_time') }}">
		                        </div>


		                        <div class="col-md-6 col-lg-4 mx-auto">
		                            <div class="form-group">
		                                <button class="form-btn" type="submit">
		                                	<i class="fa fa-plus"></i> @lang('dashboard.add')
		                                </button>
		                            </div>
		                        </div>

		                    </form><!-- end of form -->

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection