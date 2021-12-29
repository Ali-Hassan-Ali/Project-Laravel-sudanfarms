@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.contacts')  .' - '. __('dashboard.reply_message'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.contacts')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.contacts.index') }}"> @lang('dashboard.contacts')</a></li>
                <li class="active">@lang('dashboard.reply_message')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.reply_message')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.contacts.reply_message.send',$contact->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>@lang('dashboard.email')</label>
                            <input type="text" name="email" class="form-control" disabled value="{{ $contact->email }}">
                        </div>

                        <div class="form-group">
                            <label>@lang('dashboard.reply_message')</label>
                            <textarea type="text" name="reply_message" class="ckeditor form-control">{{ old('reply_message') }}</textarea>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> @lang('dashboard.reply_message')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
