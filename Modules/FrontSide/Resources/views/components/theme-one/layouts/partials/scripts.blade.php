@livewireScriptConfig

<script>
    livewireScriptConfig.uri = "{{ route('livewire.update') }}";
</script>

@filamentScripts

{{ app('Illuminate\Foundation\Vite')->useBuildDirectory('/front-side/output') }}

@vite('resources/js/front-side/app.js')
{{--@vite('resources/js/front-side/theme-1/main.js')--}}


<!-- JS Files -->
<!-- ==== JQuery 3.3.1 js file==== -->
<script src="{{ asset('frontend-assets/theme-1/js/jquery-3.3.1.min.js') }}"></script>

<!-- ==== Bootstrap js file==== -->
<script src="{{ asset('frontend-assets/theme-1/js/bootstrap.bundle.min.js') }}"></script>

<!-- ==== JQuery Waypoint js file==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/waypoints/jquery.waypoints.min.js') }}"></script>

<!-- ==== Parsley js file==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/parsley/parsley.min.js') }}"></script>

<!-- ==== Ratina js file==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/retinajs/retina.min.js') }}"></script>

<!--===parallax js file===-->
<script src="{{ asset('frontend-assets/theme-1/plugins/parallax/parallax.js') }}"></script>

<!--=== hori parallax js file===-->
<script src="{{ asset('frontend-assets/theme-1/plugins/parallax/parallaxh.min.js') }}"></script>

<!-- ==== Owl Carousel js file==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/owl-carousel/owl.carousel.min.js') }}"></script>

<!-- ====Magnific-Popup js file==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>

<!-- ====Counter js file=== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/waypoints/jquery.counterup.min.js') }}"></script>

<!-- ====packery==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/isotope/packery.pkgd.min.js') }}"></script>

<!-- ====swiper==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/swiper/swiper.min.js') }}"></script>

<!-- ====Count down js==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/countdown/jquery.countdown.min.js') }}"></script>

<!-- ====zoom js==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/Magnific-Popup/jquery.elevateZoom-3.0.8.min.js') }}"></script>

<!-- ====tweenMax==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/tweenmax/TweenMax.min.js') }}"></script>

<!-- ====text animation==== -->
<script src="{{ asset('frontend-assets/theme-1/plugins/text-animation/anime.min.js') }}"></script>

<!-- ====google map api key====-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2D8wrWMY3XZnuHO6C31uq90JiuaFzGws"></script>

<!-- ==== Script js file==== -->
<script src="{{ asset('frontend-assets/theme-1/js/scripts.js') }}"></script>

<!-- ==== Custom js file==== -->
<script src="{{ asset('frontend-assets/theme-1/js/custom.js') }}"></script>

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
