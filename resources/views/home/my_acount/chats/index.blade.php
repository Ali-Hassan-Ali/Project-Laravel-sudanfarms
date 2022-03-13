@extends('home.layout.app')

@section('content')

@section('title', __('dashboard.shop'))

<div class="container my-5">

    <!-- Page header start -->
    <div class="page-title">
        <div class="row gutters">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <h5 class="title">Chat App</h5>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"> </div>
        </div>
    </div>
    <!-- Page header end -->

    <!-- Content wrapper start -->
    <div class="content-wrapper my-5 py-5 border">

        <!-- Row start -->
        <div class="row gutters">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                <div class="card m-0">

                    <!-- Row start -->
                    <div class="row no-gutters bg-sellers">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-3 col-3">
                            <div class="users-container">
                                <div class="chat-search-box">
                                    <div class="input-group">
                                        <p>@lang('home.sellers')</p>
                                    </div>
                                </div>
                                <ul class="users">

                                    @if ($seller)
                                        
                                        @foreach ($users as $data)
                                            <li class="person" data-chat="person1">
                                                {{-- <li class="person active-user" data-chat="person2"> --}}
                                                <a href="{{ route('chats.index', ['to'=>$data->id]) }}">
                                                    <div class="user">
                                                        <img src="{{ $data->image_path }}" alt="Retail Admin">
                                                        <span class="status busy"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">{{ $data->name }}</span>
                                                        {{-- <span class="time">15/02/2019</span> --}}
                                                    </p>
                                                </a>
                                            </li>
                                        @endforeach

                                    @else

                                        @foreach ($promoted_dealer as $data)
                                            <li class="person" data-chat="person1">
                                                {{-- <li class="person active-user" data-chat="person2"> --}}
                                                <a href="{{ route('chats.index', ['to'=>$data->user->id]) }}">
                                                    <div class="user">
                                                        <img src="{{ $data->logo_path }}" alt="Retail Admin">
                                                        <span class="status busy"></span>
                                                    </div>
                                                    <p class="name-time">
                                                        <span class="name">{{ $data->company_name }}</span>
                                                        {{-- <span class="time">15/02/2019</span> --}}
                                                    </p>
                                                </a>
                                            </li>
                                        @endforeach


                                    @endif

                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-9 col-9 bg-sudanfarms">
                            @if ($promoted)          
                                <div class="selected-user">
                                    <span class="text-light">@lang('home.to'): 
                                        <span class="name text-light">{{ $promoted->company_name }}</span>
                                    </span>
                                </div>
                            @endif
                            <div class="chat-container scrollspy-example" data-spy="scroll" data-offset="4">
                                <ul class="chat-box chatContainerScroll">

                                    @if ($seller)
                                        @foreach ($chats_me as $chat)
                                            @php
                                                $user = App\Models\User::find($chat->to);
                                            @endphp
                                            <li class="chat-{{ $chat->me == auth()->id() ? 'left' : 'right' }}">
                                                <div class="chat-avatar">
                                                    <img src="{{ $user->image_path }}" alt="{{ $user->name }}">
                                                    <div class="chat-name">{{ $user->name }}</div>
                                                </div>
                                                <div class="chat-text">{{ $chat->message }}</div>
                                                <div class="chat-hour mx-2">{{ $chat->created_at->toFormattedDateString() }}
                                                    <span class="fa fa-check-circle mx-1"></span>
                                                </div>
                                            </li>
                                        @endforeach   
                                    @endif

                                    @if ($chats->count() > 0)
                                        
                                        @foreach ($chats as $chat)
                                            <li class="chat-{{ $chat->me == auth()->id() ? 'left' : 'right' }}">
                                                <div class="chat-avatar">
                                                    @if ($chat->me == auth()->id())

                                                        <img src="{{ auth()->user()->image_path }}" alt="{{ auth()->user()->name }}">
                                                        <div class="chat-name">{{ auth()->user()->name }}</div>
                                                        
                                                    @else

                                                        <img src="{{ $promoted->logo_path }}" alt="Retail Admin">
                                                        <div class="chat-name">Russell</div>

                                                    @endif
                                                </div>
                                                <div class="chat-text">{{ $chat->message }}</div>
                                                <div class="chat-hour mx-2">{{ $chat->created_at->toFormattedDateString() }}
                                                    <span class="fa fa-check-circle mx-1"></span>
                                                </div>
                                            </li>
                                        @endforeach

                                    @else

                                        <p class="text-light">@lang('dashboard.no_data_found')</p>

                                    @endif
                                </ul>
                                @if (request()->to)
                                <div class="form-group mt-3 mb-0">

                                    <form action="{{ route('chats.store') }}" method="post">
                                        @csrf
                                        @method('post')

                                        <textarea class="form-control" name="message" rows="3" placeholder="Type your message here..."></textarea>
                                        <input type="number" name="to" value="{{ request()->to }}" hidden>

                                        <button class="btn btn-outline col-12 my-3">@lang('home.send')</button>
                                        
                                    </form>

                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- Row end -->
                </div>

            </div>

        </div>
        <!-- Row end -->

    </div>
    <!-- Content wrapper end -->

</div>

@endsection