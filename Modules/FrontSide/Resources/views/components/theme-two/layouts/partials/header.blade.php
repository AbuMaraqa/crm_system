<!-- main header -->
<header class="bb-header">
    <div class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-top-header">
                        <div class="col-left-bar">
                            {{-- <a href="shop-left-sidebar-col-3.html">Flat 50% Off On Grocery Shop.</a> --}}
                            <a href="faq.html">Help?</a>
                        </div>
                        <div class="col-right-bar">
                            {{-- <div class="cols">
                                <a href="faq.html">Help?</a>
                            </div> --}}
                            {{-- <div class="cols">
                                <a href="track-order.html">Track Order</a>
                            </div> --}}
                            <div class="cols">
                                <div class="custom-dropdown">
                                    <a class="bb-dropdown-toggle" href="#">Language</a>
                                    <ul class="dropdown">
                                        <li><a href="javascript:void(0)">English</a></li>
                                        {{-- <li><a href="javascript:void(0)">Hindi</a></li>
                                        <li><a href="javascript:void(0)">Gujarati</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            {{-- <div class="cols">
                                <div class="custom-dropdown">
                                    <a class="bb-dropdown-toggle" href="#">Currency</a>
                                    <ul class="dropdown">
                                        <li><a href="javascript:void(0)">USD $</a></li>
                                        <li><a href="javascript:void(0)">EUR €</a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="inner-bottom-header">
                        <div class="cols bb-logo-detail">
                            <!-- Header Logo Start -->
                            <div class="header-logo">
                                <a href="{{ route('frontside.homepage') }}">
                                    <img src="{{ $logoUrl }}" alt="logo" class="light">
                                    {{-- <img src="{{ asset('images/logo/logo-dark.png') }}" alt="logo" class="dark"> --}}
                                </a>
                            </div>
                            <!-- Header Logo End -->
                            <a href="javascript:void(0)" class="bb-sidebar-toggle bb-category-toggle">
                                <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M384 928H192a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 608a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V640a32 32 0 0 0-32-32H192zM784 928H640a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v144a32 32 0 0 1-64 0V640a32 32 0 0 0-32-32H640a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h144a32 32 0 0 1 0 64zM384 480H192a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H192zM832 480H640a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM640 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H640z" />
                                </svg>
                            </a>
                        </div>
                        <div class="cols">
                            <div class="header-search">
                                <button wire:click="test()">test</button>
                                <form class="bb-btn-group-form" wire:submit.prevent="print">
                                    <div class="inner-select">
                                        <div class="custom-select">
                                            <select>
                                                @foreach ($categories as $item)
                                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <input class="form-control bb-search-bar" placeholder="Search products..."
                                        type="text">
                                    <button class="submit" type="submit"><i class="ri-search-line"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="cols bb-icons">
                            <div class="bb-flex-justify">
                                <div class="bb-header-buttons">
                                    {{-- <div class="bb-acc-drop">
                                        <a href="javascript:void(0)"
                                            class="bb-header-btn bb-header-user dropdown-toggle bb-user-toggle"
                                            title="Account">
                                            <div class="header-icon">
                                                <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M512.476 648.247c-170.169 0-308.118-136.411-308.118-304.681 0-168.271 137.949-304.681 308.118-304.681 170.169 0 308.119 136.411 308.119 304.681C820.594 511.837 682.645 648.247 512.476 648.247L512.476 648.247zM512.476 100.186c-135.713 0-246.12 109.178-246.12 243.381 0 134.202 110.407 243.381 246.12 243.381 135.719 0 246.126-109.179 246.126-243.381C758.602 209.364 648.195 100.186 512.476 100.186L512.476 100.186zM935.867 985.115l-26.164 0c-9.648 0-17.779-6.941-19.384-16.35-2.646-15.426-6.277-30.52-11.142-44.95-24.769-87.686-81.337-164.13-159.104-214.266-63.232 35.203-134.235 53.64-207.597 53.64-73.555 0-144.73-18.537-208.084-53.922-78 50.131-134.75 126.68-159.564 214.549 0 0-4.893 18.172-11.795 46.4-2.136 8.723-10.035 14.9-19.112 14.9L88.133 985.116c-9.415 0-16.693-8.214-15.47-17.452C91.698 824.084 181.099 702.474 305.51 637.615c58.682 40.472 129.996 64.267 206.966 64.267 76.799 0 147.968-23.684 206.584-63.991 124.123 64.932 213.281 186.403 232.277 329.772C952.56 976.901 945.287 985.115 935.867 985.115L935.867 985.115z" />
                                                </svg>
                                            </div>
                                            <div class="bb-btn-desc">
                                                <span class="bb-btn-title">Account</span>
                                                <span class="bb-btn-stitle">Login</span>
                                            </div>
                                        </a>
                                        <ul class="bb-dropdown-menu">
                                            <li><a class="dropdown-item" href="register.html">Register</a></li>
                                            <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                            <li><a class="dropdown-item" href="login.html">Login</a></li>
                                        </ul>
                                    </div>
                                    <a href="wishlist.html" class="bb-header-btn bb-wish-toggle" title="Wishlist">
                                        <div class="header-icon">
                                            <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M512 128l121.571556 250.823111 276.366222 39.111111-199.281778 200.504889L756.622222 896 512 769.536 267.377778 896l45.852444-277.617778-199.111111-200.504889 276.366222-39.111111L512 128m0-56.888889a65.962667 65.962667 0 0 0-59.477333 36.807111l-102.940445 213.703111-236.828444 35.214223a65.422222 65.422222 0 0 0-52.366222 42.979555 62.577778 62.577778 0 0 0 15.274666 64.967111l173.511111 173.340445-40.248889 240.355555a63.374222 63.374222 0 0 0 26.993778 62.577778 67.242667 67.242667 0 0 0 69.632 3.726222L512 837.290667l206.478222 107.605333a67.356444 67.356444 0 0 0 69.688889-3.726222 63.374222 63.374222 0 0 0 26.908445-62.577778l-40.277334-240.355556 173.511111-173.340444a62.577778 62.577778 0 0 0 15.246223-64.967111 65.422222 65.422222 0 0 0-52.366223-42.979556l-236.8-35.214222-102.968889-213.703111A65.848889 65.848889 0 0 0 512 71.111111z"
                                                    fill="#364C58" />
                                            </svg>
                                        </div>
                                        <div class="bb-btn-desc">
                                            <span class="bb-btn-title"><b class="bb-wishlist-count">3</b>
                                                items</span>
                                            <span class="bb-btn-stitle">Wishlist</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="bb-header-btn bb-cart-toggle" title="Cart">
                                        <div class="header-icon">
                                            <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M351.552 831.424c-35.328 0-63.968 28.64-63.968 63.968 0 35.328 28.64 63.968 63.968 63.968 35.328 0 63.968-28.64 63.968-63.968C415.52 860.064 386.88 831.424 351.552 831.424L351.552 831.424 351.552 831.424zM799.296 831.424c-35.328 0-63.968 28.64-63.968 63.968 0 35.328 28.64 63.968 63.968 63.968 35.328 0 63.968-28.64 63.968-63.968C863.264 860.064 834.624 831.424 799.296 831.424L799.296 831.424 799.296 831.424zM862.752 799.456 343.264 799.456c-46.08 0-86.592-36.448-92.224-83.008L196.8 334.592 165.92 156.128c-1.92-15.584-16.128-28.288-29.984-28.288L95.2 127.84c-17.664 0-32-14.336-32-31.968 0-17.664 14.336-32 32-32l40.736 0c46.656 0 87.616 36.448 93.28 83.008l30.784 177.792 54.464 383.488c1.792 14.848 15.232 27.36 28.768 27.36l519.488 0c17.696 0 32 14.304 32 31.968S880.416 799.456 862.752 799.456L862.752 799.456zM383.232 671.52c-16.608 0-30.624-12.8-31.872-29.632-1.312-17.632 11.936-32.928 29.504-34.208l433.856-31.968c15.936-0.096 29.344-12.608 31.104-26.816l50.368-288.224c1.28-10.752-1.696-22.528-8.128-29.792-4.128-4.672-9.312-7.04-15.36-7.04L319.04 223.84c-17.664 0-32-14.336-32-31.968 0-17.664 14.336-31.968 32-31.968l553.728 0c24.448 0 46.88 10.144 63.232 28.608 18.688 21.088 27.264 50.784 23.52 81.568l-50.4 288.256c-5.44 44.832-45.92 81.28-92 81.28L385.6 671.424C384.8 671.488 384 671.52 383.232 671.52L383.232 671.52zM383.232 671.52" />
                                            </svg>
                                            <span class="main-label-note-new"></span>
                                        </div>
                                        <div class="bb-btn-desc">
                                            <span class="bb-btn-title"><b class="bb-cart-count">4</b> items</span>
                                            <span class="bb-btn-stitle">Cart</span>
                                        </div>
                                    </a> --}}
                                    <a href="javascript:void(0)" class="bb-toggle-menu">
                                        <div class="header-icon">
                                            <i class="ri-menu-3-fill"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bb-main-menu-desk">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bb-inner-menu-desk">
                        <a href="javascript:void(0)" class="bb-header-btn bb-sidebar-toggle bb-category-toggle">
                            <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M384 928H192a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 608a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V640a32 32 0 0 0-32-32H192zM784 928H640a96 96 0 0 1-96-96V640a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v144a32 32 0 0 1-64 0V640a32 32 0 0 0-32-32H640a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h144a32 32 0 0 1 0 64zM384 480H192a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM192 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H192zM832 480H640a96 96 0 0 1-96-96V192a96 96 0 0 1 96-96h192a96 96 0 0 1 96 96v192a96 96 0 0 1-96 96zM640 160a32 32 0 0 0-32 32v192a32 32 0 0 0 32 32h192a32 32 0 0 0 32-32V192a32 32 0 0 0-32-32H640z" />
                            </svg>
                        </a>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="ri-menu-2-line"></i>
                        </button>
                        <div class="bb-main-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item bb-main-dropdown">
                                    <a class="nav-link bb-dropdown-item"
                                        href="{{ route('frontside.homepage') }}">Home</a>
                                    {{-- <ul class="mega-menu img-menu">
                                        <li>
                                            <ul class="mega-block">
                                                <li><a href="index.html"><img src="{{ asset('images/pages/1.jpg') }}" alt="pages"></a></li>
                                                <li class="img_title"><a href="index.html">Grocery</a></li>
                                            </ul>
                                            <ul class="mega-block">
                                                <li><a href="demo-2.html"><img src="{{ asset('images/pages/2.jpg') }}" alt="pages"></a></li>
                                                <li class="img_title"><a href="demo-2.html">Fashion</a></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item bb-main-dropdown">
                                    <a class="nav-link bb-dropdown-item"
                                        href="{{ route('frontside.categories') }}">Categories</a>
                                    {{-- <ul class="mega-menu">
                                        <li>
                                            <ul class="mega-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Classic</a></li>
                                                <li><a href="shop-left-sidebar-col-3.html">Left sidebar 3 column</a>
                                                </li>
                                                <li><a href="shop-left-sidebar-col-4.html">Left sidebar 4 column</a>
                                                </li>
                                                <li><a href="shop-right-sidebar-col-3.html">Right sidebar 3
                                                        column</a></li>
                                                <li><a href="shop-right-sidebar-col-4.html">Right sidebar 4
                                                        column</a></li>
                                                <li><a href="shop-full-width.html">Full width 4 column</a></li>
                                            </ul>
                                            <ul class="mega-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Banner</a></li>
                                                <li><a href="shop-banner-left-sidebar-col-3.html">left sidebar 3
                                                        column</a></li>
                                                <li><a href="shop-banner-left-sidebar-col-4.html">left sidebar 4
                                                        column</a></li>
                                                <li><a href="shop-banner-right-sidebar-col-3.html">right sidebar 3
                                                        column</a></li>
                                                <li><a href="shop-banner-right-sidebar-col-4.html">right sidebar 4
                                                        column</a></li>
                                                <li><a href="shop-banner-full-width.html">Full width 4 column</a>
                                                </li>
                                            </ul>
                                            <ul class="mega-block">
                                                <li class="menu_title"><a href="javascript:void(0)">Columns</a></li>
                                                <li><a href="shop-full-width-col-3.html">3 Columns full width</a>
                                                </li>
                                                <li><a href="shop-full-width-col-4.html">4 Columns full width</a>
                                                </li>
                                                <li><a href="shop-full-width-col-5.html">5 Columns full width</a>
                                                </li>
                                                <li><a href="shop-full-width-col-6.html">6 Columns full width</a>
                                                </li>
                                                <li><a href="shop-banner-full-width-col-3.html">Banner 3 Columns</a>
                                                </li>
                                            </ul>
                                            <ul class="mega-block">
                                                <li class="menu_title"><a href="javascript:void(0)">List</a></li>
                                                <li><a href="shop-list-left-sidebar.html">Shop left sidebar</a></li>
                                                <li><a href="shop-list-right-sidebar.html">Shop right sidebar</a>
                                                </li>
                                                <li><a href="shop-list-banner-left-sidebar.html">Banner left
                                                        sidebar</a></li>
                                                <li><a href="shop-list-banner-right-sidebar.html">Banner right
                                                        sidebar</a></li>
                                                <li><a href="shop-list-full-col-2.html">Full width 2 columns</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="nav-item bb-dropdown">
                                    <a class="nav-link bb-dropdown-item" href="{{ route('frontside.shop') }}">Shop</a>
                                    {{-- <ul class="bb-dropdown-menu">
                                        <li class="bb-mega-dropdown">
                                            <a class="bb-mega-item" href="javascript:void(0)">Tag page</a>
                                            <ul class="bb-mega-menu">
                                                <li><a class="dropdown-item"
                                                        href="product-left-sidebar.html">Tag left sidebar</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="product-right-sidebar.html">Tag right sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="bb-mega-dropdown">
                                            <a class="bb-mega-item" href="javascript:void(0)">Tag Accordion</a>
                                            <ul class="bb-mega-menu">
                                                <li><a class="dropdown-item"
                                                        href="product-accordion-left-sidebar.html">left sidebar</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="product-accordion-right-sidebar.html">right
                                                        sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="product-full-width.html">Tag full width</a>
                                        </li>
                                        <li>
                                            <a href="product-accordion-full-width.html">accordion full width</a>
                                        </li>
                                    </ul> --}}
                                </li>
                                {{-- <li class="nav-item bb-dropdown">
                                    <a class="nav-link bb-dropdown-item" href="javascript:void(0)">Pages</a>
                                    <ul class="bb-dropdown-menu">
                                        <li><a class="dropdown-item" href="cart.html">Cart</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontside.about-us') }}">About Us</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontside.contact-us') }}">Contact Us</a></li>
                                        <li><a class="dropdown-item" href="checkout.html">Checkout</a></li>
                                        <li><a class="dropdown-item" href="compare.html">Compare</a></li>
                                        <li><a class="dropdown-item" href="faq.html">Faq</a></li>
                                        <li><a class="dropdown-item" href="login.html">Login</a></li>
                                        <li><a class="dropdown-item" href="register.html">Register</a></li>
                                    </ul>
                                </li> --}}
                                <li class="nav-item bb-dropdown">
                                    <a class="nav-link bb-dropdown-item" href="{{ route('frontside.about-us') }}">About
                                        Us</a>
                                </li>
                                <li class="nav-item bb-dropdown">
                                    <a class="nav-link bb-dropdown-item"
                                        href="{{ route('frontside.contact-us') }}">Contact Us</a>
                                </li>
                                {{-- <li class="nav-item bb-dropdown">
                                    <a class="nav-link bb-dropdown-item" href="javascript:void(0)">Blog</a>
                                    <ul class="bb-dropdown-menu">
                                        <li><a class="dropdown-item" href="blog-left-sidebar.html">Left Sidebar</a>
                                        </li>
                                        <li><a class="dropdown-item" href="blog-right-sidebar.html">Right
                                                Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-full-width.html">Full Width</a></li>
                                        <li><a class="dropdown-item" href="blog-detail-left-sidebar.html">Detail
                                                Left Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-detail-right-sidebar.html">Detail
                                                Right Sidebar</a></li>
                                        <li><a class="dropdown-item" href="blog-detail-full-width.html">Detail Full
                                                Width</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="offer.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" x="0" y="0" viewBox="0 0 64 64"
                                            style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                                            <g>
                                                <path
                                                    d="M10 16v22c0 .3.1.6.2.8.3.6 6.5 13.8 21 20h.2c.2 0 .3.1.5.1s.3 0 .5-.1h.2c14.5-6.2 20.8-19.4 21-20 .1-.3.2-.5.2-.8V16c0-.9-.6-1.7-1.5-1.9-7.6-1.9-19.3-9.6-19.4-9.7-.1-.1-.2-.1-.4-.2-.1 0-.1 0-.2-.1h-.9c-.1 0-.2.1-.3.1-.1.1-.2.1-.4.2s-11.8 7.8-19.4 9.7c-.7.2-1.3 1-1.3 1.9zm4 1.5c6.7-2.1 15-7.2 18-9.1 3 1.9 11.3 7 18 9.1v20c-1.1 2.1-6.7 12.1-18 17.3-11.3-5.2-16.9-15.2-18-17.3z"
                                                    fill="#000000" opacity="1" data-original="#000000" class="">
                                                </path>
                                                <path
                                                    d="M28.6 38.4c.4.4.9.6 1.4.6s1-.2 1.4-.6l9.9-9.9c.8-.8.8-2 0-2.8s-2-.8-2.8 0L30 34.2l-4.5-4.5c-.8-.8-2-.8-2.8 0s-.8 2 0 2.8z"
                                                    fill="#000000" opacity="1" data-original="#000000" class="">
                                                </path>
                                            </g>
                                        </svg>
                                        Offers
                                    </a>
                                </li> --}}
                            </ul>
                        </div>
                        {{-- <div class="bb-dropdown-menu">
                            <div class="inner-select">
                                <svg class="svg-icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M511.614214 958.708971c-21.76163 0-41.744753-9.781784-54.865586-26.862811L222.50156 626.526383c-3.540639-4.044106-5.872754-7.978718-7.349385-10.461259-41.72838-58.515718-63.959707-127.685078-63.959707-199.699228 0.87288-193.650465 162.903184-351.075891 361.209691-351.075891 198.726064 0 360.40435 157.49194 360.40435 351.075891-0.839111 72.190159-23.070438 140.856052-64.345494 199.053522-1.962701 3.288906-4.312212 7.189749-7.735171 11.098779L566.479799 931.847184c-13.120832 17.080004-33.103956 26.861788-54.865585 26.861787zM273.525654 580.51956a33.707706 33.707706 0 0 1 2.63399 3.037173L511.278569 890.00931 747.068783 583.556733c0.435928-0.569982 0.889253-1.124614 1.358951-1.669013l2.51631-4.102434c0.285502-0.453325 0.587378-0.89744 0.889253-1.325182 33.507138-46.921659 51.577702-102.416578 52.248991-160.487158 0-155.294902-130.839931-281.95565-291.679105-281.95565-160.571069 0-291.780413 126.72931-292.484448 282.501073 0 57.450457 17.802458 112.811322 51.460022 159.933549l2.90312 4.580318c0.418532 0.73678-0.186242 0.032746-0.756223-0.512676z m476.059439 0.100284v0z m0.066515-0.058329c-0.016373 0.016373-0.033769 0.025583-0.033769 0.041956 0.001023-0.016373 0.017396-0.025583 0.033769-0.041956z m0.051166-0.041955a0.227174 0.227174 0 0 0-0.050142 0.041955c0.016373-0.016373 0.032746-0.033769 0.050142-0.041955z"
                                        fill="#444444" />
                                    <path
                                        d="M512 577.206094c-90.000803 0-163.222455-73.221652-163.222455-163.222455s73.221652-163.222455 163.222455-163.222455S675.222455 323.982836 675.222455 413.983639s-73.222675 163.222455-163.222455 163.222455z m0-240.538355c-42.634006 0-77.3159 34.68087-77.3159 77.3159s34.68087 77.3159 77.3159 77.3159 77.3159-34.681894 77.3159-77.3159-34.681894-77.3159-77.3159-77.3159z"
                                        fill="#00D8A0" />
                                </svg>
                                <div class="custom-select">
                                    <select>
                                        <option value="option1">Surat</option>
                                        <option value="option2">Delhi</option>
                                        <option value="option3">Rajkot</option>
                                        <option value="option4">Udaipur</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bb-mobile-menu-overlay"></div>
    <div id="bb-mobile-menu" class="bb-mobile-menu">
        <div class="bb-menu-title">
            <span class="menu_title">My Menu</span>
            <button type="button" class="bb-close-menu">×</button>
        </div>
        <div class="bb-menu-inner">
            <div class="bb-menu-content">
                <ul>
                    <li>
                        <a href="{{ route('frontside.homepage') }}">Home</a>
                        <ul class="sub-menu">
                            <li><a href="index.html">Grocery</a></li>
                            <li><a href="demo-2.html">Fashion</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Categories</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">Classic</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-left-sidebar-col-3.html">Left sidebar 3 column</a></li>
                                    <li><a href="shop-left-sidebar-col-4.html">Left sidebar 4 column</a></li>
                                    <li><a href="shop-right-sidebar-col-3.html">Right sidebar 3 column</a></li>
                                    <li><a href="shop-right-sidebar-col-4.html">Right sidebar 4 column</a></li>
                                    <li><a href="shop-full-width.html">Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Banner</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-banner-left-sidebar-col-3.html">Left sidebar 3 column</a></li>
                                    <li><a href="shop-banner-left-sidebar-col-4.html">Left sidebar 4 column</a></li>
                                    <li><a href="shop-banner-right-sidebar-col-3.html">Right sidebar 3 column</a>
                                    </li>
                                    <li><a href="shop-banner-right-sidebar-col-4.html">Right sidebar 4 column</a>
                                    </li>
                                    <li><a href="shop-banner-full-width.html">Full width 4 column</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Columns</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-full-width-col-3.html">3 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-4.html">4 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-5.html">5 Columns full width</a></li>
                                    <li><a href="shop-full-width-col-6.html">6 Columns full width</a></li>
                                    <li><a href="shop-banner-full-width-col-3.html">Banner 3 Columns</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">List</a>
                                <ul class="sub-menu">
                                    <li><a href="shop-list-left-sidebar.html">Shop left sidebar</a></li>
                                    <li><a href="shop-list-right-sidebar.html">Shop right sidebar</a></li>
                                    <li><a href="shop-list-banner-left-sidebar.html">Banner left sidebar</a></li>
                                    <li><a href="shop-list-banner-right-sidebar.html">Banner right sidebar</a></li>
                                    <li><a href="shop-list-full-col-2.html">Full width 2 columns</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Products</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="javascript:void(0)">Product page</a>
                                <ul class="sub-menu">
                                    <li><a href="product-left-sidebar.html">Product left sidebar</a></li>
                                    <li><a href="product-right-sidebar.html">Product right sidebar</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)">Product Accordion</a>
                                <ul class="sub-menu">
                                    <li><a href="product-accordion-left-sidebar.html">left sidebar</a></li>
                                    <li><a href="product-accordion-right-sidebar.html">right sidebar</a></li>
                                </ul>
                            </li>
                            <li><a href="product-full-width.html">Product full width</a></li>
                            <li><a href="product-accordion-full-width.html">accordion full width</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Pages</a>
                        <ul class="sub-menu">
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact-us.html">Contact Us</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="compare.html">Compare</a></li>
                            <li><a href="faq.html">Faq</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Blog</a>
                        <ul class="sub-menu">
                            <li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
                            <li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
                            <li><a href="blog-full-width.html">Full Width</a></li>
                            <li><a href="blog-detail-left-sidebar.html">Detail Left Sidebar</a></li>
                            <li><a href="blog-detail-right-sidebar.html">Detail Right Sidebar</a></li>
                            <li><a href="blog-detail-full-width.html">Detail Full Width</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a href="#"><i class="ri-facebook-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="ri-twitter-fill"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#"><i class="ri-linkedin-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
</header>
<!-- End of main header -->

<!-- Category Popup -->
<div class="bb-category-sidebar" wire:ignore>
    <div class="bb-category-overlay"></div>
    <div class="category-sidebar">
        <button type="button" class="bb-category-close" title="Close"></button>
        <div class="container-fluid">
            <div class="row mb-minus-24">
                <div class="col-12">
                    <div class="bb-category-tags">
                        <div class="sub-title">
                            <h4>Explore Categories</h4>
                        </div>
                        <div class="bb-tags">
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a
                                        hre
                                        wire:click.prevent="selectCategory({{ $category->id }})">{{ $category->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="sub-title">
                                <h4>Related products</h4>
                            </div>
                        </div>
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-12 mb-24">
                                <div class="bb-category-cart">
                                    <a href="javascript:void(0)" class="pro-img">
                                        <img src="{{ $product->getMainImage() }}" alt="new-product-1">
                                    </a>
                                    <div class="side-contact">
                                        <h4 class="bb-pro-title"><a
                                                href="product-left-sidebar.html">{{ $product->title }}</a></h4>
                                        <span class="bb-pro-rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                        </span>
                                        <div class="inner-price">
                                            <span class="new-price">$15</span>
                                            {{-- <span class="old-price">$22</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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
