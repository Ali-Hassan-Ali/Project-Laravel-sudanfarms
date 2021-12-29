@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.request_custmers'))  

<section class="inner-section single-banner">
        <div class="container">
            <h2>@lang('dashboard.request_custmers')</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('welcome.index') }}">@lang('dashboard.home')</a></li>
                <li class="breadcrumb-item active" aria-current="page">@lang('dashboard.request_custmers')</li>
            </ol>
        </div>
    </section>
    <section class="inner-section checkout-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert-info">
                    	@auth

                    		<p>
                    			<a href="{{ route('request_custmers.create') }}">@lang('dashboard.add')</a>
                    		</p>
                    		
                    	@else

                        	<p>@lang('home.former_customer')<a href="{{ route('home.login') }}">@lang('home.click_here')</a></p>

                    	@endauth
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h4>الطلبات</h4>
                        </div>
                        <div class="account-content">
                            <div class="table-scroll">
                                <table class="table-list">
                                    <thead>
                                        <tr>
                                            <th scope="col">الرقم</th>
                                            <th scope="col">المنتج</th>
                                            <th scope="col">الإسم</th>
                                            <th scope="col">التاريخ</th>
                                            <th scope="col">البائع</th>
                                            <th scope="col">الكمية</th>
                                            <th scope="col">حدث</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-serial">
                                                <h6>01</h6>
                                            </td>
                                            <td class="table-image"><img src="images/product/01.jpg" alt="product"></td>
                                            <td class="table-name">
                                                <h6>فلفل طازج</h6>
                                            </td>
                                            <td class="table-price">
                                                <h6>5/12/2021</h6>
                                            </td>
                                            <td class="table-brand">
                                                <h6>حلا الدولية</h6>
                                            </td>
                                            <td class="table-quantity">
                                                <h6>3</h6>
                                            </td>
                                            <td class="table-action"><a class="view" href="#" title="التفاصيل" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a><a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-serial">
                                                <h6>02</h6>
                                            </td>
                                            <td class="table-image"><img src="images/product/02.jpg" alt="product"></td>
                                            <td class="table-name">
                                                <h6>جزر طازج</h6>
                                            </td>
                                            <td class="table-price">
                                                <h6>5/12/2021</h6>
                                            </td>
                                            <td class="table-brand">
                                                <h6>سيدتك للزراعة</h6>
                                            </td>
                                            <td class="table-quantity">
                                                <h6>5</h6>
                                            </td>
                                            <td class="table-action"><a class="view" href="#" title="التفاصيل" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a><a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-serial">
                                                <h6>03</h6>
                                            </td>
                                            <td class="table-image"><img src="images/product/03.jpg" alt="product"></td>
                                            <td class="table-name">
                                                <h6>خيار طازج</h6>
                                            </td>
                                            <td class="table-price">
                                                <h6>5/12/2021</h6>
                                            </td>
                                            <td class="table-brand">
                                                <h6>حلا الدولية</h6>
                                            </td>
                                            <td class="table-quantity">
                                                <h6>2</h6>
                                            </td>
                                            <td class="table-action"><a class="view" href="#" title="التفاصيل" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a><a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-serial">
                                                <h6>04</h6>
                                            </td>
                                            <td class="table-image"><img src="images/product/04.jpg" alt="product"></td>
                                            <td class="table-name">
                                                <h6>باذنجان هجين</h6>
                                            </td>
                                            <td class="table-price">
                                                <h6>5/12/2021</h6>
                                            </td>
                                            <td class="table-brand">
                                                <h6>فريش للزراعة</h6>
                                            </td>
                                            <td class="table-quantity">
                                                <h6>3</h6>
                                            </td>
                                            <td class="table-action"><a class="view" href="#" title="التفاصيل" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a><a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td class="table-serial">
                                                <h6>05</h6>
                                            </td>
                                            <td class="table-image"><img src="images/product/05.jpg" alt="product"></td>
                                            <td class="table-name">
                                                <h6>بامية</h6>
                                            </td>
                                            <td class="table-price">
                                                <h6>5/12/2021</h6>
                                            </td>
                                            <td class="table-brand">
                                                <h6>سيدتك للزراعة</h6>
                                            </td>
                                            <td class="table-quantity">
                                                <h6>7</h6>
                                            </td>
                                            <td class="table-action"><a class="view" href="#" title="التفاصيل" data-bs-toggle="modal" data-bs-target="#product-view"><i class="fas fa-eye"></i></a><a class="trash" href="#" title="Remove Wishlist"><i class="icofont-trash"></i></a></td>
                                        </tr>
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
    <div class="modal fade" id="contact-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title">
                        <h3>إضافة رقم تواصل جديد</h3>
                    </div>
                    <div class="form-group"><label class="form-label">العنوان</label><select class="form-select">
                            <option selected="">إختر عنوان</option>
                            <option value="primary">الأساسي</option>
                            <option value="secondary">البديل</option>
                        </select></div>
                    <div class="form-group"><label class="form-label">الرقم</label><input class="form-control" type="text" placeholder="إدخل رقمك"></div><button class="form-btn" type="submit">حفظ معلومات التواصل</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="address-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title">
                        <h3>إضافة عنوان جديد</h3>
                    </div>
                    <div class="form-group"><label class="form-label">العنوان</label><select class="form-select">
                            <option selected="">إختر العنوان</option>
                            <option value="home">المنزل</option>
                            <option value="office">المكتب</option>
                            <option value="Bussiness">أعمال</option>
                            <option value="others">أخرى</option>
                        </select></div>
                    <div class="form-group"><label class="form-label">العنوان</label><textarea class="form-control" placeholder="أدخل تفاصيل العنوان"></textarea></div><button class="form-btn" type="submit">حفظ معلومات العنوان</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="payment-add">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title">
                        <h3>add new payment</h3>
                    </div>
                    <div class="form-group"><label class="form-label">card number</label><input class="form-control" type="text" placeholder="Enter your card number"></div><button class="form-btn" type="submit">save card info</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="contact-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title">
                        <h3>تعديل رقم التواصل</h3>
                    </div>
                    <div class="form-group"><label class="form-label">العنوان</label><select class="form-select">
                            <option value="primary" selected="">الأساسي</option>
                            <option value="secondary">البديل</option>
                        </select></div>
                    <div class="form-group"><label class="form-label">الرقم</label><input class="form-control" type="text" value="838 2883 89 (249+)"></div><button class="form-btn" type="submit">حفظ معلومات التواصل</button>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="address-edit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content"><button class="modal-close" data-bs-dismiss="modal"><i class="icofont-close"></i></button>
                <form class="modal-form">
                    <div class="form-title">
                        <h3>تعديل معلومات العنوان</h3>
                    </div>
                    <div class="form-group"><label class="form-label">العنوان</label><select class="form-select">
                            <option value="home" selected="">المنزل</option>
                            <option value="office">المكتب</option>
                            <option value="Bussiness">أعمال</option>
                            <option value="others">أخرى</option>
                        </select></div>
                    <div class="form-group"><label class="form-label">address</label><textarea class="form-control" placeholder="jalkuri, fatullah, narayanganj-1420. word no-09, road no-17/A"></textarea></div><button class="form-btn" type="submit">حفظ معلومات العنوان</button>
                </form>
            </div>
        </div>
    </div>

@endsection