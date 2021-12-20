<!DOCTYPE html>
<html>
<head>
    <title>sudan farms | 
        @if (app()->getLocale() == 'ar')

            {{ $user['title_ar'] }}
            
        @else

            {{ $user['title_en'] }}

        @endif
    </title>
</head>
<body>
    @if (app()->getLocale() == 'ar')

        <h1>{{ $user['title_ar'] }}</h1>
        
    @else

        <h1>{{ $user['title_en'] }}</h1>

    @endif

    <h2>
        <a href="{{ route('dashboard.welcome') }}">
            @lang('dashboard.show')
        </a>
    </h2>

</body>
</html>