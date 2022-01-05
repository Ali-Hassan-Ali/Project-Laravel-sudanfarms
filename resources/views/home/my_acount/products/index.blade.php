@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.products') .' | '. __('dashboard.add'))

    <section class="inner-section inner-section2 checkout-part" style="margin-top:200px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>@lang('dashboard.products') <small>{{ $products->count() }}</small></h4>
                        </div>

                        <div class="row col-2 col-sm-12 mb-3">
                        	<a href="{{ route('products.create') }}" class="form-btn col-4">
                            	<i class="fa fa-plus"></i> @lang('dashboard.add')
                            </a>
                        </div>

                        <div class="row mb-5">

		                    <form action="{{ route('products.index') }}" method="get">

		                        <div class="row">

		                            <div class="col-md-4">
		                                <input type="text" name="search" class="form-control" placeholder="@lang('dashboard.search')" value="{{ request()->search }}">
		                            </div>

		                            <div class="col-md-1">
		                                <button class="form-btn" type="submit">
		                                	<i class="fa fa-search"></i> <small>@lang('dashboard.search')</small>
		                                </button>
		                            </div>

		                        </div>
		                    </form><!-- end of form -->

		                </div><!-- end of box header -->

                        <div class="account-content">
                            <div class="table-scroll">
                                <table class="table-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">@lang('dashboard.name')</th>
                                            <th scope="col">@lang('dashboard.quantity')</th>
                                            <th scope="col">@lang('dashboard.start_time')</th>
                                            <th scope="col">@lang('dashboard.end_time')</th>
                                            <th scope="col">@lang('dashboard.categorey')</th>
                                            <th scope="col">@lang('dashboard.price')</th>
                                            <th scope="col">@lang('dashboard.price_decount')</th>
                                            <th scope="col">@lang('dashboard.created_at')</th>
                                            <th scope="col">@lang('dashboard.action')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	@foreach ($products as $index=>$product)

	                                        <tr>
	                                            <td class="table-name">
	                                                <h6>{{ $index + 1 }}</h6>
	                                            </td>
	                                            <td class="table-name">
	                                                <h6>{{ $product->name }}</h6>
	                                            </td>
	                                            <td class="table-quantity">
	                                                <h6>{{ $product->quantity }}</h6>
	                                            </td>
	                                            <td class="table-start_time">
	                                                <h6>{{ $product->start_time }}</h6>
	                                            </td>
	                                            <td class="table-end_time">
	                                                <h6>{{ $product->end_time }}</h6>
	                                            </td>
	                                            <td class="table-category">
	                                                <h6>{{ $product->category->name }}</h6>
	                                            </td>
	                                            <td class="table-price">
	                                                <h6>{{ $product->new_price }}</h6>
	                                            </td>
	                                            <td class="table-price">
	                                                <h6>{{ $product->new_price_decount }}</h6>
	                                            </td>
	                                            <td class="table-price">
	                                                <h6>{{ $product->created_at }}</h6>
	                                            </td>
	                                            <td class="table-price">
	                                                <a href="{{ route('products.edit', $product->id) }}" class="btn-info btn-sm">
	                                                	<i class="fa fa-edit"></i>
	                                                </a>
	                                                <a href="{{ route('product.show', $product->id) }}" class="btn-info btn-sm">
	                                                	<i class="fa fa-eye"></i>
	                                                </a>
	                                                <form action="{{ route('products.destroy', $product->id) }}" method="post" style="display: inline-block">
	                                                    {{ csrf_field() }}
	                                                    {{ method_field('delete') }}
                                                    <button type="submit" class="btn-danger delete btn-sm">
                                                    	<i class="fa fa-trash"></i>
                                                    </button>
                                                </form><!-- end of form -->
	                                            </td>
	                                        </tr>

                                        @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="col-lg-12 mt-3">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#"><i class="icofont-arrow-right"></i></a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">...</li>
                        <li class="page-item"><a class="page-link" href="#">65</a></li>
                        <li class="page-item"><a class="page-link" href="#"><i class="icofont-arrow-left"></i></a></li>
                    </ul>
                </div>

            </div>
        </div>
    </section>

@endsection