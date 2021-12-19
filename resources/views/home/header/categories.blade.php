@extends('home.layout.app')

@section('content')

@section('contact', __('home.categories'))

    <section class="inner-section single-banner">
        <div class="container">
            <h2>المنتجات</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
                <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
            </ol>
        </div>
    </section>
    <section class="inner-section shop-part">
        <div class="container">
            <div class="row content-reverse">
                <div class="col-lg-3">
                    <div class="shop-widget-promo"><a href="#"><img src="{{ $categorey->image_path }}" alt="promo"></a></div>
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">تصفية حسب السعر</h6>
                        <form>
                            <div class="shop-widget-group"><input type="text" placeholder="أقل - 00"><input type="text" placeholder="أكثر - SDG"></div><button class="shop-widget-btn"><i class="fas fa-search"></i><span>بحث</span></button>
                        </form>
                    </div>
                    <div class="shop-widget">
                        <h6 class="shop-widget-title">تصفية حسب القسم</h6>
                        <form><input class="shop-widget-search" type="text" placeholder="بحث...">
                            <ul class="shop-widget-list shop-widget-scroll">
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate1"><label for="cate1">الخضروات</label></div><span class="shop-widget-number">(13)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate2"><label for="cate2">الفواكة</label></div><span class="shop-widget-number">(28)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate3"><label for="cate3">الحبوب</label></div><span class="shop-widget-number">(35)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate4"><label for="cate4">المواشي و الأغنام</label></div><span class="shop-widget-number">(47)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate5"><label for="cate5">الدواجن و الطيور</label></div><span class="shop-widget-number">(59)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate6"><label for="cate6">الأعلاف</label></div><span class="shop-widget-number">(64)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate7"><label for="cate7">الحليب و مشتقاته</label></div><span class="shop-widget-number">(77)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate8"><label for="cate8">التمور</label></div><span class="shop-widget-number">(85)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate9"><label for="cate9">البهارات</label></div><span class="shop-widget-number">(92)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate10"><label for="cate10">الصمغ العربي</label></div><span class="shop-widget-number">(21)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate11"><label for="cate11">الأسماك</label></div><span class="shop-widget-number">(14)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">التقاوي و الأقطان</label></div><span class="shop-widget-number">(56)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">الأخشاب</label></div><span class="shop-widget-number">(76)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">الشتول</label></div><span class="shop-widget-number">(34)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">المعدات الزراعية</label></div><span class="shop-widget-number">(12)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">النحل و النحالين</label></div><span class="shop-widget-number">(53)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">النباتات الطبية</label></div><span class="shop-widget-number">(82)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="cate12"><label for="cate12">البزور الزيتية</label></div><span class="shop-widget-number">(43)</span>
                                </li>
                            </ul><button class="shop-widget-btn"><i class="far fa-trash-alt"></i><span>مسح التصفية</span></button>
                        </form>
                    </div>

                    <div class="shop-widget">
                        <h6 class="shop-widget-title">تصفية حسب المنتجات</h6>
                        <form>
                            <ul class="shop-widget-list">
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="tag1"><label for="tag1">منتجات جديدة</label></div><span class="shop-widget-number">(13)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="tag2"><label for="tag2">منتجات التخفيض</label></div><span class="shop-widget-number">(28)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="tag3"><label for="tag3">منتجات التقييم</label></div><span class="shop-widget-number">(35)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="tag4"><label for="tag4">منتجات مميزة</label></div><span class="shop-widget-number">(47)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="tag5"><label for="tag5">منتجات العروض</label></div><span class="shop-widget-number">(59)</span>
                                </li>
                            </ul><button class="shop-widget-btn"><i class="far fa-trash-alt"></i><span>مسج التصفية</span></button>
                        </form>
                    </div>

                    <div class="shop-widget">
                        <h6 class="shop-widget-title">تصفية حسب الشركات</h6>
                        <form><input class="shop-widget-search" type="text" placeholder="بحث...">
                            <ul class="shop-widget-list shop-widget-scroll">
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand1"><label for="brand1">شركة سيدتك للزراعة</label></div><span class="shop-widget-number">(13)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand2"><label for="brand2">شركة حلا الدولية</label></div><span class="shop-widget-number">(28)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand3"><label for="brand3">شركة قريت أيرث</label></div><span class="shop-widget-number">(35)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand4"><label for="brand4">شركة تست للزراعة</label></div><span class="shop-widget-number">(47)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand5"><label for="brand5">شركة الزراعة الدولية</label></div><span class="shop-widget-number">(59)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand2"><label for="brand2">شركة حلا الدولية</label></div><span class="shop-widget-number">(28)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand3"><label for="brand3">شركة قريت أيرث</label></div><span class="shop-widget-number">(35)</span>
                                </li>
                                <li>
                                    <div class="shop-widget-content"><input type="checkbox" id="brand4"><label for="brand4">شركة تست للزراعة</label></div><span class="shop-widget-number">(47)</span>
                                </li>
                            </ul><button class="shop-widget-btn"><i class="far fa-trash-alt"></i><span>مسح التصفية</span></button>
                        </form>
                    </div>

                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="top-filter">
                                <div class="filter-show"><label class="filter-label">عرض :</label><select class="form-select filter-select">
                                        <option value="1">12</option>
                                        <option value="2">24</option>
                                        <option value="3">36</option>
                                    </select></div>
                                <div class="filter-short"><label class="filter-label">ترتيب بحسب :</label><select class="form-select filter-select">
                                        <option selected="">الإفتراضي</option>
                                        <option value="3">السعر</option>
                                        <option value="1">العروض المميزة</option>
                                        <option value="2">الخصم</option>
                                    </select></div>

                            </div>
                        </div>
                    </div>
                    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4">
                        @foreach ($min_product as $product)
                            
                            <div class="col">
                                <div class="product-card">
                                    <div class="product-media">
                                        <div class="product-label">
                                            <label class="label-text new">جديد</label>
                                        </div>
                                        <button class="product-wish wish"><i class="fas fa-heart"></i></button>
                                        <a class="product-image" href="#">
                                            <img src="{{ $product->imageProduct[1]->image_path }}" alt="product">
                                        </a>
                                        <div class="product-widget">
                                            <a title="مقارنة المنتج" href="#" class="fas fa-random"></a>
                                            <a title="فيديو المنتج" href="https://youtu.be/9xzcVxSBbG8" class="venobox fas fa-play" data-autoplay="true" data-vbtype="video"></a>
                                            <a title="مشاهدة المنتج" href="#" class="fas fa-eye" data-bs-toggle="modal" data-bs-target="#product-view"></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-rating">
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="active icofont-star"></i>
                                            <i class="icofont-star"></i><a href="#">(3)</a>
                                        </div>
                                        <h6 class="product-name"><a href="#">فلفل طازج</a></h6>
                                        <h6 class="product-price">
                                            <del>SDG34</del><span>SDG28<small>/الكيلو</small></span>
                                        </h6>
                                            <button class="product-add add-cart" data-url="{{ route('cart.add') }}" data-id="{{ $product->id }}">
                                                <i class="fas fa-shopping-basket"></i><span>إضافة</span>
                                            </button>
                                        <div class="product-action">
                                            <button class="action-minus" title="نقصان الكمية">
                                                <i class="icofont-minus"></i></button>
                                            <input class="action-input" title="Quantity Number" type="text" name="quantity" value="1">
                                            <button class="action-plus" title="زيادة الكمية">
                                                <i class="icofont-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                     
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="bottom-paginate">
                                <p class="page-info">عرض 12 من 60 نتائج لـ الخضروات</p>
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-right"></i></a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">...</li>
                                    <li class="page-item"><a class="page-link" href="#">60</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fas fa-long-arrow-alt-left"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
