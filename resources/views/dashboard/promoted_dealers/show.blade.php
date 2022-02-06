@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.promoted_dealers'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.promoted_dealers')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.promoted_dealers.index') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.promoted_dealers')</a></li>
                <li class="active">@lang('dashboard.show')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.promoted_dealers') <small>{{ $promotedDealer->count() }}</small></h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($promotedDealer->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.start_month')</th>
                                    <th>@lang('dashboard.end_month')</th>
                                    <th>@lang('dashboard.price')</th>
                                    <th>@lang('dashboard.qty_product')</th>
                                    <th>@lang('dashboard.image')</th>
                                    <th>@lang('dashboard.package')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($promotedDealer->PromotedDealer as $index=>$dealers)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $dealers->start_month }}</td>
                                        <td>{{ $dealers->end_month }}</td>
                                        <td>{{ $dealers->package->new_price }} {{ $dealers->package->cury }}</td>
                                        <td>{{ $dealers->package->qty_product }}</td>
                                        <td><img src="{{ $dealers->image_path }}" width="100"></td>
                                        <td>{{ $dealers->package->name }}</td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{-- {{ $promotedDealer->appends(request()->query())->links() }} --}}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

        <section class="content-header">

            <h1>@lang('dashboard.products')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.promoted_dealers.index') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.promoted_dealers')</a></li>
                <li class="active">@lang('dashboard.show')</li>
            </ol>

        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-border">

                    <h3 class="box-title" style="margin-bottom: 15px">
                    	@lang('dashboard.products') 
                    	<small>{{ $promotedDealer->products->count() }}</small>
                    </h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($promotedDealer->products->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.quantity')</th>
                                    <th>@lang('dashboard.start_time')</th>
                                    <th>@lang('dashboard.end_time')</th>
                                    <th>@lang('dashboard.categorey')</th>
                                    <th>@lang('dashboard.users')</th>
                                    <th>@lang('dashboard.price')</th>
                                    <th>@lang('dashboard.price_decount')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                    <th>@lang('dashboard.action')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($promotedDealer->products as $index=>$product)
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
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->user->name }}</td>
                                        <td>{{ $product->new_price }}</td>
                                        <td>{{ $product->new_price_decount }}</td>
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
                            
                            {{-- {{ $promotedDealer->appends(request()->query())->links() }} --}}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection