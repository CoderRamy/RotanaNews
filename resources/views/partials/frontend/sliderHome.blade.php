<section id="iq-tvthrillers{{$type}}" class="s-margin">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 overflow-hidden">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="main-title m-1">{{ __('Last ' . $type) }}</h4>
                    <a href="{{ route('frontend.libraryAllVideo', ['locale'=>app()->getLocale(),$type]) }}"
                       class="text-primary iq-view-all">{{ __('view all') }}</a>
                </div>
            </div>
        </div>
        <!-- Swiper -->
        <div class="favourite-slider">
            <div class="swiper pt-2 pt-md-4 pt-lg-4 iq-rtl-direction" data-swiper="common-slider">
                <ul class="swiper-wrapper p-0 m-0">
                    @foreach ($rows as $s)
                        <li class="swiper-slide slide-item">

                            <div class="all-slide">

                                <div class="play">
                                    <img src="{{ asset('website/images/new-img/svg/play.svg') }}" alt="play-store">
                                </div>
                                    <?php $img_src = $s?->image1000x1462?->url ?? 'https://d1rjxhevrfxjk0.cloudfront.net/default/Vod_default.webp'; ?>
                                <picture>
                                    <source srcset="{{resizeImage($img_src,'240')}}" media="(max-width: 374px)" >
                                    <source srcset="{{resizeImage($img_src,'360')}}" media="(min-width: 375px) and (max-width: 767px)">
                                    <source srcset="{{resizeImage($img_src,'320')}}" media="(min-width: 768px)">
                                    <img src="{{$img_src}}" class="img-fluid" alt="{{$s?->title}}" loading="lazy" style="width:auto;">
                                </picture>
                                <div class="all-slide-description ">

                                    <p class="description-p mb-1"> <span
                                            class="mb-1"><strong>{{ $s->title??"" }}</strong></span>
                                        <br>
                                        {{  str_limit($s->desc??"", 1000) }}
                                    </p>
                                    <div class="hover-buttons">
                                        <a class="btn btn-hover"
                                           href="{{ route('frontend.movieDetails', [$s->reference_id, 'type' => $type,'title'=>slug($s->getTranslation('title', 'ar'))]) }}">
                                            <i class="fa fa-play mr-1" aria-hidden="true"></i>


                                            @if ($type != 'Movies')
                                                {{ __('Watch Now') }}
                                            @else
                                                {{ __('Watch Promo') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </li>
                    @endforeach
                </ul>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>
