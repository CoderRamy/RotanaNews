@if (!empty($random_movies) && !empty($type))
    <section class="">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 overflow-hidden">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="main-title">{{ $type }}</h4>
                    </div>
                </div>
            </div>
            <!-- Swiper -->
            <div class="favourite-slider">
                <div class="swiper pt-2 pt-md-4 pt-lg-4 " data-swiper="common-slider">
                    <ul class="swiper-wrapper m-0 p-0">
                        @foreach ($random_movies as $m)
                            <li class="swiper-slide slide-item">
                                <div class="block-images position-relative ">
                                    <div class="img-box">
                                        <img src="{{ $m[\Illuminate\Support\Str::snake('image1000X1462')] ? $m[\Illuminate\Support\Str::snake('image1000X1462')]['url'] : 'https://d1rjxhevrfxjk0.cloudfront.net/default/Vod_default.webp' }}"
                                             class="img-fluid"
                                             alt="{{app()->getLocale() == 'ar' ? $m['title_ar'] : $m['title_en']}}"
                                             loading="lazy">
                                    </div>
                                    <a class="block-description">
                                        <a href="{{ route('frontend.movieDetails', $m['id']) }}">
                                            <h6 class="iq-title">{{ app()->getLocale() == 'ar' ? $m['title_ar'] : $m['title_en'] }}
                                            </h6>
                                        </a>
                                        <div class="movie-time d-flex align-items-center my-2">
                                            <span class="text-white">{{ @$m['human_time'] }}</span>
                                        </div>
                                        <div class="hover-buttons">
                                            <button type="button" class="btn btn-hover" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                <i class="fa fa-play mr-1" aria-hidden="true"></i>
                                                {{ __('Watch Now') }}
                                            </button>
                                        </div>
                                </div>
                                <div class="block-social-info">
                                    <ul class="list-inline p-0 m-0 music-play-lists">
                                        @include('partials.frontend._share')

                                    </ul>
                                </div>
                </div>
                </li>
                @endforeach
                </ul>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        </div>
    </section>
@endif
