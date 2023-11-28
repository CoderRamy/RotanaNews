<div id="home-banner-slider" class="iq-main-slider p-0 iq-rtl-direction swiper banner-home-swiper overflow-hidden">
    <div id="carouselExampleCaptions" class="carousel slide " data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($mainSlider as $key => $image)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}"
                    @if ($key == 0) class="active" @endif></li>
            @endforeach
        </ol>
        <div class="carousel-inner">

            @foreach ($mainSlider as $key => $s)

                <div class="carousel-item  @if ($key == 0) active @endif">
                    <img src="{{ $s->slider_poster }}" loading="lazy" class="d-block w-100"
                         alt="{{ $s->title }}">
                    <div class="carousel-bg-hover"></div>
                    <div class="carousel-caption  d-md-block">
                        <div class="col-lg-7 col-md-12 description-slider">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <i class="ri-arrow-left-s-line arrow-icon"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <i class="ri-arrow-right-s-line arrow-icon"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
