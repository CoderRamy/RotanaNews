<layouts.frontend>
    @push('style')
        <style>
            .slider {
                width: 100%;
                height: 400px;
                overflow: hidden;
                position: relative;
            }

            /* .slide {
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                left: 0;
                opacity: 0;
                transition: opacity 1s ease-in-out;
            } */

            .slide.active {
                opacity: 1;
            }

            .prev,
            .next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                font-size: 20px;
                font-weight: bold;
                color: #fff;
                background: rgba(0, 0, 0, 0.5);
                border: none;
                outline: none;
                cursor: pointer;
                padding: 10px 15px;
            }

            .prev {
                left: 0;
            }

            .next {
                right: 0;
            }
        </style>
    @endpush
    @push('adSection')
        <script src="{{ asset('js/newsDetailsAdsScripts.js') }}"></script>

    @endpush
    @php
        $isMobile = false;
        $userAgent = request()->header('User-Agent');
        if (preg_match('/iPhone|iPad|iPod|Android/i', $userAgent)) {
            $isMobile = true;
        }
    @endphp
        <!-- Main container -->
    <main id="main" class="site-main news-page">
        {{--        @if (!$isMobile)--}}
        {{--            --}}{{--                Rotana_Home_desktop_1x1--}}
        {{--            <div id='div-gpt-ad-1684217182897-0'>--}}
        {{--                <script>--}}
        {{--                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1684217182897-0'); });--}}
        {{--                </script>--}}
        {{--            </div>--}}
        {{--        @else--}}

        {{--            <!-- /40784803/Rotana_Home_mobile_1x1 -->--}}
        {{--            <div id='div-gpt-ad-1684218216894-0'>--}}
        {{--                <script>--}}
        {{--                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1684218216894-0'); });--}}
        {{--                </script>--}}
        {{--            </div>--}}

        {{--        @endif--}}
        <div class="container elementor-widget-container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <article id="myPrint">
                        <div class="iq-blog-box">
                            <div class="iq-blog-image">
                                @if (!is_null($r->video))
                                    <script data-type="hibrid-vod-embed">
                                        !function (e, d, i, t, a, n, r, o) {
                                            o = "p" + (new Date).getTime() + Math.floor(1 + 1e6 * Math.random()), d.writeln('<div><div id="' + o + '"></div></div>'), a = d.createElement("script"), n = d.getElementsByTagName("script")[0], a.async = 1, a.src = "https://embed.hibridcdn.net/static/bundles/embed/hibrid-vod.min.js", a.onload = function () {
                                                HibridVOD({el: o}).video("{{$r->video}}").player("6f155297-30e8-464d-bfde-98ffe3a54dcc").render()
                                            }, n.parentNode.insertBefore(a, n)
                                        }(window, document);
                                    </script>
                                @elseif(count($r->images) > 1)
                                    <div class="slider">
                                        @foreach ($r->images as $image)
                                            <img class="slide" src={{ $image->imageUrl }} alt="news_image">
                                        @endforeach

                                    </div>
                                    <button
                                        class="prev">{{ app()->getLocale() == 'en' ? html_entity_decode('&#10094;') : html_entity_decode('&#10095;') }}</button>
                                    <button
                                        class="next">{{ app()->getLocale() == 'en' ? html_entity_decode('&#10095;') : html_entity_decode('&#10094;') }}</button>
                                @else
                                    <img width="1920" height="1080"
                                         src="{{ count($r->images) == 1 ? $r->images[0]->imageUrl : $r->image }}"
                                         loading="lazy"
                                         onerror="this.onerror=null;this.src='https://d1rjxhevrfxjk0.cloudfront.net/images/news_default.webp';"
                                         alt="{{ $r->title ??"default"}}">
                                @endif

                            </div>

                            <div class="iq-blog-detail">
                                <div class="iq-blog-meta">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <i class="fa fa-calendar mr-1" aria-hidden="true"></i>
                                            <span class="screen-reader-text">{{ __('Posted on') }}</span>
                                            <time
                                                datetime="2019-02-02T12:46:15+00:00">{{ \Carbon\Carbon::parse($r->created_at)->translatedFormat('D,d M') }}</time>
                                        </li>
                                    </ul>


                                </div>

                                <div id="myCopy">
                                    <div class="blog-title">
                                        <h3 class="entry-title">
                                            {{ $r->title }}
                                        </h3>
                                    </div>
                                </div>

                                <div class="blog-content ae-element-post-content">
                                    <p>
                                        {{--                                    {{ $r->description }} --}}
                                        {!! html_entity_decode(strip_tags($r->description)) !!}
                                    </p>

                                    <div class="row d-flex justify-content-center">
                                        <ul class="list-inline p-0 m-0 music-play-lists share-news">
                                            {{-- <li class="share">
                                                <span><i class="ri-share-fill"></i></span>
                                                <div class="share-box">
                                                    <div class="d-flex align-items-center">
                                                        <a href="https://www.facebook.com/sharer?u={{ route('frontend.newsDetails', $r->id) }}"
                                                           target="_blank" rel="noopener noreferrer" class="share-ico"
                                                           tabindex="0"><i class="ri-facebook-fill"></i></a>
                                                        <a href="https://twitter.com/intent/tweet?text={{ $r->title . ' ' . route('frontend.newsDetails', $r->id) }}"
                                                            target="_blank" rel="noopener noreferrer" class="share-ico"
                                                            tabindex="0"><i class="ri-twitter-fill"></i></a>
                                                        <a href="javascript:void(0)"
                                                            onclick="navigator.clipboard.writeText('{{ route('frontend.newsDetails', $r->id) }}')"
                                                            data-link="{{ route('frontend.newsDetails', $r->id) }}"
                                                            class="share-ico iq-copy-link" tabindex="0"><i
                                                                class="ri-links-fill"></i></a>
                                                    </div>
                                                </div>
                                            </li> --}}


                                            <li>
                                                <a href="https://www.facebook.com/sharer?u={{ route('frontend.newsDetails', [$r->id,'title'=>$r->getTranslation('title','ar')]) }}"
                                                   target="_blank" rel="noopener noreferrer" class="share-ico"
                                                   tabindex="0">

                                                    <i class="ri-facebook-fill"></i> </a>
                                            </li>


                                            <li>
                                                <a href="https://twitter.com/intent/tweet?text={{ $r->title . route('frontend.newsDetails', [$r->id,'title'=>$r->getTranslation('title','ar')])  }}"
                                                   target="_blank" rel="noopener noreferrer" class="share-ico"
                                                   tabindex="0"><i class="ri-twitter-fill"></i></a>
                                            </li>


                                            <li>
                                                <a href="javascript:void(0)"
                                                   onclick="navigator.clipboard.writeText('{{ route('frontend.newsDetails', [$r->id,'title'=>$r->getTranslation('title','ar')]) }}')"
                                                   data-link="{{ route('frontend.newsDetails', [$r->id,'title'=>$r->getTranslation('title','ar')]) }}"
                                                   class="share-ico iq-copy-link" tabindex="0"><i
                                                        class="ri-links-fill"></i></a>
                                            </li>

                                            <li>
                                                <a href="#" onclick="printDiv('myPrint')">
                                                    <i class="ri-printer-fill"></i>
                                                </a>
                                            </li>


                                            <li>
                                                <a onclick="copyText()" href="#">
                                                    <i class="ri-file-copy-2-line"></i>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                        <script class="teads" src="https://a.teads.tv/page/113085/tag" async></script>
                    </article>

                    <br>
                    @if(env('ads',true))
                        <!-- /40784803/Rotana_Article_Leaderboard -->
                        <div id='div-gpt-ad-1685083333400-0' class="banner-box">
                            <script>
                                googletag.cmd.push(function () {
                                    googletag.display('div-gpt-ad-1685083333400-0');
                                });
                            </script>
                        </div>
                    @endif

                    <br>
                    @foreach ($rss as $rs)
                        <article>
                            <div class="iq-blog-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="iq-blog-image">
                                            <img width="1920" height="1080"
                                                 src="{{ $rs->image ?: (isset($rs->images[0])?$rs->images[0]->imageUrl:"") }}"

                                                 {{--                                                 style="max-height: 890px;" --}}
                                                 onerror="this.onerror=null;this.src='https://d1rjxhevrfxjk0.cloudfront.net/images/news_default.webp';"
                                                 alt="{{ $rs->title ??"default"}}">

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="iq-blog-detail">
                                            <div class="iq-blog-meta">

                                            </div>
                                            <div class="blog-title">
                                                <h5 class="entry-title">
                                                    <a
                                                        href="{{ route('frontend.newsDetails', [$rs->id,'title'=>$rs->getTranslation('title','ar')]) }}">{{ $rs->title }}</a>
                                                </h5>
                                            </div>
                                            <div class="blog-content">


                                                <p>{!! strip_tags(html_entity_decode($rs->description, 100)) !!}
                                                    <a class="button-link"
                                                       href="{{ route('frontend.newsDetails', [$rs->id,'title'=>$rs->getTranslation('title','ar')]) }}"
                                                       style="color: green;">{{ __('Read More') }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="col-lg-4 col-sm-12">
                    @if(env('ads',true))

                        @php
                            $isMobile = false;
                            $userAgent = request()->header('User-Agent');
                            if (preg_match('/iPhone|iPad|iPod|Android/i', $userAgent)) {
                                $isMobile = true;
                            }
                        @endphp
                        @if ($isMobile)
                            <!-- /40784803/Rotana_MobileApp_300x250 -->

                            {{--                        TODO uncomment --}}

                            <div id='div-gpt-ad-1684218289058-0' style='min-width: 300px; min-height: 250px;'>
                                <script>
                                    googletag.cmd.push(function () {
                                        googletag.display('div-gpt-ad-1684218289058-0');
                                    });
                                </script>
                            </div>
                            <br>
                        @endif
                    @endif

                    @include('partials.frontend.sidebar')
                    @if(env('ads',true))

                        @if (!$isMobile)
                            <!-- /40784803/Rotana_Article_InArticle_MPU -->
                            <div id='div-gpt-ad-1685081320780-0'>
                                <script>
                                    googletag.cmd.push(function () {
                                        googletag.display('div-gpt-ad-1685081320780-0');
                                    });
                                </script>
                            </div>

                            <br>
                            <!-- /40784803/Rotana_Article_HalfPage_300x600 -->
                            <div id='div-gpt-ad-1685081640412-0'>
                                <script>
                                    googletag.cmd.push(function () {
                                        googletag.display('div-gpt-ad-1685081640412-0');
                                    });
                                </script>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </main>
    <script>
        let slides = document.querySelectorAll(".slide");
        let currentSlide = 0;

        function nextSlide() {
            slides[currentSlide].classList.remove("active");
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add("active");
        }

        function previousSlide() {
            slides[currentSlide].classList.remove("active");
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            slides[currentSlide].classList.add("active");
        }

        let prevButton = document.querySelector(".prev");
        let nextButton = document.querySelector(".next");

        prevButton.addEventListener("click", () => {
            previousSlide();
        });

        nextButton.addEventListener("click", () => {
            nextSlide();
        });
        nextSlide();
    </script>

</layouts.frontend>
