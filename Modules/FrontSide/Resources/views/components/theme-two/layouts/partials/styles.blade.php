@livewireStyles
@filamentStyles

{{--<link rel="icon" href="{{ asset('images/favicon/favicon.png') }}" type="image/x-icon">--}}

{{-- <!-- Css All Plugins Files -->
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/remixicon.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/aos.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/swiper-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/slick.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/vendor/jquery-range-ui.css') }}">

<!-- Main Style -->
<link rel="stylesheet" href="{{ asset('frontend-assets/theme-2/css/style.css') }}">
 --}}


@vite('resources/css/front-side/app.css')
<!-- Style-->


@stack('styles')
@stack('preloads')

@isset($styles)
    {{ $styles }}
@endisset
