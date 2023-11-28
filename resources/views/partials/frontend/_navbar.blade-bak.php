<header id="main-header">
    {{-- <div id="beta" class="beta-version"> <img src="{{ asset('website/images/new-img/ic_Demo.svg') }}" loading="lazy"
            alt="play-store">
        {{ __('version') }}</div> --}}
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0 ">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon" data-toggle="collapse">
                                <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                            </div>
                        </a>
                        <a class="navbar-brand" href="/"> <img class="img-fluid logo"
                                src="https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/logo.png" loading="lazy" alt="streamit"> </a>

                        <div class="navbar-collapse">
                            <div id="menu_area" class="menu-area">
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <nav class="navbar navbar-light navbar-expand-lg mainmenu">

                                            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav mr-auto">


                                                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                                            href="{{ route('frontend.home') }}">{{ __('Home') }}
                                                            <span class="sr-only">(current)</span></a>
                                                    </li>
                                                    <li class="{{ request()->is('about') ? 'active' : '' }}">
                                                        <a href="{{ route('frontend.about') }}">{{ __('About') }}</a>
                                                    </li>



                                                    <li
                                                        class="dropdown {{ request()->is('channels') || request()->is('streams') ? 'active' : '' }}">
                                                        <a style="font-size: 18px" class="dropdown-toggle"
                                                            href="#" id="navbarDropdown1" role="button"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">


                                                            <svg width="15px" height="15px" viewBox="0 0 24 24"
                                                                xmlns="http://www.w3.org/2000/svg" class="noti-svg"
                                                                style="fill: green">
                                                                <path
                                                                    d="M5 9H4a11.007 11.007 0 0 0 11 11v-1A10.016 10.016 0 0 1 5 9zm4 0H8a7.008 7.008 0 0 0 7 7v-1a6.005 6.005 0 0 1-6-6zm15 5.29l-4.5-4.5-1 1-1.29-1.29 2-2-2.71-2.71-2 2-1.29-1.29 1-1L9.71 0h-.42l-2.5 2.5 4.71 4.71 1-1 1.29 1.29-2 2 2.71 2.71 2-2 1.29 1.29-1 1 4.71 4.71 2.5-2.5z" />
                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                            </svg>


                                                            {{ __('Live') }}</a>
                                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                                            aria-labelledby="navbarDropdown">
                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.channels') }}">{{ __('Live Stream') }}</a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.streams') }}">{{ __('TV Guide') }}</a>
                                                            </li>
                                                        </ul>
                                                    </li>


                                                    <li
                                                        class="dropdown {{ request()->is('news-list') ? 'active' : '' }}">

                                                        <a class="dropdown-toggle" href="#" id="navbarDropdown"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false"> {{ __('News') }}</a>
                                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                                            aria-labelledby="navbarDropdown">
                                                            @foreach (App\Models\Category::whereNull('parent_id')->where('id', '!=', '108')->get() as $category)
                                                                <li class="dropdown after-new">
                                                                    <a class="dropdown-toggle"
                                                                        onclick="location.href='{{ route('frontend.newsList', ['category' => $category->id]) }}';"
                                                                        id="navbarDropdown{{ $loop->index + 5 }}"
                                                                        role="button">{{ $category->name }}</a>
                                                                    {{-- @if (!empty($category->children))
                                                                    <ul class="dropdown-menu sub-menu"
                                                                        aria-labelledby="navbarDropdown">
                                                                        @foreach ($category->children as $childern)
                                                                            <li>
                                                                                <a
                                                                                    href="{{ route('frontend.newsList', ['category' => $childern->id,'title'=>$childern->getTranslation('name','ar')]) }}">{{ $childern->name }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif --}}

                                                                </li>
                                                            @endforeach
                                                            <li
                                                                class="dropdown after-new {{ request()->is('sport-news') ? 'active' : '' }}">
                                                                <a
                                                                    href="{{ route('frontend.sport-news') }}">{{ __('Sports') }}</a>
                                                            </li>
                                                        </ul>
                                                    </li>


                                                    <li
                                                        class="dropdown {{ Str::contains(request()->path(), 'library-all-video') ? 'active' : '' }} ">
                                                        <a class="dropdown-toggle" href="#" id="navbarDropdown2"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">{{ __('Library') }}</a>
                                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                                            aria-labelledby="navbarDropdown">

                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.libraryAllVideo', 'Movies') }}">{{ __('Movies') }}</a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.libraryAllVideo', 'Series') }}">{{ __('Series') }}</a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.libraryAllVideo', 'Programs') }}">{{ __('Programs') }}</a>
                                                            </li>
                                                            {{-- <li>
                                                                <a
                                                                    href="{{ route('frontend.libraryAllVideo', 'Plays') }}">{{ __('Plays') }}</a>
                                                            </li> --}}
                                                        </ul>

                                                    </li>
                                                    {{-- Postboned for now  --}}
                                                    <li
                                                        class="{{ Str::contains(request()->path(), 'guide') ? 'active' : '' }}">
                                                        <a class="dropdown-toggle" href="#" id="navbarDropdown3"
                                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">{{ __('Guide') }}</a>
                                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                                            aria-labelledby="navbarDropdown">

                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.guideWork') }}">{{ __('Work Guide') }}</a>
                                                            </li>
                                                            <li>
                                                                <a
                                                                    href="{{ route('frontend.guidePerson') }}">{{ __('Person Guide') }}</a>
                                                            </li>
                                                        </ul>
                                                    </li>


                                                    <li>

                                                    <li class="language-img">
                                                        <?php
                                                        if (session()->get('locale') != null) {
                                                            $lang = app()->getLocale();
                                                        } else {
                                                            $lang = env('DEFAULT_LANGUAGE', 'ar');
                                                        }
                                                        ?>
                                                        @if (app()->getLocale() == 'ar')
                                                            <a class="navbar-brand "
                                                                href="{{ url()->to(str_replace('/ar', '/en', request()->fullUrl())) }}">
                                                                {{--                                                            <a class="navbar-brand " href="javascript:changeLang('en')"> --}}
                                                                <span>English </span>
                                                                <img class="img-fluid logo"
                                                                    src="{{ asset('images/new-img/eng-flag.webp') }}"
                                                                    loading="lazy" alt="streamit">
                                                            </a>
                                                        @elseif(app()->getLocale() == 'en')
                                                            <a class="navbar-brand " {{--                                                                href="javascript:changeLang('ar')"> --}}
                                                                href="{{ url()->to(str_replace('/en', '/ar', request()->fullUrl())) }}">
                                                                <span>العربية </span>
                                                                <img class="img-fluid logo"
                                                                    src="{{ asset('images/new-img/saudi-arabia.svg') }}"
                                                                    loading="lazy" alt="streamit">
                                                            </a>
                                                        @endif

                                                    </li>

                                                    <!-- <li class="language-img">
                                                        <a class="navbar-brand " href="">
                                                        <span>العربية   </span>
                                                             <img class="img-fluid logo" src="{{ asset('images/new-img/saudi-arabia.svg') }}" loading="lazy" alt="streamit" >
                                                         </a>
                                                    </li> -->


                                                    {{--                                                    </li> -                                    </div>
-}}
                                                </ul>
                                            </div>
                                        </nav>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-right menu-right">
                            <ul class="d-flex align-items-center list-inline m-0">
                                {{-- <li class="nav-item nav-icon">
                                    <a href="#" class="search-toggle device-search">
                                        <i class="ri-search-line"></i>
                                    </a>
                                    <div class="search-box iq-search-bar d-search">
                                        <form action="{{ route('frontend.vodList') }}" method="get"
                                            class="searchbox">
                                            <div class="form-group position-relative">
                                                <input type="text" class="text search-input font-size-12"
                                                    placeholder="{{ __('type here to search...') }}" name="name">
                                                <i class="search-link ri-search-line"></i>
                                            </div>
                                        </form>
                                    </div>
                                </li> --}}
                                                    <li class="nav-item nav-icon">
                                                        <a href="#" class="search-toggle"
                                                            data-toggle="search-toggle" aria-label="search">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" width="22" height="22"
                                                                class="noti-svg">
                                                                <path fill="none" d="M0 0h24v24H0z" />
                                                                <path
                                                                    d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z" />
                                                            </svg>
                                                            <span class="bg-danger dots"></span>
                                                        </a>

                                                    </li>
                                                    <li class="nav-item nav-icon">
                                                        <a href="#"
                                                            class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                                            data-toggle="search-toggle">
                                                            <img src="{{ asset('website/images/new-img/user.webp') }}"
                                                                class="img-fluid avatar-40 rounded-circle"
                                                                alt="user" loading="lazy">
                                                        </a>
                                                        </li>

                                                        {{-- <div class="iq-sub-dropdown iq-user-dropdown">
                                        <div class="iq-card shadow-none m-0">
                                            <div class="iq-card-body p-0 pl-3 pr-3">
                                                <a href="#" class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="ri-file-user-line text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">{{__("Manage Profile")}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="ri-settings-4-line text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">{{__("Settings")}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="ri-settings-4-line text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">Pricing Plan</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#" class="iq-sub-card setting-dropdown">
                                                    <div class="media align-items-center">
                                                        <div class="right-icon">
                                                            <i class="ri-logout-circle-line text-primary"></i>
                                                        </div>
                                                        <div class="media-body ml-3">
                                                            <h6 class="my-0 ">{{__("Logout")}}</h6>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div> --}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{--    <!-- Google tag (gtag.js) --> --}}
                        {{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3236R0PY39"></script> --}}
                        {{--    <script> --}}
                        {{--        window.dataLayer = window.dataLayer || []; --}}

                        {{--        function gtag() { --}}
                        {{--            dataLayer.push(arguments); --}}
                        {{--        } --}}
                        {{--        gtag('js', new Date()); --}}

                        {{--        gtag('config', 'G-3236R0PY39'); --}}
                        {{--    </script> --}}

                        {{--    <!-- Google tag (gtag.js) --> --}}
                        {{--    <script async src="https://www.googletagmanager.com/gtag/js?id=G-VVDPMVKYVT"></script> --}}
                        {{--    <script> --}}
                        {{--        window.dataLayer = window.dataLayer || []; --}}

                        {{--        function gtag() { --}}
                        {{--            dataLayer.push(arguments); --}}
                        {{--        } --}}
                        {{--        gtag('js', new Date()); --}}

                        {{--        gtag('config', 'G-VVDPMVKYVT'); --}}
                        {{--    </script> --}}


</header>
