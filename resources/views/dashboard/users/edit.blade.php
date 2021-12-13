@extends('dashboard.layout.app')

@section('content')

<div class="content-wrapper" style="min-height: 956.281px;">
    
    <section class="content-header">

        <h1>@lang('dashboard.users')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
            <li><a href="{{ route('dashboard.users.index') }}"> @lang('dashboard.users')</a></li>
            <li class="active">@lang('dashboard.edit')</li>
        </ol>
    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header">
                <h3 class="box-title">@lang('dashboard.edit')</h3>
            </div><!-- end of box header -->

            <div class="box-body">

                {{-- @include('partials._errors') --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('dashboard.users.update', $user->id) }}" method="post" enctype="multipart/form-data">

                    {{ csrf_field() }}
                    {{ method_field('put') }}


                    <div class="form-group">
                        <label>@lang('dashboard.name')</label>
                        <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $user->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.email')</label>
                        <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ $user->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.image')</label>
                        <input type="file" name="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }} image">
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <img src="{{ $user->image_path }}" style="width: 100px" class="img-thumbnail image-preview" alt="">
                    </div>

                    <div class="form-group">
                        <label>@lang('dashboard.permissions')</label>
                        <div class="nav-tabs-custom">

                            @php
                                $models = ['users','clients','admins','categoreys','sub_categoreys','products','category_dealers',
                                            'promoted_dealers','contacts','settings','gallery_categorys','gallerys','video_categorys','videos',
                                            'blogs','files','common_questions','offers','newsletters','policys','about_customers',
                                            'advertisements'];
                                $maps = ['create', 'read', 'update', 'delete'];
                            @endphp

                            @if ($models == 'products')
                                @php
                                    $maps = ['create', 'read', 'update', 'delete','show'];
                                @endphp
                            @endif

                            @if ($models == 'promoted_dealers')
                                @php
                                    $maps = ['create', 'read', 'update', 'delete','show'];
                                @endphp
                            @endif

                            @if ($models == 'settings')
                                @php
                                    $maps = ['create', 'read', 'update', 'delete','show'];
                                @endphp
                            @endif
                            
                            @if ($models == 'advertisements')
                                @php
                                    $maps = ['create', 'read', 'update', 'delete','show'];
                                @endphp
                            @endif


                            <ul class="nav nav-tabs">
                                @foreach ($models as $index=>$model)
                                    <li class="nav-item"><a class="nav-link {{ $index == 0 ? 'active' : '' }}" href="#{{ $model }}" data-toggle="tab">@lang('dashboard.' . $model)</a></li>
                                @endforeach
                            </ul>

                            <div class="tab-content">

                                @foreach ($models as $index=>$model)

                                    <div class="tab-pane {{ $index == 0 ? 'active' : '' }} my-3 mb-5" id="{{ $model }}">

                                        @foreach ($maps as $map)
                                            {{--create_users--}}
                                            <label class="mx-2"><input type="checkbox" name="permissions[]" {{ $user->hasPermission($model . '_' . $map) ? 'checked' : '' }} value="{{ $model . '_' . $map }}"> @lang('dashboard.' . $map)</label>
                                        @endforeach

                                    </div>

                                @endforeach

                            </div><!-- end of tab content -->

                        </div><!-- end of nav tabs -->

                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.edit')</button>
                    </div>

                </form><!-- end of form -->

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->

</div>

@endsection
