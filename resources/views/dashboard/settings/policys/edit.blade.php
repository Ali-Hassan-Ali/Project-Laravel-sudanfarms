@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.policys')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.policys')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.policys.index') }}"> @lang('dashboard.policys')</a></li>
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

                    <form action="{{ route('dashboard.settings.policys.update',$policy->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names  = ['title_ar','title_en'];
                            $descr  = ['body_ar','body_en'];
                            $guard  = ['copyrights','privacys','terms_conditions','evacuation_responsibilatys'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $policy[$name] }}">
                            </div>

                        @endforeach

                        @foreach ($descr as $desc)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $desc)</label>
                                <textarea type="text" name="{{ $desc }}" class="ckeditor form-control">{!! $policy[$desc] !!}</textarea>
                            </div>
                            
                        @endforeach

                        <div class="form-group d-none">
                            <label>@lang('dashboard.policys')</label>
                            <select  name="guard" class="form-control">

                                @foreach ($guard as $data)

                                    <option value="{{ $data }}" {{ $policy->guard == $data ? 'selected' : '' }}>
                                        @lang('dashboard.' . $data)
                                    </option>
                                    
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-plus"></i> @lang('dashboard.add')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
