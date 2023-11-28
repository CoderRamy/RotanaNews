@php
    $isMobile = false;
    $userAgent = request()->header('User-Agent');
    if (preg_match('/iPhone|iPad|iPod|Android/i', $userAgent)) {
        $isMobile = true;
    }
@endphp
@if(env('ads',true))
    @if (!$isMobile)
        <script>
            window.googletag = window.googletag || {cmd: []};
            googletag.cmd.push(function () {
                googletag.defineSlot('/40784803/Rotana_Home_desktop_1x1', [1, 1], 'div-gpt-ad-1684837850413-0').addService(googletag.pubads());
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>
        <!-- /40784803/Rotana_Home_desktop_1x1 -->
        <div id='div-gpt-ad-1684837850413-0'>
            <script>
                googletag.cmd.push(function () {
                    googletag.display('div-gpt-ad-1684837850413-0');
                });
            </script>
        </div>
    @else
        <!-- /40784803/Rotana_LargeMobileBanner_320x100 -->
        <div id='div-gpt-ad-1685019267615-0'>
            <script>
                googletag.cmd.push(function () {
                    googletag.display('div-gpt-ad-1685019267615-0');
                });
            </script>
        </div>
        <script>
            window.googletag = window.googletag || {cmd: []};
            googletag.cmd.push(function () {
                googletag.defineSlot('/40784803/Rotana_Home_mobile_1x1', [1, 1], 'div-gpt-ad-1684845111615-0').addService(googletag.pubads());
                googletag.pubads().enableSingleRequest();
                googletag.enableServices();
            });
        </script>

        <!-- /40784803/Rotana_Home_mobile_1x1 -->
        <div id='div-gpt-ad-1684845111615-0'>
            <script>
                googletag.cmd.push(function () {
                    googletag.display('div-gpt-ad-1684845111615-0');
                });
            </script>
        </div>
    @endif
@endif

<footer id="contact" class="footer-one iq-bg-dark">
    <!-- Address -->
    <div class="footer-top logo-img">
        <div class="container-fluid">
            <div class="row footer-standard">

                <div class="col-lg-6">
                    <div class="widget text-left">

                        <div class="widget">
                            <div class="menu-footer-link-1-container">
                                <a class="app-image" href="#">
                                    <img src="https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/logo.png"
                                         alt="play-store">

                                </a>
                            </div>
                        </div>


                        <div class="menu-footer-link-1-container">
                            <ul id="menu-footer-link-1" class="menu p-0">
                                <li id="menu-item-7314"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7314">
                                    <a
                                        href="{{ route('frontend.terms-and-conditions') }}">{{ __('Terms and Conditions') }}</a>
                                </li>
                                <li id="menu-item-7316"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7316">
                                    <a href="{{ route('frontend.privacy-policy') }}">{{ __('Privacy') }}</a>
                                </li>
                                {{-- <li id="menu-item-701"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-701">
                                    <a href="{{ route('frontend.faq') }}">{{ __('FAQs') }}</a>
                                </li> --}}
                                <li id="menu-item-7118"
                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7118">
                                    <a href="{{ route('frontend.contactus') }}">{{ __('Contact us') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget text-left">
                        <div class="textwidget">
                            <p><small>
                                    {{ __('CopyRight') }}

                                    {{ __('CopyRight_desc') }}
                                </small></p>
                            <p><small>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <h6 class="footer-link-title">
                        {{ __('Follow us on:') }}
                    </h6>
                    <ul class="info-share">
                        <li><a target="_blank" href="https://www.facebook.com/rotanaportal"
                               aria-label="https://www.facebook.com/rotanaportal"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a target="_blank" href="https://twitter.com/rotana"
                               aria-label="https://twitter.com/rotana"><i class="fa fa-twitter"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/rotananet"
                               aria-label="https://www.instagram.com/rotananet"> <i class="fa fa-instagram"></i></a>
                        </li>
                        <li><a target="_blank" href="https://www.youtube.com/@khalejiatv"
                               aria-label="https://www.youtube.com/@khalejiatv"><i class="fa fa-youtube"></i></a></li>
                        <li><a target="_blank" href="https://www.tiktok.com/@rotana?lang=en"
                               aria-label="https://www.tiktok.com/@rotana?lang=en">


                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path
                                        d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>


                </div>
                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="widget text-left">
                        <div class="textwidget">
                            <h6 class="footer-link-title">{{ __('Get it from') }}</h6>
                            <div class="d-flex align-items-center">
                                <a class="app-image" target="_blank"
                                   href="https://play.google.com/store/apps/details?id=net.rotana">
                                    <img src="{{ asset('images/new-img/01.jpg') }}" loading="lazy" alt="play-store">
                                </a><br>
                                <a class="ml-3 app-image" target="_blank"
                                   href="https://apps.apple.com/eg/app/rotana-net/id1238137062">
                                    <img src="{{ asset('images/new-img/02.jpg') }}" loading="lazy"
                                         alt="apple-store">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- @if ($isMobile)
                    <!-- /40784803/Rotana_Mobile_Sticky -->
                    <div id='div-gpt-ad-1684838209242-0' style="max-height: 50px" class="div-gpt-ad-1684218393545-0">
                        <script>
                            googletag.cmd.push(function() {
                                googletag.display('div-gpt-ad-1684838209242-0');
                            });
                        </script>
                    </div>
                @endif --}}
            </div>
        </div>
    </div>
</footer>
<!-- MainContent End-->
<!-- back-to-top -->
<div id="back-to-top">
    <a class="top" href="#top" id="top"> <i class="fa fa-angle-up"></i> </a>
</div>

@if (env('APP_ENV', 'production') == 'production' )
    <script src="https://d1rjxhevrfxjk0.cloudfront.net/js/all-files.js"></script>
@else
    <script src="{{ asset('js/all-files.js') }}"></script>
@endif
{{--    <script src="{{ mix('js/all-files.js') }}"></script>--}}
@if(env('ads',true))
    <script async src='https://securepubads.g.doubleclick.net/tag/js/gpt.js'></script>
    {{-- <script src={{'https://cdn.netmera-web.com/wsdkjs/' . env('NETMERA_API_KEY')}} async></script> --}}
    <script>
        // <!-- NON-GDPR regions and GDPR regions for Ads-->
        var script = document.createElement('script');
        script.src = "https://tv.springserve.com/ssusersync";
        document.head.appendChild(script);
    </script>

@endif

<script defer>
    var urlLang = "{{ route('changeLang') }}";

    function changeLang(lang) {
        window.location.href = urlLang + "?lang=" + lang;

    };


    const copyContent = async (data) => {
        try {
            var input = document.createElement('textarea');
            input.innerHTML = data;
            document.body.appendChild(input);
            input.select();
            var result = document.execCommand('copy');
            document.body.removeChild(input);
            alert('copied');
            return result;
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }

    $(document).ready(function () {
        if ($('#hd_current_time_zone').val() == "") { // Check for hidden field is empty. if is it empty only execute the post function
            var current_date = new Date();
            var current_zone = -current_date.getTimezoneOffset() * 60;
            var token = "{{ csrf_token() }}";
            $.ajax({
                method: "POST",
                url: "{{ URL::to('ajax/set_current_time_zone/') }}",
                data: {
                    '_token': token,
                    'curent_zone': current_zone
                }
            }).done(function (data) {
            });
        }
    });
        $(document).ready(function () {
        $("#exampleModal").on('hide.bs.modal', function () {
            if (typeof HibridPlayer !== "undefined") {
                removePlayer()
            }
        });
    });
</script>
