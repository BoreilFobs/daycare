<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="{{ $siteSettings['site_name'] ?? 'ABC Children Centre Foumbot' }}">
    <meta name="description" content="{{ $siteSettings['site_description'] ?? 'Quality Childcare & Early Education for children aged 3 months to 5 years' }}">
    <!-- ======== Page title ============ -->
    <title>{{ $siteSettings['site_name'] ?? 'ABC Children Centre Foumbot' }} - @yield('title', 'Childcare & Early Education')</title>
    <!--<< Favicon >>-->
    <link rel="shortcut icon" href="{{ asset('img/faveicon.png') }}">
    <!--<< Bootstrap min.css >>-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!--<< All Min Css >>-->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!--<< Animate.css >>-->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!--<< Icomoon.css >>-->
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <!--<< Magnific Popup.css >>-->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--<< MeanMenu.css >>-->
    <link rel="stylesheet" href="{{ asset('css/meanmenu.css') }}">
    <!--<< Swiper Bundle.css >>-->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">
    <!--<< Nice Select.css >>-->
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
    <!--<< Main.css >>-->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <!-- Language Switcher Styles -->
    <style>
        .language-switcher .lang-btn {
            font-size: 14px;
            font-weight: 500;
            color: #666;
            text-decoration: none;
            padding: 5px 8px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        .language-switcher .lang-btn:hover,
        .language-switcher .lang-btn.active {
            color: #ff4880;
            background-color: rgba(255, 72, 128, 0.1);
        }
        .language-switcher .lang-btn.active {
            font-weight: 700;
        }
    </style>
    @stack('styles')
</head>