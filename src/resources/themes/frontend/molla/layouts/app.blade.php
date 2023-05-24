<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

{{--    @if($title && $seo_settings)--}}
    @if($title)
        <title>{{ $title }} | {{ $seo_settings->title }}</title>
    @endif

    @if(isset($seo_settings->google_verify))
        <meta name="google-site-verification" content="{{ $seo_settings->google_verify }}" />
    @endif

    @if(isset($seo_settings->facebook_verify))
        <meta name="facebook-domain-verification" content="{{ $seo_settings->facebook_verify }}" />
    @endif
    <script>
        WebFontConfig = {
            google: { families: [ 'Poppins:400,500,600,700', 'PlayfairDisplay:400,400italic,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('themes/frontend/molla/assets/js/webfont.js') }}';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    @if(isset($seo_settings->description))
        <meta name="description" content="{{ $seo_settings->description }}">
    @endif
    @if(isset($seo_settings->keywords))
        <meta name="keywords" content="{{ $seo_settings->keywords }}">
    @endif
    <meta name="author" content="betuls">
    <!-- Favicon -->
    {{--    <link rel="apple-touch-icon" sizes="180x180" href="@vite('themes/molla/assets/assets/images/icons/apple-touch-icon.png','molla')">--}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('themes/frontend/molla/assets/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('themes/frontend/molla/assets/images/icons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('themes/frontend/molla/assets/images/icons/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('themes/frontend/molla/assets/images/icons/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('themes/frontend/molla/assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
    <link rel="shortcut icon" href="{{ asset('themes/frontend/molla/assets/images/icons/favicon.ico') }}">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{ asset('themes/frontend/molla/assets/images/icons/browserconfig.xml') }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css') }}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/plugins/owl-carousel/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/plugins/magnific-popup/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/plugins/jquery.countdown.css') }}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/skins/skin-demo-25.css') }}">
    <link rel="stylesheet" href="{{ asset('themes/frontend/molla/assets/css/demos/demo-25.css') }}">
    @livewireStyles

</head>
<body>
<div class="page-wrapper">
    @include('header')
    @yield('content')
    @include('footer')
</div>
<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

@include('mobile-menu')

{{--@include('layouts.auth-modal')--}}
<!-- Plugins JS File -->
<script src="{{asset('themes/frontend/molla/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/jquery.hoverIntent.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/superfish.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/jquery.plugin.min.js')}}"></script>
<script src="{{asset('themes/frontend/molla/assets/js/jquery.magnific-popup.min.js')}}"></script>
@stack('js')
<!-- Main JS File -->
<script src="{{asset('themes/frontend/molla/assets/js/main.js')}}"></script>
@livewireScripts
</body>

</html>
