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

        <section class="content-header">

            <h1>@lang('dashboard.reply_message')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.reply_message')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-body">

                    @if ($reply_contact->count() > 0)

                        <div class="table-responsive">

                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.reply_message')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($reply_contact as $index=>$client)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{!! $client->reply_message !!}</td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{-- {{ $contacts->appends(request()->query())->links() }} --}}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->
        
    </div><!-- end of content wrapper -->

@endsection
