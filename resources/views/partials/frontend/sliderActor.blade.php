<ul class="row list-inline  {{app()->getLocale()=='en'?'mb-0 iq-rtl-direction':''}} new-slid-itme">
    @foreach ($records as $record)
        <li class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2 mb-4">
            <div class="new-movies-style">


                <div class="play">
                    <img src="{{ asset('website/images/new-img/svg/play.svg') }}" alt="play-store">
                </div>


                    <?php $img_src = $record->image1000X1462->url ?? 'https://d1rjxhevrfxjk0.cloudfront.net/default/Vod_default.webp'; ?>
                <picture>
                    <source srcset="{{ resizeImage($img_src, '315') }} 315w" media="(max-width: 767px)"/>
                    <source srcset="{{ resizeImage($img_src, '285') }} 285w" media="(min-width: 768px)"/>
                    <img src="{{ $img_src }}" class="img-fluid" alt="" loading="lazy"/>


                </picture>
                <div class="new-movies-style-description">
                    <p class="description-p mb-1"> <span class="mb-1"><strong>{{ $record->title ?? '' }}
                            </strong></span>
                        <br>
                        {{ str_limit($record->desc, 1000) ?? 'N/A' }}
                    </p>
                    <a class="btn btn-hover"
                       href="{{route('frontend.movieDetails', ['locale' => App::getLocale(),'title'=>slug($record->getTranslation('title','ar')) , 'id' => $record->id ] )}}"></i>
                        @if ($record->type != 'Movie')
                            {{ __('Watch Now') }}
                        @else
                            {{ __('Watch Promo') }}
                        @endif

                    </a>
                </div>
            </div>
            <input type="hidden" class="rowid" value="{{ $record->id }}">
        </li>
    @endforeach
</ul>
