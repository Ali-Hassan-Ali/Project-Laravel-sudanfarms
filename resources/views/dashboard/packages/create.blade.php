@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.packages')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.packages')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.packages.index') }}"> @lang('dashboard.packages')</a></li>
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

                    <form action="{{ route('dashboard.packages.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}


                        @php
                            $names = ['price','qty_product'];
                            $guard = ['free','infree'];
                            $months= ['1','2','3','4','5','6','7','8','9','10','11','12'];
                        @endphp

                        <div class="form-group d-none">
                            <label>@lang('dashboard.guard')</label>
                            <select class="form-control" name="guard">
                                @foreach ($guard as $guardd)
                                    <option value="{{ $guardd == 'free' ? '0' : '1' }}" 
                                        {{ old('guard') == $guardd ? 'selected' : '' }}>@lang('dashboard.' . $guardd)</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="number" name="{{ $name }}" class="form-control" value="{{ old($name) }}">
                            </div>

                        @endforeach


                        <div class="form-group d-none">
                            <label>@lang('dashboard.months')</label>
                            <select name="month" class="form-control">
                                <option value="">@lang('dashboard.select_moth')</option>
                                @foreach ($months as $month)
                                    <option value="{{ $month}}"
                                        {{ old('month') == $month ? 'selected' : '' }}>
                                        {{ $month }}
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
