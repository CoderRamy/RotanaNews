<div class="widget-area">

    <div class="iq-widget-menu widget">


        <h5 class="widget-title">{{__('Last News')}}</h5>


        <div class="list-inline iq-widget-menu">
            <ul class="iq-post">
                @foreach($last_news as $r)
                    <li>
                        <div class="post-img">
                            <div class="post-img-holder">
                                <a href="{{route('frontend.newsDetails',[$r->id,'title'=>$r->getTranslation('title','ar')])}}"
                                   style="background-image: url('{{$r->image?:(isset($r->images)&&isset($r->images[0])&&isset($r->images[0]['imageUrl'])?$r->images[0]['imageUrl']:'https://d1rjxhevrfxjk0.cloudfront.net/images/news_default.webp')}}'), url('https://d1rjxhevrfxjk0.cloudfront.net/images/news_default.webp');border-radius: 5px;
                                   border: solid 1px green "></a>
                            </div>
                            <div class="post-blog">
                                <div class="blog-box">
                                    <ul class="list-inline">
                                        <li class="list-inline-item  mr-3 border-0">
                                            <a class="date-widget"
                                               href="{{route('frontend.newsDetails',[$r->id,'title'=>$r->getTranslation('title','ar')])}}"><i
                                                    class="fa fa-calendar mr-2"
                                                    aria-hidden="true"></i>{{\Carbon\Carbon::parse($r->created_at)->translatedFormat('D,d M')}}
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="new-link"
                                       href="{{route('frontend.newsDetails',[$r->id,'title'=>$r->getTranslation('title','ar')])}}">
                                        <h6>{{$r->title}}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>

                @endforeach
            </ul>
            @if(env('ads',true))

                <!-- /40784803/Rotana_Category_MPU -->
                <div id='div-gpt-ad-1685018585281-0' style="max-width: 336px; max-height: 280px">
                    <script>
                        googletag.cmd.push(function () {
                            googletag.display('div-gpt-ad-1685018585281-0');
                        });
                    </script>
                </div>
            @endif
        </div>

    </div>

</div>

