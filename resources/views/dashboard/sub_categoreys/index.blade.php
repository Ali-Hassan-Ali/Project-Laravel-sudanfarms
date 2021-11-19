@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.sub_categoreys'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.sub_categoreys')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.sub_categoreys')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.sub_categoreys') <small>{{ $sub_categoreys->total() }}</small></h3>

                    <form action="{{ route('dashboard.sub_categoreys.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('sub_categoreys_create'))
                                    <a href="{{ route('dashboard.sub_categoreys.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($sub_categoreys->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.image')</th>
                                    <th>@lang('dashboard.count')</th>
                                    {{-- <th>@lang('dashboard.related_products')</th> --}}
                                    <th>@lang('dashboard.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($sub_categoreys as $index=>$sub_categorey)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $sub_categorey->name }}</td>
                                        <td>
                                            <img data-enlargeable width="100" style="cursor: zoom-in" src="{{ $sub_categorey->image_path }}" style="width: 100px;" class="img-thumbnail" alt="">
                                        </td>
                                        <td>{{ $sub_categorey->product->count() }}</td>
                                        {{-- <td><a href="{{ route('dashboard.products.index',['category_id'=>$sub_categorey->id]) }}" class="btn btn-info">@lang('dashboard.read')</a></td> --}}
                                        <td>{{ $sub_categorey->created_at->toFormattedDateString() }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('sub_categoreys_update'))
                                                <a href="{{ route('dashboard.sub_categoreys.edit', $sub_categorey->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('dashboard.edit')</a>
                                            @endif
                                            @if (auth()->user()->hasPermission('sub_categoreys_delete'))
                                                <form action="{{ route('dashboard.sub_categoreys.destroy', $sub_categorey->id) }}" method="post" style="display: inline-block">
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
                            
                            {{ $sub_categoreys->appends(request()->query())->links() }}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
