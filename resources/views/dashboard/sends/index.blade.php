@extends('dashboard.layout.app')

@section('content')

</header>

<div class="content-wrapper" style="min-height: 956.281px;">
    
    <section class="content-header">

        <h1>@lang('dashboard.sends')</h1>

        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
            <li class="active">@lang('dashboard.sends')</li>
        </ol>

    </section>

    <section class="content">

        <div class="box box-primary">

            <div class="box-header with-border">

                <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.sends') <small>{{ $sends->count() }}</small></h3>

                <form action="{{ route('dashboard.settings.sends.index') }}" method="get">

                    <div class="row">

                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                        </div>

                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                            @if (auth()->user()->hasPermission('sends_create'))
                                <a href="{{ route('dashboard.settings.sends.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            @else
                                <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                            @endif
                        </div>

                    </div>
                </form><!-- end of form -->

            </div><!-- end of box header -->

            <div class="box-body">

                @if ($sends->count() > 0)

                    <div class="table-responsive">

                        <table class="table table-hover">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('dashboard.message')</th>
                                <th>@lang('dashboard.created_at')</th>
                                <th>@lang('dashboard.action')</th>
                            </tr>
                            </thead>
                            
                            <tbody>
                            @foreach ($sends as $index=>$send)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{!! $send->message !!}</td>
                                    <td>{{ $send->created_at->toFormattedDateString() }}</td>
                                    <td>
                                        @if (auth()->user()->hasPermission('sends_delete'))
                                            <form action="{{ route('dashboard.settings.sends.destroy', $send->id) }}" method="post" style="display: inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('delete') }}
                                                <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                            </form><!-- end of form -->
                                        @else
                                            <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('dashboard.delete')</button>
                                        @endif
                                    </td>
                                </tr>
                            
                            @endforeach
                            </tbody>

                        </table><!-- end of table -->
                        
                        {{ $sends->appends(request()->query())->links() }}

                    </div><!-- end of table  responsive-->
                    
                @else
                    
                    <h2>@lang('dashboard.no_data_found')</h2>
                    
                @endif

            </div><!-- end of box body -->

        </div><!-- end of box -->

    </section><!-- end of content -->
    
</div><!-- end of content wrapper -->

@endsection