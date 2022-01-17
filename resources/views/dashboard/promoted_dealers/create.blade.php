@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.promoted_dealers')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.promoted_dealers')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.promoted_dealers.index') }}"> @lang('dashboard.categorey')</a></li>
                <li class="active">@lang('dashboard.add')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.add')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.promoted_dealers.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        
                        <div class="form-group">
                            <label>@lang('dashboard.company_name')</label>
                            <input type="text" name="company_name" placeholder="@lang('dashboard.company_name')" class="form-control @error('company_name') is-invalid @enderror" value="{{ old('company_name') }}">
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    

                        <div class="form-group">
                            <label class="form-label">@lang('dashboard.from_inside')</label>
                            <select name="from_inside" required class="form-control">

                                    <option value="">@lang('dashboard.select')</option>

                                    <option value="1" {{ old('from_inside') == '1' ? 'selected' : '' }}>
                                        @lang('dashboard.from_inside_sudan')
                                    </option>

                                    <option value="2" {{ old('from_inside') == '2' ? 'selected' : '' }}>
                                        @lang('dashboard.from_outside_sudan')
                                    </option>
                                
                            </select>
                        </div>
                        

                        <div class="form-group">
                            <label>@lang('dashboard.category_dealer')</label>
                            <select name="category_dealer_id" class="form-control">
                                <option value="">@lang('dashboard.all_categories')</option>
                                @foreach ($category_dealers as $category)
                                    <option value="{{ $category->id }}" {{ old('category_dealer_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.clients')</label>
                            <select name="user_id" class="form-control">
                                <option value="">@lang('dashboard.all_categories')</option>
                                @foreach ($clients as $client)
                                    <option value="{{ $client->id }}" {{ old('user_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.company_logo')</label>
                            <input type="file" name="company_logo" except="image/*" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/product_image/default.jpg') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.company_certificate')</label>
                            <input type="file" name="company_certificate" class="form-control image">
                        </div>

                        <div class="form-group">
                            <img src="{{ asset('uploads/product_image/default.jpg') }}"  style="width: 100px" class="img-thumbnail image-preview" alt="">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.email')</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.phone_master')</label>
                            <input type="phone" name="phone_master" class="form-control" value="{{ old('phone_master') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.phone')</label>
                            <input type="phone" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.other_phone')</label>
                            <input type="phone" name="other_phone" class="form-control" value="{{ old('other_phone') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.web_site')</label>
                            <input type="text" name="web_site" class="form-control" value="{{ old('web_site') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.country')</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.city')</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.title')</label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}">
                        </div>

                         <div class="form-group">
                            <label>@lang('dashboard.description')</label>
                            <textarea type="text" name="description" class="ckeditor form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
