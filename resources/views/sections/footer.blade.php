<!--<< Footer Section Start >>-->
<footer class="footer-section overflow-hidden position-relative footer-style2 p1-bg">
    <div class="footer-widgets-wrapper">
        <div class="container">
            <div class="row g-md-4 g-4 justify-content-between">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".3s">
                    <div class="single-footer-widget">
                        <div class="widget-heads">
                            <a href="{{ route('home') }}" class="footer-logo d-flex align-items-center gap-2">
                                <img src="{{ asset('images/logo.png') }}" alt="logo-img">
                                <span class="logo-text fw-bold white">ABC Center</span>
                            </a>
                        </div>
                        <div class="footer-content">
                            <p class="pre-pragraph">
                                {{ __('site.footer.description') }}
                            </p>
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
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="white">{{ __('site.footer.pages') }}</h4>
                        </div>
                        <ul class="list-area">
                            <li>
                                <a href="{{ route('about') }}">
                                    {{ __('site.nav.about') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services') }}">
                                    {{ __('site.nav.services') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('blog') }}">
                                    {{ __('site.nav.blog') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('team') }}">
                                    {{ __('site.nav.team') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('contact') }}">
                                    {{ __('site.nav.contact') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".5s">
                    <div class="single-footer-widget">
                        <div class="widget-head">
                            <h4 class="white">{{ __('site.footer.contact_us') }}</h4>
                        </div>
                        <ul class="list-area list-contact">
                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                <span class="lited">
                                    {{ $siteSettings['contact_address'] ?? __('site.contact.address') }}
                                </span>
                            </li>
                            <li>
                                <i class="far fa-envelope"></i>
                                <a href="mailto:{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}" class="link">{{ $siteSettings['contact_email'] ?? 'abccentre4kids@gmail.com' }}</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:{{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}" class="link">{{ $siteSettings['contact_phone'] ?? '+237 678 165 580' }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".7s">
                    <div class="single-footer-widget single-footer-form">
                        <div class="widget-head">
                            <h4 class="white">{{ __('site.footer.newsletter') }}</h4>
                        </div>
                        <p class="white">
                            {{ __('site.footer.newsletter_text') }}
                        </p>
                        <form action="{{ route('contact') }}" method="GET" class="footer-form">
                            <input type="text" name="email" placeholder="{{ __('site.footer.email_placeholder') }}">
                            <button type="submit">
                                <i class="fa-solid fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-wrapper d-md-flex d-grid gap-md-0 gap-2 align-items-center justify-content-md-between justify-content-center text-md-start text-center">
                <p class="wow fadeInLeft color-2" data-wow-delay=".3s">
                    &copy; {{ $siteSettings['site_name'] ?? 'ABC Children Centre' }} {{ date('Y') }} | {{ __('site.footer.rights') }}
                </p>
                <ul class="footer-menu wow fadeInRight" data-wow-delay=".5s">
                    <li>
                        <a href="{{ route('about') }}">
                            {{ __('site.footer.terms') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">
                            {{ __('site.footer.privacy') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">
                            {{ __('site.nav.contact') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <a href="#" id="scrollUp" class="scroll-icon">
            <i class="far fa-arrow-up"></i>
        </a>
    </div>
    <!-- Element -->
    <img src="{{ asset('img/footer/f-apple.png') }}" alt="img" class="footer-apple position-absolute">
    <img src="{{ asset('img/footer/f-cut.png') }}" alt="img" class="footer-cut position-absolute">
    <!-- Element -->
</footer>
