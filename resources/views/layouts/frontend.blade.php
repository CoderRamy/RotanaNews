<!doctype html>
<html lang="{{app()->getLocale()=="en"?"en-US":"ar-SA"}}" dir="{{app()->getLocale()=="en"?"ltr":"rtl"}}">
<head>
    @include('partials.frontend._header')
    @if(env('ads',true))
        <!-- https://ww2.rotana.net/ -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-3236R0PY39"></script>
        <!-- https://www.rotana.net/ -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-VVDPMVKYVT"></script>
    @endif
</head>
<body>
@if(env('ads',true))
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'G-3236R0PY39');
    </script>

    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-VVDPMVKYVT');
    </script>
@endif
{{--{{dd(route(Route::current()?->getName(),['id'=>123,'title'=>'يبليب']))}}--}}

{{--{{dd($ads)}}--}}
<!-- loader Start -->
<div id="loading">
    <div id="loading-center">
    </div>
</div>


<!-- loader END -->
<!-- Header -->
@include('partials.frontend._navbar')
<!-- Header End -->

{{ $slot }}
@if($current_time_zone=Session::get('current_time_zone'))@endif
<input type="hidden" id="hd_current_time_zone"
       value="{{{$current_time_zone ? $current_time_zone['curent_zone'] : ""}}}">
@include('partials.frontend._footer')
<script src='https://www.google.com/recaptcha/api.js' async defer></script>
@if(env('cookiebot',true))
    <script id="Cookiebot" src="https://consent.cookiebot.com/uc.js" data-cbid="42ca3cc5-73f3-4135-a5e2-6eb13f346ce6"
            data-blockingmode="auto"></script>
@endif
@stack('script')
</body>
</html>
