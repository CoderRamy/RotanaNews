<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@hasSection('seo')
    @yield('seo')
@else
    <title>روتانا | Rotana</title>
    <meta name="description" content="{{ __('Rotana TV Desc') }}">
@endif

<meta name="robots" content="index, archive">
<link rel="canonical" href="http://rotana.net/">
<link rel="shortcut icon" href="{{ asset('website/images/new-img/icon.png') }}">
{{--<link rel="stylesheet" href="{{ asset('css/all-files.css') }}" media="all">--}}

@if (env('APP_ENV', 'production') == 'production')
    <link rel="stylesheet" href="https://d1rjxhevrfxjk0.cloudfront.net/css/all-files.css" media="all">
@else
    <link rel="stylesheet" href="{{ mix('css/all-files.css') }}" media="all">
@endif

@stack('style')
@if(env('ads',true))
    @stack('adSection')
@endif
