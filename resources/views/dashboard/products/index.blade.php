@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.products'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.products')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.products') <small>{{ $products->count() }}</small></h3>

                    <form action="{{ route('dashboard.products.index') }}" method="get">

                        <div class="row">

                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('dashboard.search')</button>
                                @if (auth()->user()->hasPermission('products_create'))
                                    <a href="{{ route('dashboard.products.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @else
                                    <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('dashboard.add')</a>
                                @endif
                            </div>

                        </div>
                    </form><!-- end of form -->

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($products->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.quantity')</th>
                                    <th>@lang('dashboard.start_time')</th>
                                    <th>@lang('dashboard.end_time')</th>
                                    {{-- <th>@lang('dashboard.description')</th> --}}
                                    <th>@lang('dashboard.categorey')</th>
                                    <th>@lang('dashboard.users')</th>
                                    <th>@lang('dashboard.price')</th>
                                    <th>@lang('dashboard.price_decount')</th>
                                    {{-- <th>@lang('dashboard.stars')</th> --}}
                                    <th>@lang('dashboard.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($products as $index=>$product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->quantity == 0)

                                                <p class="text-red">@lang('dashboard.not_available')</p>

                                            @else

                                                {{ $product->quantity }} {{ $product->quantity_guard }}

                                            @endif
                                        </td>
                                        <td>{{ $product->start_time }}</td>
                                        <td>{{ $product->end_time }}</td>
                                        {{-- <td>{!! $product->description !!}</td> --}}
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{ $product->new_price }}</td>
                                        <td>{{ $product->new_price_decount }}</td>
                                        {{-- <td>
                                            @for ($i = 0; $i < $product->stars; $i++)
                                                <i class="fa fa-star" style="color: #ffe066;"></i>
                                            @endfor
                                        </td> --}}
                                        <td>{{ $product->created_at }}</td>
                                        <td>
                                            @if (auth()->user()->hasPermission('products_update'))
                                                <a href="{{ route('dashboard.products.edit', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (auth()->user()->hasPermission('products_show'))
                                                <a href="{{ route('dashboard.products.show', $product->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                            @else
                                                <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i></a>
                                            @endif
                                            @if (auth()->user()->hasPermission('products_delete'))
                                                <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="post" style="display: inline-block">
                                                    {{ csrf_field() }}
                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i></button>
                                                </form><!-- end of form -->
                                            @else
                                                <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i></button>
                                            @endif
                                        </td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{ $products->appends(request()->query())->links() }}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
