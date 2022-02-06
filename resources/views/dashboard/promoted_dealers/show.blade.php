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

    </div><!-- end of content wrapper -->


@endsection