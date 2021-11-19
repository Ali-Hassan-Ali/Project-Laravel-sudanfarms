@extends('home.layout.app')

@section('content')

@section('supplier', __('home.supplier'))  

<section class="inner-section single-banner">
    <div class="container">
        <h2>الموردون</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">الرئيسية</a></li>
            <li class="breadcrumb-item active" aria-current="page">الموردون</li>
        </ol>
    </div>
</section>
<section class="inner-section contact-part">
    <div class="container">
        <div class="row">
            @foreach ($category_dealers as $data)
                
                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="branch-card"><img src="images/video.jpg" alt="branch">
                        <div class="branch-overlay">
                            <h3>{{ $data->name }}</h3>
                            <p>هذا النص بديل لـ نص آخر سيتم إستبداله بنص حقيقي.</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

@endsection 