@extends('home.layout.app')

@section('content')

@section('title', __('home.privacys'))

    <section class="inner-section privacy-part mt-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <nav class="nav nav-pills flex-column" id="scrollspy">
                        @foreach ($policys as $policy)

                    	   <a class="nav-link" href="#item-{{ $policy->id }}">{{ $policy->title }}</a>
                            
                        @endforeach
                    </nav>
                </div>
                <div class="col-lg-9">
                    <div data-bs-spy="scroll" data-bs-target="#scrollspy" data-bs-offset="0" tabindex="0">
                        @foreach ($policys as $policy)

                            <div class="scrollspy-content" id="item-{{ $policy->id }}">
                                <h3>{{ $policy->title }}</h3>
                                <p>{{ $policy->body }}</p>
                            </div>
                            
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection