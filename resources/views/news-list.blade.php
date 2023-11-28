<layouts.frontend>
    <div class="iq-breadcrumb-one  iq-bg-over " style="background-image: url('https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/news/bg.jpg');">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">{{ $SelectedCategory?->name }}</h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active">{{ $SelectedCategory?->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @push('adSection')
        <script src="{{ asset('js/newsAdsScripts.js') }}"></script>
    @endpush
    @php
        $isMobile = false;
        $userAgent = request()->header('User-Agent');
        if (preg_match('/iPhone|iPad|iPod|Android/i', $userAgent)) {
            $isMobile = true;
        }
    @endphp
        <!-- Main container -->
    <main id="news-page">
        <div class="container">
            {{--            @include('partials.frontend.RotanaBanner', ['id' => '4']) --}}
            {{--            @if (!$isMobile)--}}
            {{--                --}}{{--                Rotana_Home_desktop_1x1 --}}
            {{--                <div id='div-gpt-ad-1684217182897-0'>--}}
            {{--                    <script>--}}
            {{--                        googletag.cmd.push(function() {--}}
            {{--                            googletag.display('div-gpt-ad-1684217182897-0');--}}
            {{--                        });--}}
            {{--                    </script>--}}
            {{--                </div>--}}
            {{--            @else--}}
            {{--                <!-- /40784803/Rotana_Home_mobile_1x1 -->--}}
            {{--                <div id='div-gpt-ad-1684218216894-0'>--}}
            {{--                    <script>--}}
            {{--                        googletag.cmd.push(function() {--}}
            {{--                            googletag.display('div-gpt-ad-1684218216894-0');--}}
            {{--                        });--}}
            {{--                    </script>--}}
            {{--                </div>--}}
            {{--            @endif--}}
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    @include('partials.frontend._searchBar')

                    @if ($rss->total() == 0)
                        {{ __('no_results') }}
                    @endif
                    @foreach ($rss as $rs)
                        <article>
                            <div class="iq-blog-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="iq-blog-image">
                                            <img src="{{ $rs->image ? $rs->image : ($rs->images[0]->imageUrl ?? 'https://d1rjxhevrfxjk0.cloudfront.net/default/Vod_default.webp') , '315', '280', 'crop-center' }}"
                                                {{--                                                 style="max-height: 160px;" --}}
                                                onerror="this.onerror=null;this.src='https://d1rjxhevrfxjk0.cloudfront.net/images/news_default.webp';"
                                                alt="{{ $rs->title??"default" }}">
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
                                                       href="{{ route('frontend.newsDetails',[ $rs->id]) }}"
                                                       style="color: green;">{{ __('Read More') }}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>

                        @if ($loop->index < 1 && $isMobile)
                            <!-- /40784803/Rotana_MobileApp_300x250 -->
                            {{--                            TODO uncomment --}}

                            <div id='div-gpt-ad-1684218289058-0' style='min-width: 300px; min-height: 290px;'>
                                <script>
                                    googletag.cmd.push(function () {
                                        googletag.display('div-gpt-ad-1684218289058-0');
                                    });
                                </script>
                            </div>
                        @endif
                    @endforeach

                    {{ $rss->withQueryString()->links() }}

                    @if (!$isMobile)
                        <!-- /40784803/Rotana_Category_HalfPage_300x600 -->
                        <div id='div-gpt-ad-1685018659124-0'>
                            <script>
                                googletag.cmd.push(function () {
                                    googletag.display('div-gpt-ad-1685018659124-0');
                                });
                            </script>
                        </div>
                    @endif
                </div>

                <div class="col-lg-4 col-sm-12">

                    @include('partials.frontend.sidebar')
                </div>

            </div>

        </div>
    </main>
    @push('style')
    <style>
        .default-img:before {
            content: ' ';
            display: block;
            position: absolute;
            height: 150px;
            width: 150px;
        }
    </style>
    @endpush
</layouts.frontend>
