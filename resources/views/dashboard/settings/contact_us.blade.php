@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('settings.contact_us')  .' - '. __('dashboard.add'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.about')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
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

                    <form action="{{ route('dashboard.settings.settings.store') }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('post') }}

                        @php
                            $names = ['contact_email_one','contact_email_tow','contact_phone_whatsapp','contact_phone','contact_map_ar','contact_map_en'];
                        @endphp

                         @foreach ($names as $data)

                            <div class="form-group">
                                <label>@lang('settings.' . $data)</label>
                                <input type="text" name="{{ $data }}" class="form-control" value="{{ setting($data) }}">
                            </div>
                            
                        @endforeach

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
