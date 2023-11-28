<!-- Header -->
<header id="main-header">
    <div class="main-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <a href="#" class="navbar-toggler c-toggler" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation">
                            <div class="navbar-toggler-icon" data-toggle="collapse">
                                <span class="navbar-menu-icon navbar-menu-icon--top"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--middle"></span>
                                <span class="navbar-menu-icon navbar-menu-icon--bottom"></span>
                            </div>
                        </a>
                        <a class="navbar-brand" href="{{ route('frontend.home') }}"> <img class="img-fluid logo"
                                                                                          src="https://d1rjxhevrfxjk0.cloudfront.net/images/new-img/logo.png"
                                                                                          loading="lazy" alt="streamit">
                        </a>

                        <div class="mobile-more-menu">
                            <a href="#" class="more-toggle" id="dropdownMenuButton" role="button"
                               data-toggle="more-toggle" aria-haspopup="true" aria-expanded="false">
                                <i class="ri-more-line"></i>
                            </a>
                            <div class="more-menu" aria-labelledby="dropdownMenuButton">
                                <div class="navbar-right position-relative">
                                    <ul class="d-flex align-items-center justify-content-end list-inline m-0">
                                        <li class="nav-item nav-icon language-img">
                                              @include('partials.frontend._navbar_flag')
                                        </li>
                                        <li class="nav-item nav-icon subscribe">
                                            <button type="submit"
                                                    class="btn btn-primary">{{ __('subscribe_now') }}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <div class="menu-main-menu-container">
                                <ul id="top-menu" class="navbar-nav ml-auto">
                                    <li class="{{ request()->is('/') ? 'active' : '' }}"><a
                                                href="{{ route('frontend.home') }}">{{ __('Home') }}
                                            <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="{{ request()->is('about') ? 'active' : '' }}">
                                        <a href="{{ route('frontend.about') }}">{{ __('About') }}</a>
                                    </li>
                                    <li
                                            class="dropdown {{ request()->is('channels') || request()->is('streams') ? 'active' : '' }}">
                                        <a style="font-size: 18px" class="dropdown-toggle" href="#"
                                           id="navbarDropdown1" role="button" data-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">


                                            <svg width="15px" height="15px" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg" class="noti-svg"
                                                 style="fill: green">
                                                <path
                                                        d="M5 9H4a11.007 11.007 0 0 0 11 11v-1A10.016 10.016 0 0 1 5 9zm4 0H8a7.008 7.008 0 0 0 7 7v-1a6.005 6.005 0 0 1-6-6zm15 5.29l-4.5-4.5-1 1-1.29-1.29 2-2-2.71-2.71-2 2-1.29-1.29 1-1L9.71 0h-.42l-2.5 2.5 4.71 4.71 1-1 1.29 1.29-2 2 2.71 2.71 2-2 1.29 1.29-1 1 4.71 4.71 2.5-2.5z"/>
                                                <path fill="none" d="M0 0h24v24H0z"/>
                                            </svg>


                                            {{ __('Live') }}</a>
                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                            aria-labelledby="navbarDropdown">
                                            <li>
                                                <a
                                                        id="navbar-channel-list"
                                                        href="{{ route('frontend.channels') }}">{{ __('Live Stream') }}</a>
                                            </li>
                                            <li>
                                                <a id="navbar-epg-list" href="{{ route('frontend.streams') }}">{{ __('TV Guide') }}</a>
                                            </li>
                                            <li>
                                                <a target="_blank"
                                                   href="https://player.elshasha.net/">{{ __('Elshasha') }}</a>
                                            </li>
                                            <li>
                                                <a id="navbar-epg-list2"
                                                   href="https://rotanametatheater.com/"
                                                   target="_blank">{{ __('Meta Theater') }}</a>

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown {{ request()->is('news-list') ? 'active' : '' }}">

                                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('News') }}</a>
                                        <ul class="sub-nav-new dropdown-menu sub-menu"
                                            aria-labelledby="navbarDropdown">
                                            @foreach (App\Models\Category::whereNull('parent_id')->get() as $category)
                                                <li class="dropdown after-new">
                                                    <a class="dropdown-toggle"
                                                       onclick="location.href='{{ route('frontend.newsList', ['category' => $category->id,'slug'=>slug($category->getTranslation('name','ar'))]) }}';"
                                                       id="navbarDropdown{{ $loop->index + 5 }}"
                                                       role="button">{{ $category->name }}</a>
                                                    {{-- @if (!empty($category->children))
                                         <ul class="dropdown-menu sub-menu"
                                             aria-labelledby="navbarDropdown">
                                             @foreach ($category->children as $childern)
                                                 <li>
                                                     <a
                                                         href="{{ route('frontend.newsList', ['category' => $childern->id]) }}">{{ $childern->name }}</a>
                                                 </li>
                                             @endforeach
                                         </ul>
                                     @endif --}}

                                                </li>
                                            @endforeach
{{--                                                                                        <li--}}
{{--                                                                                            class="dropdown after-new {{ request()->is('sport-news') ? 'active' : '' }}">--}}
{{--                                                                                            <a--}}
{{--                                                                                                href="{{ route('frontend.sport-news') }}">{{ __('Sports') }}</a>--}}
{{--                                                                                        </li>--}}
                                        </ul>
                                    </li>
                                    <li class="dropdown {{ Str::contains(request()->path(), 'library-all-video') ? 'active' : '' }} ">
                                        <a class="dropdown-toggle" href="#" id="navbarDropdown2" role="button"
                                           data-toggle="dropdown" aria-haspopup="true"
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
                                    {{-- <li class="{{ Str::contains(request()->path(), 'guide') ? 'active' : '' }}">
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
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="navbar-right menu-right">

                            <div class="d-flex align-items-center list-inline m-0">


                                <ul>
                                    <li class="nav-item nav-icon language-img">
                                            @include('partials.frontend._navbar_flag')
                                     </li>

                                    {{-- <li class="nav-item nav-icon subscribe">
                                        <button type="submit" class="btn btn-primary">

                                         <strong> {{ __('subscribe_now') }}</strong>

                                        </button>
                                    </li> --}}


                                    @if(Auth::check())
                                        <li class="nav-item nav-icon">
                                            <a href="#" class="search-toggle" data-toggle="search-toggle"
                                               aria-label="search">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                     width="22" height="22" class="noti-svg">
                                                    <path fill="none" d="M0 0h24v24H0z"/>
                                                    <path
                                                            d="M18 10a6 6 0 1 0-12 0v8h12v-8zm2 8.667l.4.533a.5.5 0 0 1-.4.8H4a.5.5 0 0 1-.4-.8l.4-.533V10a8 8 0 1 1 16 0v8.667zM9.5 21h5a2.5 2.5 0 1 1-5 0z"/>
                                                </svg>
                                                <span class="bg-danger dots"></span>
                                            </a>

                                        </li>
                                        <li class="nav-item nav-icon">
                                            <a href="#"
                                               class="iq-user-dropdown search-toggle p-0 d-flex align-items-center"
                                               data-toggle="search-toggle">
                                                <img src="{{ Auth::user()->profile_img ?? asset('website/images/new-img/user.webp') }}"
                                                     class="img-fluid avatar-40 rounded-circle" alt="user"
                                                     loading="lazy">
                                            </a>


                                            <ul class="sub-nav-new dropdown-menu sub-menu"
                                                aria-labelledby="navbarDropdown">
                                                <li>
                                                    <a
                                                            id="navbar-channel-list1"
                                                            href="{{ route('getPlaylists') }}">{{ __('My Playlists') }}</a>
                                                </li>
                                                <li>
                                                    <a id="navbar-channel-list2"
                                                       href="{{ route('getMyProfile') }}">{{ __('My Profile') }}</a>
                                                </li>
                                                <li>
                                                    <a id="navbar-channel-list3"
                                                       href="{{ route('getLogout') }}">{{ __('Log out') }}</a>
                                                </li>
                                            </ul>

                                        </li>
                                    @else
                                        {{--                                        <li class="nav-item nav-icon">--}}
                                        {{--                                            <a href="#"--}}
                                        {{--                                               class="p-0 d-flex align-items-center">--}}
                                        {{--                                                {{__("Login")}}--}}
                                        {{--                                            </a>--}}
                                        {{--                                            <a href="{{route('getLogin')}}"--}}
                                        {{--                                               class="p-0 d-flex align-items-center">--}}
                                        {{--                                                {{__("Login")}}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</header>
<script>
    const dt = new Date();
    const userTimeZoneDifference = dt.getTimezoneOffset()
    document.getElementById("navbar-channel-list").href = "{{route('frontend.channels')}}" + `?tz=${userTimeZoneDifference}`;
    document.getElementById("navbar-epg-list").href = "{{route('frontend.streams')}}" + `?tz=${userTimeZoneDifference}`;
    console.log('das', userTimeZoneDifference)
</script>
<!-- Header End -->
