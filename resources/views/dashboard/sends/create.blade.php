@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.settings')  .' - '. __('dashboard.sends'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.sends')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.settings.sends.index') }}"> @lang('dashboard.sends')</a></li>
                <li class="active">@lang('dashboard.sends')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.sends')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.settings.sends.store') }}" method="post">

                        @csrf
                        @method('post')

                        <div class="form-group">
                            <label>@lang('dashboard.sends')</label>
                            <textarea type="text" name="message" class="ckeditor form-control">{{ old('message') }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> @lang('dashboard.add')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->
        
    </div><!-- end of content wrapper -->

@endsection
