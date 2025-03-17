@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp
    <!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ Localization::getCurrentLocaleDirection() }}">
    <head>
        <!-- Required meta tags -->
        <x-frontside::theme-one.layouts.partials.meta />

        <!-- Favicon -->
        {!! $favIcons !!}

        <!-- Styles -->
        <x-frontside::theme-one.layouts.partials.styles />

        <!-- Title -->
        @isset($pageTitle)
            <title>{{ $pageTitle }}</title>
        @endisset
    </head>

    <body>
        <!-- Preloader -->
        <div class="preLoader">
            <div class="preloder-inner">
                <div class="sk-cube-grid">
                    <div class="sk-cube sk-cube1"></div>
                    <div class="sk-cube sk-cube2"></div>
                    <div class="sk-cube sk-cube3"></div>
                    <div class="sk-cube sk-cube4"></div>
                    <div class="sk-cube sk-cube5"></div>
                    <div class="sk-cube sk-cube6"></div>
                    <div class="sk-cube sk-cube7"></div>
                    <div class="sk-cube sk-cube8"></div>
                    <div class="sk-cube sk-cube9"></div>
                </div>
            </div>
        </div>
        <!-- End Of Preloader -->

        <!-- Start header section -->
        <x-frontside::theme-one.layouts.partials.header />
        <!-- End header section -->

        <!-- Start main section -->
        <main>
            {{ $slot }}
        </main>
        <!-- End main section -->

        <!-- Start Footer section -->
        <x-frontside::theme-one.layouts.partials.footer />
        <!-- End Footer section -->

        <!-- back to top -->
        <div class="back-to-top">
            <a href="#">
                <div class="back-toop-tooltip">
                    <span>
                        {{ __('Back to top') }}
                    </span>
                </div>
                <div class="top-array"></div>
                <div class="top-line"></div>
            </a>
        </div>
        <!-- back to top -->

        <!-- Scripts -->
        <x-frontside::theme-one.layouts.partials.scripts />
        <!-- End Scripts -->
    </body>
</html>
