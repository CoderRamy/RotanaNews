<layouts.frontend>
{{--    {{dd($newsImages)}}--}}
    <div class="iq-breadcrumb-one  iq-bg-over " style="background-image: url('https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/news/bg.jpg');">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <nav aria-label="breadcrumb" class="text-center iq-breadcrumb-two">
                        <h2 class="title">{{ __('Rotana News') }}</h2>
                        <ol class="breadcrumb main-bg">
                            <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Rotana News') }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    @push('adSection')
        <script src="../js/newsAdsScripts.js" ></script>
@endpush
@php
    $isMobile = false;
    $userAgent = request()->header('User-Agent');
    if (preg_match('/iPhone|iPad|iPod|Android/i', $userAgent)) {
        $isMobile = true;
    }
@endphp
<!-- Main container -->
    <main id="main">
        <div class="container">
            @include('partials.frontend.RotanaBanner', ['id' => '4'])

            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    @if($news->total() == 0)

                        {{ __('no_results') }}
                    @endif
                    @foreach ($news as $i => $ns)
                        <article>
                            <div class="iq-blog-box">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="iq-blog-image">
                                            <img referrerpolicy="no-referrer" width="1920" height="1080" src={{ $newsImages[$i] }}
                                                 alt="{{ $ns->post_title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="iq-blog-detail">
                                            <div class="iq-blog-meta">

                                            </div>
                                            <div class="blog-title">
                                                <h5 class="entry-title">
                                                    <a
                                                        href="{{ route('frontend.news-details', urlencode($ns->post_title)) }}">{{ $ns->post_title }}</a>
                                                </h5>
                                            </div>
                                            <div class="blog-content">
                                                <p>{{ str_limit(strip_tags($ns->post_content, 100)) }}
                                                    <a class="button-link"
                                                       href="{{ route('frontend.news-details', $ns->post_title) }}"
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
                            <div id='div-gpt-ad-1684218289058-0' style='min-width: 300px; min-height: 290px;'>
                                <script>
                                    googletag.cmd.push(function() {
                                        googletag.display('div-gpt-ad-1684218289058-0');
                                    });
                                </script>
                            </div>
                        @endif
                    @endforeach

                    {{ $news->links() }}

                    @if (!$isMobile)
                    <!-- /40784803/Rotana_Category_HalfPage_300x600 -->
                        <div id='div-gpt-ad-1685018659124-0'>
                            <script>
                                googletag.cmd.push(function() {
                                    googletag.display('div-gpt-ad-1685018659124-0');
                                });
                            </script>
                        </div>
                    @endif
                </div>

            </div>

        </div>
    </main>

</layouts.frontend>
