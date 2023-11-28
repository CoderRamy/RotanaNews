@if (app()->getLocale() == 'ar')
    <a class="navbar-brand"
       href="{{ url()->to(str_replace('/ar', '/en', request()->fullUrl())) }}">
        <span>English (EN)</span>
    </a>
@elseif(app()->getLocale() == 'en')
    <a class="navbar-brand"
       href="{{ url()->to(str_replace('/en', '/ar', request()->fullUrl())) }}">
        <span>العربية (AR) </span>
    </a>
@endif
