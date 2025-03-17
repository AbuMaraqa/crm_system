@livewireScriptConfig

<script>
    livewireScriptConfig.uri = "{{ route('livewire.update') }}";
</script>

@filamentScripts

{{ app('Illuminate\Foundation\Vite')->useBuildDirectory('/front-side/output') }}

@vite('resources/js/front-side/app.js')
{{--@vite('resources/js/front-side/theme-1/main.js')--}}

<script src="{{ asset('frontend-assets/theme-2/js/vendor/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/jquery.min.js')}}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/aos.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/smoothscroll.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/countdownTimer.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/slick.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/jquery-range-ui.min.js') }}"></script>
<script src="{{ asset('frontend-assets/theme-2/js/vendor/tilt.jquery.min.js') }}"></script>

<!-- main-js -->
<script src="{{ asset('frontend-assets/theme-2/js/main.js') }}"></script>


{{--@vite('resources/js/front-side/theme-1/main.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/waypoints/jquery.waypoints.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/parsley/parsley.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/retinajs/retina.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/parallax/parallax.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/parallax/parallaxh.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/owl-carousel/owl.carousel.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/Magnific-Popup/jquery.magnific-popup.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/waypoints/jquery.counterup.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/isotope/packery.pkgd.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/swiper/swiper.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/countdown/jquery.countdown.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/Magnific-Popup/jquery.elevateZoom-3.0.8.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/tweenmax/TweenMax.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/plugins/text-animation/anime.min.js')--}}
{{--@vite('resources/js/front-side/theme-1/scripts.js')--}}
{{--@vite('resources/js/front-side/theme-1/custom.js')--}}


@isset($scripts)
    {{ $scripts }}
@endisset

@stack('scripts')
