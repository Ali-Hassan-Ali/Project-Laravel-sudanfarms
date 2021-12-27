@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.items'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.items')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li class="active">@lang('dashboard.items')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header with-bitem">

                    <h3 class="box-title" style="margin-bottom: 15px">@lang('dashboard.items') <small>{{ $items->total() }}</small></h3>

                </div><!-- end of box header -->

                <div class="box-body">

                    @if ($items->count() > 0)
                    
                        <div class="table-responsive">
                            
                            <table class="table table-hover">

                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('dashboard.image')</th>
                                    <th>@lang('dashboard.name')</th>
                                    <th>@lang('dashboard.price')</th>
                                    <th>@lang('dashboard.quantity')</th>
                                    <th>@lang('dashboard.totalprice')</th>
                                    <th>@lang('dashboard.created_at')</th>
                                </tr>
                                </thead>
                                
                                <tbody>
                                @foreach ($items as $index=>$item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        @php
                                            $image = App\Models\ImageProduct::where('product_id', $item->product->id)->first();
                                        @endphp
                                        <td><img src="{{ $image->image_path }}" width="100"></td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ number_format($item->subtotal,2) }}</td>
                                        <td>{{ $item->created_at->toFormattedDateString() }}</td>
                                    </tr>
                                
                                @endforeach
                                </tbody>

                            </table><!-- end of table -->
                            
                            {{ $items->appends(request()->query())->links() }}

                        </div><!-- end of table  responsive-->
                        
                    @else
                        
                        <h2>@lang('dashboard.no_data_found')</h2>
                        
                    @endif

                </div><!-- end of box body -->


            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->


@endsection
