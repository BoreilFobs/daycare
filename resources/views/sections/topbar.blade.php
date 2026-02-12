<!-- Preloader Start -->
<div id="preloader" class="preloader">
    <span></span>
    <span></span>
    <span class="man-pre">
        <img src="{{ asset('images/sertd-shape.png') }}" alt="img">
    </span>
</div>

<!-- Offcanvas Area Start -->
<div class="fix-area">
    <div class="offcanvas__info">
        <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
                <div class="offcanvas__top mb-4 d-flex justify-content-between align-items-center">
                    <div class="offcanvas__logo">
                        <a href="{{ route('home') }}" class="d-flex align-items-center gap-2">
                            <img src="{{ asset('images/logo.png') }}" alt="logo-img">
                            <span class="logo-text fw-bold">ABC Center</span>
                        </a>
                    </div>
                    <div class="offcanvas__close">
                        <button>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="mobile-menu fix mb-3"></div>
                <div class="offcanvas__contact">
                    <h4>{{ __('site.footer.contact_us') }}</h4>
                    <ul>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">{{ $siteSettings['contact_address'] ?? __('site.contact.address') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}"><span>{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}</span></a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="fal fa-clock"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a target="_blank" href="#">{{ $siteSettings['working_hours'] ?? __('site.info.time') }}</a>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <div class="offcanvas__contact-icon mr-15">
                                <i class="far fa-phone"></i>
                            </div>
                            <div class="offcanvas__contact-text">
                                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+237678165580' }}">{{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}</a>
                            </div>
                        </li>
                    </ul>
                    <div class="header-button mt-4">
                        <a href="{{ route('contact') }}" class="theme-btn p2-bg text-center">
                            <span>
                                {{ __('site.nav.contact') }}
                                <span class="ani-arrow">
                                    <i class="fa-solid fa-arrow-right-long"></i>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div class="social-icon d-flex align-items-center">
                        <a href="{{ $siteSettings['social_facebook'] ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ $siteSettings['social_twitter'] ?? '#' }}"><i class="fab fa-twitter"></i></a>
                        <a href="{{ $siteSettings['social_youtube'] ?? '#' }}"><i class="fab fa-youtube"></i></a>
                        <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="offcanvas__overlay"></div>

<!-- Header Top Section Start -->
<div class="header-top-section d-lg-block d-none">
    <div class="container">
        <div class="header-top-wrapper">
            <ul class="contact-list">
                <li>
                    <i class="fal fa-phone"></i>
                    {{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}
                </li>
                <li>
                    <i class="far fa-envelope"></i>
                    <a href="mailto:{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}" class="link">{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}</a>
                </li>
                <li>
                    <i class="fa-solid fa-location-dot"></i>
                    <a href="#" class="link">{{ $siteSettings['contact_address'] ?? __('site.contact.address') }}</a>
                </li>
            </ul>
            <div class="social-wrapper d-flex align-items-center">
                <a href="{{ $siteSettings['social_facebook'] ?? '#' }}" class="white"><i class="white fab fa-facebook-f"></i></a>
                <a href="{{ $siteSettings['social_twitter'] ?? '#' }}" class="white">
                    <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.55735 5.16157L10.5183 0.65625H9.57971L6.14039 4.56816L3.39341 0.65625H0.225098L4.37906 6.57174L0.225098 11.2963H1.16378L4.79579 7.16516L7.6968 11.2963H10.8651L6.55712 5.16157H6.55735ZM5.2717 6.62386L4.85082 6.03481L1.502 1.34768H2.94375L5.64629 5.13034L6.06717 5.71939L9.58015 10.6363H8.13839L5.2717 6.62409V6.62386Z" fill="white"/>
                    </svg>
                </a>
                <a href="{{ $siteSettings['social_linkedin'] ?? '#' }}" class="white"><i class="white fa-brands fa-linkedin-in"></i></a>
                <a href="{{ $siteSettings['social_pinterest'] ?? '#' }}" class="white"><i class="white fa-brands fa-pinterest-p"></i></a>
            </div>
        </div>
    </div>
</div>

<!-- Header Section Start -->
<header id="header-sticky" class="header-1 white-bg">
    <div class="container">
        <div class="mega-menu-wrapper">
            <div class="header-main style-2">
                <div class="header-left">
                    <div class="logo">
                        <a href="{{ route('home') }}" class="header-logo d-flex align-items-center gap-2">
                            <img src="{{ asset('images/logo.png') }}" alt="logo-img">
                            <span class="logo-text fw-bold">ABC Center</span>
                        </a>
                    </div>
                </div>
                <div class="header-right d-flex justify-content-end align-items-center">
                    <div class="mean__menu-wrapper">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">{{ __('site.nav.home') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                        <a href="{{ route('about') }}">{{ __('site.nav.about') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('services*') ? 'active' : '' }}">
                                        <a href="{{ route('services') }}">{{ __('site.nav.services') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('programs*') ? 'active' : '' }}">
                                        <a href="{{ route('programs') }}">{{ __('site.nav.programs') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                                        <a href="{{ route('gallery') }}">{{ __('site.nav.gallery') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('blog*') ? 'active' : '' }}">
                                        <a href="{{ route('blog') }}">{{ __('site.nav.blog') }}</a>
                                    </li>
                                    <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                        <a href="{{ route('contact') }}">{{ __('site.nav.contact') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Language Switcher -->
                    <div class="language-switcher d-flex align-items-center ms-3">
                        <a href="{{ route('language.switch', 'en') }}" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}" title="English">
                            <span class="fi fi-gb"></span> EN
                        </a>
                        <span class="mx-1 text-muted">|</span>
                        <a href="{{ route('language.switch', 'fr') }}" class="lang-btn {{ app()->getLocale() == 'fr' ? 'active' : '' }}" title="Français">
                            <span class="fi fi-fr"></span> FR
                        </a>
                    </div>
                    <a href="#0" class="search-trigger search-icon ms-2">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </a>
                    <div class="header-button d-sm-block d-none">
                        <a href="{{ route('contact') }}" class="theme-btn p5-bg">
                            <span>
                                {{ __('site.nav.donate') }}
                                <i class="fa-solid fa-heart"></i>
                            </span>
                        </a>
                    </div>
                    <div class="header__hamburger d-xl-none my-auto">
                        <div class="sidebar__toggle">
                            <i class="fas fa-bars"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Search Area Start -->
<div class="search-wrap">
    <div class="search-inner">
        <i class="fas fa-times search-close" id="search-close"></i>
        <div class="search-cell">
            <form method="get" action="{{ route('blog') }}">
                <div class="search-field-holder">
                    <input type="search" name="search" class="main-search-input" placeholder="Search...">
                </div>
            </form>
        </div>
    </div>
</div>