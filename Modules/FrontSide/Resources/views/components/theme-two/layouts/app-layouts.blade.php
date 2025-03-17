@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization; @endphp
    <!DOCTYPE html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ Localization::getCurrentLocaleDirection() }}">
    <head>
        <!-- Required meta tags -->
        <x-frontside::theme-two.layouts.partials.meta />

        <!-- Favicon -->
        {!! $favIcons !!}

        <!-- Styles -->
        <x-frontside::theme-two.layouts.partials.styles />

        <!-- Title -->
        @isset($pageTitle)
            <title>{{ $pageTitle }}</title>
        @endisset
    </head>

    <body>
        <!-- Preloader -->
        {{-- <div class="preLoader">
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
        </div> --}}
        <!-- End Of Preloader -->

        <!-- Start header section -->
        {{-- <x-frontside::theme-two.layouts.partials.header /> --}}
        <livewire:theme-two.layouts.partials.header />
        <!-- End header section -->

        <!-- Start main section -->
        <main>
            {{ $slot }}
        </main>
        <!-- End main section -->

        <!-- Start Footer section -->
        <x-frontside::theme-two.layouts.partials.footer />
        <!-- End Footer section -->

        <!-- Cart sidebar -->
    <div class="bb-side-cart-overlay"></div>
    <div class="bb-side-cart">
        <div class="row h-full">
            <div class="col-md-5 col-12 d-none-767">
                <div class="bb-top-contact">
                    <div class="bb-cart-title">
                        <h4>Related Items</h4>
                    </div>
                </div>
                <div class="bb-cart-box mb-minus-24 cart-related bb-border-right">
                    <div class="bb-deal-card mb-24">
                        <div class="bb-pro-box">
                            <div class="bb-pro-img">
                                <span class="flags">
                                    <span>Hot</span>
                                </span>
                                <a href="javascript:void(0)">
                                    <div class="inner-img">
                                        <img class="main-img" src="{{ asset('images/product/2.jpg') }}" alt="product-2">
                                        <img class="hover-img" src="{{ asset('images/product/back-2.jpg') }}" alt="product-2">
                                    </div>
                                </a>
                                <ul class="bb-pro-actions">
                                    <li class="bb-btn-group">
                                        <a href="javascript:void(0)" title="Wishlist">
                                            <i class="ri-heart-line"></i>
                                        </a>
                                    </li>
                                    <li class="bb-btn-group">
                                        <a href="javascript:void(0)" data-link-action="quickview" title="Quick View"
                                            data-bs-toggle="modal" data-bs-target="#bry_quickview_modal">
                                            <i class="ri-eye-line"></i>
                                        </a>
                                    </li>
                                    <li class="bb-btn-group">
                                        <a href="compare.html" title="Compare">
                                            <i class="ri-repeat-line"></i>
                                        </a>
                                    </li>
                                    <li class="bb-btn-group">
                                        <a href="javascript:void(0)" title="Add To Cart">
                                            <i class="ri-shopping-bag-4-line"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="bb-pro-contact">
                                <div class="bb-pro-subtitle">
                                    <a href="shop-left-sidebar-col-3.html">Juice</a>
                                    <span class="bb-pro-rating">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                    </span>
                                </div>
                                <h4 class="bb-pro-title"><a href="product-left-sidebar.html">Organic Apple Juice
                                        Pack</a></h4>
                                <div class="bb-price">
                                    <div class="inner-price">
                                        <span class="new-price">$15</span>
                                        <span class="item-left">3 Left</span>
                                    </div>
                                    <span class="last-items">100 ml</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bb-cart-banner mb-24">
                        <div class="banner">
                            <img src="{{ asset('images/category/cart-banner.jpg') }}" alt="cart-banner">
                            <div class="detail">
                                <h4>Organic & Fresh</h4>
                                <h3>Vegetables</h3>
                                <a href="shop-left-sidebar-col-3.html">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-12">
                <div class="bb-inner-cart">
                    <div class="bb-top-contact">
                        <div class="bb-cart-title">
                            <h4>My cart</h4>
                            <a href="javascript:void(0)" class="bb-cart-close" title="Close Cart"></a>
                        </div>
                    </div>
                    <div class="bb-cart-box item">
                        <ul class="bb-cart-items">
                            <li class="cart-sidebar-list">
                                <a href="javascript:void(0)" class="cart-remove-item"><i class="ri-close-line"></i></a>
                                <a href="javascript:void(0)" class="bb-cart-pro-img">
                                    <img src="{{ asset('images/new-product/1.jpg') }}" alt="product-img-1">
                                </a>
                                <div class="bb-cart-contact">
                                    <a href="product-left-sidebar.html" class="bb-cart-sub-title">Ground Nuts Oil
                                        Pack</a>
                                    <span class="cart-price">
                                        <span class="new-price">$15</span>
                                        x 500 g
                                    </span>
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                </div>
                            </li>
                            <li class="cart-sidebar-list">
                                <a href="javascript:void(0)" class="cart-remove-item"><i class="ri-close-line"></i></a>
                                <a href="javascript:void(0)" class="bb-cart-pro-img">
                                    <img src="{{ asset('images/new-product/2.jpg') }}" alt="product-img-2">
                                </a>
                                <div class="bb-cart-contact">
                                    <a href="product-left-sidebar.html" class="bb-cart-sub-title">Organic Litchi Juice
                                        Pack</a>
                                    <span class="cart-price">
                                        <span class="new-price">$25</span>
                                        x 500 ml
                                    </span>
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                </div>
                            </li>
                            <li class="cart-sidebar-list">
                                <a href="javascript:void(0)" class="cart-remove-item"><i class="ri-close-line"></i></a>
                                <a href="javascript:void(0)" class="bb-cart-pro-img">
                                    <img src="{{ asset('images/new-product/3.jpg') }}" alt="product-img-3">
                                </a>
                                <div class="bb-cart-contact">
                                    <a href="product-left-sidebar.html" class="bb-cart-sub-title">Crunchy Banana
                                        Chips</a>
                                    <span class="cart-price">
                                        <span class="new-price">$1</span>
                                        x 500 g
                                    </span>
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                </div>
                            </li>
                            <li class="cart-sidebar-list">
                                <a href="javascript:void(0)" class="cart-remove-item"><i class="ri-close-line"></i></a>
                                <a href="javascript:void(0)" class="bb-cart-pro-img">
                                    <img src="{{ asset('images/new-product/6.jpg') }}" alt="product-img-3">
                                </a>
                                <div class="bb-cart-contact">
                                    <a href="product-left-sidebar.html" class="bb-cart-sub-title">Small Cardamom Spice
                                        Pack</a>
                                    <span class="cart-price">
                                        <span class="new-price">$4</span>
                                        x 500 g
                                    </span>
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="bb-bottom-cart">
                        <div class="cart-sub-total">
                            <table class="table cart-table">
                                <tbody>
                                    <tr>
                                        <td class="title">Sub-Total :</td>
                                        <td class="price">$300.00</td>
                                    </tr>
                                    <tr>
                                        <td class="title">VAT (20%) :</td>
                                        <td class="price">$60.00</td>
                                    </tr>
                                    <tr>
                                        <td class="title">Total :</td>
                                        <td class="price">$360.00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-btn">
                            <a href="cart.html" class="bb-btn-1">View Cart</a>
                            <a href="checkout.html" class="bb-btn-2">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quick view Modal -->
    <div class="modal fade quickview-modal" id="bry_quickview_modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="qty-close" data-bs-dismiss="modal" aria-label="Close"
                    title="Close"></button>
                <div class="modal-body">
                    <div class="row mb-minus-24">
                        <div class="col-md-5 col-sm-12 col-xs-12 mb-24">
                            <div class="single-pro-img single-pro-img-no-sidebar">
                                <div class="single-product-scroll">
                                    <div class="single-slide zoom-image-hover">
                                        <img class="img-responsive" src="{{ asset('images/product/1.jpg') }}" alt="product-img-1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12 mb-24">
                            <div class="quickview-pro-content">
                                <h5 class="bb-quick-title">
                                    <a href="product-left-sidebar.html">Mix nuts premium quality organic dried fruit
                                        250g pack</a>
                                </h5>
                                <div class="bb-pro-rating">
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-fill"></i>
                                    <i class="ri-star-line"></i>
                                </div>
                                <div class="bb-quickview-desc">Lorem Ipsum is simply dummy text of the printing and
                                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                    since the 1900s,</div>
                                <div class="bb-quickview-price">
                                    <span class="new-price">$50.00</span>
                                    <span class="old-price">$62.00</span>
                                </div>
                                <div class="bb-pro-variation">
                                    <ul>
                                        <li class="active">
                                            <a href="javascript:void(0)" class="bb-opt-sz" data-tooltip="Small">250g</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="bb-opt-sz"
                                                data-tooltip="Medium">500g</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="bb-opt-sz" data-tooltip="Large">1kg</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="bb-opt-sz"
                                                data-tooltip="Extra Large">2kg</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="bb-quickview-qty">
                                    <div class="qty-plus-minus">
                                        <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                    </div>
                                    <div class="bb-quickview-cart">
                                        <button type="button" class="bb-btn-1">
                                            <i class="ri-shopping-bag-line"></i>Add To Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Modal -->
    {{-- <div class="bb-popnews-bg"></div>
    <div class="bb-popnews-box">
        <div class="bb-popnews-close" title="Close"></div>
        <div class="row">
            <div class="col-md-6 col-12">
                <img src="{{ asset('images/newsletter/newsletter.jpg') }}
                " alt="newsletter">
            </div>
            <div class="col-md-6 col-12">
                <div class="bb-popnews-box-content">
                    <h2>Newsletter.</h2>
                    <p>Subscribe the BlueBerry to get in touch and get the future update.</p>
                    <form class="bb-popnews-form" action="#" method="post">
                        <input type="email" name="newsemail" placeholder="Email Address" required>
                        <button type="button" class="bb-btn-2" name="subscribe">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Tools Sidebar -->
    <div class="bb-tools-sidebar-overlay"></div>
    <div class="bb-tools-sidebar">
        <a href="javascript:void(0)" class="bb-tools-sidebar-toggle in-out">
            <i class="ri-settings-fill"></i>
        </a>
        <div class="bb-bar-title">
            <h6>Tools</h6>
            <a href="#" class="close-tools"><i class="ri-close-line"></i></a>
        </div>
        <div class="bb-tools-detail">
            <div class="bb-tools-block">
                <h3>Select Color</h3>
                <ul class="bb-color">
                    <li class="color-primary active-variant"></li>
                    <li class="color-1"></li>
                    <li class="color-2"></li>
                    <li class="color-3"></li>
                    <li class="color-4"></li>
                    <li class="color-5"></li>
                    <li class="color-6"></li>
                    <li class="color-7"></li>
                    <li class="color-8"></li>
                    <li class="color-9"></li>
                </ul>
            </div>
            <div class="bb-tools-block">
                <h3>Dark Modes</h3>
                <div class="bb-tools-dark">
                    <div class="mode-primary bb-dark-item mode active-dark light" data-bb-mode-tool="light">
                        <img src="{{ asset('images/tools/light.png') }}" alt="light">
                        <p>Light</p>
                    </div>
                    <div class="bb-dark-item mode dark" data-bb-mode-tool="dark">
                        <img src="{{ asset('images/tools/dark.png') }}" alt="dark">
                        <p>Dark</p>
                    </div>
                </div>
            </div>
            <div class="bb-tools-block">
                <h3>RTL Modes</h3>
                <div class="bb-tools-rtl">
                    <div class="bb-tools-item ltr active-rtl" data-bb-mode-tool="ltr">
                        <img src="{{ asset('images/tools/ltr.png') }}" alt="ltr">
                        <p>LTR</p>
                    </div>
                    <div class="bb-tools-item rtl" data-bb-mode-tool="rtl">
                        <img src="{{ asset('images/tools/rtl.png') }}" alt="rtl">
                        <p>RTL</p>
                    </div>
                </div>
            </div>
            <div class="bb-tools-block">
                <h3>Box Design</h3>
                <div class="bb-tools-box">
                    <div class="bb-tools-item default active-box" data-bb-mode-tool="default">
                        <img src="{{ asset('images/tools/box-0.png') }}" alt="box-0">
                        <p>Default</p>
                    </div>
                    <div class="bb-tools-item box-1" data-bb-mode-tool="box-1">
                        <img src="{{ asset('images/tools/box-1.png') }}" alt="box-1">
                        <p>Box-1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top  -->
    <a href="#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap active-progress">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
            </svg>
        </div>
    </a>

        <!-- Scripts -->
        <x-frontside::theme-two.layouts.partials.scripts />
        <!-- End Scripts -->
    </body>
</html>
