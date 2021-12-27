@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.package')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.package')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.packages.index') }}"> @lang('dashboard.packages')</a></li>
                <li class="active">@lang('dashboard.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.packages.update', $package->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names = ['price','qty_product'];
                            $guard = ['free','infree'];
                        @endphp

                        <div class="form-group d-none">
                            <label>@lang('dashboard.guard')</label>
                            <select class="form-control" name="guard">
                                @foreach ($guard as $guardd)
                                    <option value="{{ $guardd == 'free' ? '0' : '1' }}" 
                                        {{ $package->guard == 1 ? 'selected' : '' }}>{{ $guardd }}</option>
                                @endforeach
                            </select>
                        </div>

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="number" name="{{ $name }}" class="form-control" value="{{ $package[$name] }}">
                            </div>

                        @endforeach

                        <div class="form-group">
                            <label>@lang('dashboard.data')</label>
                            <input type="date" name="data" class="form-control" value="{{ $package->data }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> @lang('dashboard.edit')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
