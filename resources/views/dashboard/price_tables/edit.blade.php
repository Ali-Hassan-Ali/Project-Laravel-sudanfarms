@extends('dashboard.layout.app')

@section('content')

@section('title', __('dashboard.dashboard') .' - '. __('dashboard.price_tables')  .' - '. __('dashboard.edit'))

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('dashboard.price_tables')</h1>

            <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.welcome') }}"><i class="fa fa-dashboard"></i> @lang('dashboard.dashboard')</a></li>
                <li><a href="{{ route('dashboard.price_tables.index') }}"> @lang('dashboard.price_tables')</a></li>
                <li class="active">@lang('dashboard.edit')</li>
            </ol>
        </section>

        <section class="content">

            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title">@lang('dashboard.edit')</h3>
                </div><!-- end of box header -->

                <div class="box-body">

                    @include('partials._errors')

                    <form action="{{ route('dashboard.price_tables.update', $priceTable->id) }}" method="post">

                        {{ csrf_field() }}
                        {{ method_field('put') }}

                        @php
                            $names  = ['name_ar','name_en'];
                            $titles = ['title_ar','title_en'];
                        @endphp

                        @foreach ($names as $name)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $name)</label>
                                <input type="text" name="{{ $name }}" class="form-control" value="{{ $priceTable[$name] }}">
                            </div>
                            
                        @endforeach

                        @foreach ($titles as $title)

                            <div class="form-group">
                                <label>@lang('dashboard.' . $title)</label>
                                <input type="text" name="{{ $title }}" class="form-control" value="{{ $priceTable[$title] }}">
                            </div>
                            
                        @endforeach

                        <div class="form-group">
                            <label>@lang('dashboard.price')</label>
                            <p class="text-red product-val-price">{{ $priceTable->price }} $</p>
                            <p class="text-red totle-price">{{ $priceTable->new_price }} {{ app()->getLocale() == 'ar' ? 'ج س' : 'SDG' }}</p>
                            <input type="number" name="price" class="form-control product-price" value="{{ $priceTable->price }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-edit"></i> @lang('dashboard.edit')
                            </button>
                        </div>

                    </form><!-- end of form -->

                </div><!-- end of box body -->

            </div><!-- end of box -->

        </section><!-- end of content -->

    </div><!-- end of content wrapper -->

@endsection
