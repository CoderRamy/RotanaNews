<!-- Slider Start -->
<div class="banner-container iq-rtl-direction">
    <div class="movie-banner tvshows-slider">
        <div class="swiper-banner-container " data-swiper="banner-detail-slider">
            <div class="swiper-wrapper">
                @foreach ($mainSlider as $s)
                    <div class="swiper-slide show-video-banner-1 swiper-bg"
                         style="background: url({{ $s['slider_poster'] }}); background-position: center; background-size: cover;">
                        <div class="shows-content h-100">
                            <div class="row align-items-center h-100">
                                <div class="col-lg-7 col-md-12">
                                    <div class="flex-wrap align-items-center fadeInLeft animated mb-3"
                                         data-animation-in="fadeInLeft" style="opacity: 1;">
                                        <p class="movie-banner-text" data-animation-in="fadeInUp" data-delay-in="1.2">
                                            {!!  $s->desc !!}
                                        </p>
                                    </div>
                                    @if (isset($s->cast))
                                            <?php
                                            $actor = 0;
                                            $producer = 0;
                                            $director = 0;
                                            ?>
                                        <div class="trending-list trending-list pb-3 pt-3" data-wp_object-in="fadeInUp"
                                             data-delay-in="1.2">
                                            @foreach ($s->cast as $cast)
                                                @if($cast->type?->getTranslation('name','en') == "Actor" && $actor<=6)
                                                    @if($actor==0)
                                                        <div class="text-primary title starring"> {{ __('Actors') }}:
                                                            @endif
                                                            <span class="text-body">
                                                            <a href="{{ route('frontend.actorDetails', [$cast->id,'name'=>slug($cast->getTranslation('name','ar'))]) }}">
                                                                {{$cast->name}}
                                                                </a>,
                                                            </span>
                                                            @if($actor==0)
                                                        </div>
                                                    @endif
                                                        <?php
                                                        $actor++;
                                                        ?>
                                                @endif
                                            @endforeach
                                            @foreach ($s->producers as $cast)
                                                @if($producer<=1)
                                                    @if($producer==0)
                                                        <div class="text-primary title genres"> {{ __('producer') }}:
                                                            @endif
                                                            <span class="text-body">
                                                            <a href="{{ route('frontend.actorDetails', [$cast->id,'name'=>slug($cast->getTranslation('name','ar'))]) }}">
                                                                {{$cast->name}}
                                                                </a>,
                                                            </span>
                                                            @if($producer==0)
                                                        </div>
                                                    @endif
                                                        <?php
                                                        $producer++;
                                                        ?>
                                                @endif
                                            @endforeach
                                            @foreach ($s->directors as $cast)
                                                @if($director<=1)
                                                    @if($director==0)
                                                        <div class="text-primary title tag"> {{ __('director') }}:
                                                            @endif
                                                            <span class="text-body">
                                                            <a href="{{ route('frontend.actorDetails', [$cast->id,'name'=>slug($cast->getTranslation('name','ar'))]) }}">
                                                                {{$cast->name}}
                                                                </a>,
                                                            </span>
                                                            @if($director==0)
                                                        </div>
                                                    @endif
                                                        <?php
                                                            $director++;
                                                        ?>
                                                @endif
                                            @endforeach

                                            {{--                                            @if (isset($s['cast']['director']))--}}
                                            {{--                                                <div class="text-primary title tag">--}}
                                            {{--                                                    {{ __('director') }}:--}}
                                            {{--                                                    @foreach (collect($s['cast']['director'])->take(1) as $a)--}}
                                            {{--                                                        <span class="text-body"> <a--}}
                                            {{--                                                                href="{{ route('frontend.actorDetails', $a['id']) }}">--}}
                                            {{--                                                                @if (app()->getLocale() == 'ar' && isset($a['name']))--}}
                                            {{--                                                                    {{ $a['name'] }}--}}
                                            {{--                                                                @elseif(isset($a['name_en']))--}}
                                            {{--                                                                    {{ $a['name_en'] }}--}}
                                            {{--                                                                @else--}}
                                            {{--                                                                    {{ '' }}--}}
                                            {{--                                                                @endif--}}
                                            {{--                                                            </a>--}}
                                            {{--                                                        </span>--}}
                                            {{--                                                    @endforeach--}}
                                            {{--                                                </div>--}}
                                            {{--                                            @endif--}}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-banner-button-next ">
                <i class="ri-arrow-left-s-line arrow-icon"></i>
            </div>
            <div class="swiper-banner-button-prev">
                <i class="ri-arrow-right-s-line arrow-icon"></i>
            </div>
        </div>
    </div>
</div>
<!-- Slider End -->
