
<!-- main header -->
<header class="header">
    <div class="main-header-wraper main-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6 col-sm-6 col-md-3 col-lg-2 col-xl-3">
                    <div class="logo-container">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="{{ route('frontside.homepage') }}">
                                <img class='default-logo max-w-85px p-2' src="{{ $logoUrl }}" data-rjs="2"
                                     alt="{{ config('app.name') }}">
                                <img class='sticky-logo max-w-85px p-2' src="{{ $logoUrl }}" data-rjs="2"
                                     alt="{{ config('app.name') }}">
                            </a>
                        </div>
                        <!-- End of Logo -->
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-7 col-xl-6">
                    <!-- menu container -->
                    <div class="menu-container">
                        <div class="menu-wraper">
                            <nav>
                                <!-- Header-menu -->
                                <div class="header-menu dosis">
                                    <div id="menu-button">
                                    </div>
                                    <ul>
                                        <li class="{{ request()->routeIs('frontside.homepage') ? 'active' : '' }}">
                                            <a href="{{ route('frontside.homepage') }}">
                                                {{ __('Home Page') }}
                                            </a>
                                        </li>

                                        <li class="{{ request()->routeIs('frontside.shop') ? 'active' : '' }}">
                                            <a href="{{ route('frontside.shop') }}">
                                                {{ __('Shop') }}
                                            </a>
                                        </li>

                                        <li class="{{ request()->routeIs('frontside.categories') ? 'active' : '' }}">
                                            <a href="{{ route('frontside.categories') }}">
                                                {{ __('Categories') }}
                                            </a>
                                        </li>

                                        <li class="{{ request()->routeIs('frontside.about-us') ? 'active' : '' }}">
                                            <a href="{{ route('frontside.about-us') }}">
                                                {{ __('About Us') }}
                                            </a>
                                        </li>

                                        <li class="{{ request()->routeIs('frontside.contact-us') ? 'active' : '' }}">
                                            <a href="{{ route('frontside.contact-us') }}">
                                                {{ __('Contact Us') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- End of Header-menu -->
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-3 top-order">
                    <!-- modal menu -->
                    <div class="modal-menu-container">
                        <ul class="list-unstyled mb-0">
                            <li>
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    @if (LaravelLocalization::getCurrentLocale() == $localeCode)
                                        @continue
                                    @endif
                                    <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                       class="theme-btn one d-flex align-items-center justify-content-start">
                                        <img
                                            src="{{ asset('images/flags/'.strtolower($properties['regional']).'.svg') }}"
                                            alt="{{ $properties['name'] }}" class="w-25px mx-2 rounded">
                                        <span class="fw-bold">
                                            {{ $properties['name'] }}
                                        </span>
                                    </a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                    <!-- End of modal menu -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of main header -->


<!-- offcanvas overlay -->
<div class="offcanvas-overlay"></div>
<!-- offcanvas overlay -->

<!-- offcanvas mainmenu -->
<div class="offcanvas offcanvas-mainmenu">
    <div class="offcanvas-cancel">
        <img src="{{ asset('frontend-assets/images/icons/close-button.svg') }}" class="svg" alt="">
    </div>
</div>
<!-- offcanvas mainmenu -->
