@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
    use Modules\Shop\Entities\Tag;
    use Modules\Shop\Entities\ProductCategory;
@endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp

<div class="home-page">
    <!-- Hero -->
    <section class="section-hero margin-b-50 next">
        <div class="bb-social-follow">
            <ul class="inner-links">
                <li>
                    <a href="javascript:void(0)">Fb</a>
                </li>
                <li>
                    <a href="javascript:void(0)">Li</a>
                </li>
                <li>
                    <a href="javascript:void(0)">Dr</a>
                </li>
                <li>
                    <a href="javascript:void(0)">In</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hero-slider swiper-container">
                        <div class="swiper-wrapper">
                            @foreach ($this->mainSlider as $banner)
                                <div class="swiper-slide slide-{{ $banner->id }}">
                                    <div class="row mb-minus-24">
                                        @if (!empty($banner->description))
                                            <div class="col-lg-6 col-12 order-lg-1 order-2 mb-24">
                                                <div class="hero-contact">
                                                    <p>{{ $banner->title }}</p>
                                                    {{-- <h1>Explore <span>Healthy</span><br> & Fresh Fruits</h1> --}}
                                                    <h1>{!! $banner->description !!}</h1>
                                                    <a href="shop-left-sidebar-col-3.html" class="bb-btn-1">Shop Now</a>
                                                </div>
                                            </div>
                                        @endif
                                        <div
                                                class="@if (!empty($banner->description)) col-lg-6
                                        @endif order-lg-2 order-1 mb-24">
                                            <div class="hero-image">
                                                <img src="{{ $banner->getImage() }}" alt="hero">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 300"
                                                     class="animate-shape">
                                                    <linearGradient id="shape_1" x1="100%" x2="0%"
                                                                    y1="100%" y2="0%">
                                                    </linearGradient>
                                                    <path d="">
                                                        <animate repeatCount="indefinite" attributeName="d"
                                                                 dur="15s" values=""/>
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination swiper-pagination-white"></div>
                        <div class="swiper-buttons">
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bb-scroll-Page">
            <span class="scroll-bar">
                <a href="javascript:void(0)">Scroll Page</a>
            </span>
        </div>
    </section>

    <!-- Category -->
    <section class="section-category padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-5 col-12 mb-24">
                    <div class="bb-category-img">
                        <p>{{ $this->getAboveNewFeatureBanner }}</p>
                        {{-- <img src="{{ $this->getAboveNewFeatureBanner->getImage() }}" alt="category"> --}}
                        {{-- <img src="{{ asset('storage/shop/default-images/category.png')}}" alt="category"> --}}
                        <div class="bb-offers">
                            <span>50% Off</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12 mb-24">
                    <div class="bb-category-contact">
                        <div class="category-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <h2>Explore Categories</h2>
                        </div>
                        <div class="bb-category-block owl-carousel">
                            @foreach ($this->categories as $category)
                                <div class="bb-category-box category-items-{{ $category->id }}" data-aos="flip-left"
                                     data-aos-duration="1000" data-aos-delay="200">
                                    <div class="category-image">
                                        <img src="{{ $category->getImage() }}" alt="category">
                                    </div>
                                    <div class="category-sub-contact">
                                        <h5><a href="shop-left-sidebar-col-3.html">{{ $category->title }}</a></h5>
                                        <p>{{ $category->products()->count() }} items</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Day of the deal -->
    <section class="section-deal padding-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title bb-deal" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">New <span>Feature</span></h2>
                            <p>Don't wait. The time will never be just right.</p>
                        </div>
                        <div id="dealend" class="dealend-timer"
                             data-value="{{ \Carbon\Carbon::now()->addMonth()->format('F d, Y 12:00:00') }}"></div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bb-deal-slider">
                        <div class="bb-deal-block owl-carousel">
                            @foreach ($this->featuredProducts as $featuredProduct)
                                <div class="bb-deal-card" data-aos="fade-up" data-aos-duration="1000"
                                     data-aos-delay="200">
                                    <div class="bb-pro-box">
                                        <div class="bb-pro-img">
                                            <span class="flags">
                                                <span>New</span>
                                            </span>
                                            <a href="javascript:void(0)">
                                                <div class="inner-img">
                                                    <img class="main-img" src="{{ $featuredProduct->getMainImage() }}"
                                                         alt="product-1s">
                                                    <img class="hover-img"
                                                         src="@if (empty($featuredProduct->getGalleryImages()[0])) {{ $featuredProduct->getMainImage() }}
                                                 @else
                                                    {{ $featuredProduct->getGalleryImages()[0] }} @endif"
                                                         alt="product-1">
                                                </div>
                                            </a>
                                            {{-- <ul class="bb-pro-actions">
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" title="Wishlist">
                                                    <i class="ri-heart-line"></i>
                                                </a>
                                            </li>
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" data-link-action="quickview"
                                                    title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#bry_quickview_modal">
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
                                        </ul> --}}
                                        </div>
                                        <div class="bb-pro-contact">
                                            <div class="bb-pro-subtitle">
                                                <a
                                                        href="shop-left-sidebar-col-3.html">{{ $featuredProduct->categories()->first()->title }}</a>
                                                <span class="bb-pro-rating">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </span>
                                            </div>
                                            <h4 class="bb-pro-title">
                                                <a href="product-left-sidebar.html">
                                                    {{ $featuredProduct->title }}
                                                </a>
                                            </h4>
                                            <div class="bb-price">
                                                <div class="inner-price">
                                                    <span class="new-price">${{ $featuredProduct->price }}</span>
                                                    {{-- <span class="old-price">$30</span> --}}
                                                </div>
                                                {{-- <span class="last-items">1 Pack</span> --}}
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
    </section>

    <!-- Banner-one -->
    <section class="section-banner-one padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                @foreach ($this->newArriavalBanners as $newArriavalBanner)
                    <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="400">
                        <div
                                class="banner-box {{ $loop->iteration % 2 === 0 ? 'bg-box-color-two' : 'bg-box-color-one' }}">
                            <div class="inner-banner-box">
                                <div class="side-image">
                                    <img src="{{ $newArriavalBanner->getImage() }}" alt="one">
                                </div>
                                <div class="inner-contact">
                                    <h5>{!! $newArriavalBanner->description !!}</h5>
                                    <p>{{ $newArriavalBanner->title }}</p>
                                    <a href="shop-left-sidebar-col-3.html"
                                       class="bb-btn-1">{{ $newArriavalBanner->label_button }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Banner-two -->
    <section class="section-banner-two margin-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12 banner-justify-box-contact">
                    <div class="banner-two-box">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- New Tag tab Area -->
    <section class="section-product-tabs padding-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title bb-deal" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">New <span>Arrivals</span></h2>
                            <p>Shop online for new arrivals and get free shipping!</p>
                        </div>
                        <div class="bb-pro-tab">
                            <ul class="bb-pro-tab-nav nav">
                                @foreach ($this->getCategoriesFilter as $getCategorieFilter)
                                    <li class="nav-item">
                                        <a class="nav-link @if ($getCategorieFilter->id == $categorieFilterTab)
                                                active
                                        @endif " wire:click="selectCategory({{ $getCategorieFilter->id }})"
                                           data-bs-toggle="tab"
                                           href="#category_filter_{{ $loop->index + 1 }}">{{ $getCategorieFilter->title }}</a>
                                    </li>
                                @endforeach
                                {{-- <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#snack">Snack & Spices</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#fruit">Fruits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#veg">Vegetables</a>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-minus-24">
                <div class="col">
                    <div class="tab-content">
                        <!-- 1st Tag tab start -->
                        <!-- 2nd Tag tab start -->
                        @foreach ($this->getCategoriesFilter as $getCategorieFilter)
                            <div class="tab-pane @if ($categorieFilterTab == $loop->index + 1)
                           fade active show
                        @endif" id="category_filter_{{ $loop->index + 1 }}">
                                <div class="row">
                                    @foreach ($this->newArriavalProducts as $newArriavalProduct)
                                        <div class="col-xl-3 col-md-4 col-6 mb-24 bb-product-box" data-aos="fade-up"
                                             data-aos-duration="1000" data-aos-delay="200">
                                            <div class="bb-pro-box">
                                                <div class="bb-pro-img">
                                            <span class="flags">
                                                @foreach ($newArriavalProduct->labels as $label)
                                                    <span>{{ $label->title }}</span>
                                                @endforeach
                                            </span>
                                                    <a href="javascript:void(0)">
                                                        <div class="inner-img">
                                                            <img class="main-img"
                                                                 src="{{ $newArriavalProduct->getMainImage() }}"
                                                                 alt="product-1">
                                                            <img class="hover-img"
                                                                 src="
                                                            @if (empty($newArriavalProduct->getGalleryImages()[0]))
                                                            {{ $newArriavalProduct->getMainImage() }}
                                                            @else
                                                            {{ $newArriavalProduct->getGalleryImages()[0] }}
                                                            @endif
                                                        "
                                                                 alt="product-1">
                                                        </div>
                                                    </a>
                                                    <ul class="bb-pro-actions">
                                                        <li class="bb-btn-group">
                                                            <a href="javascript:void(0)" title="Wishlist">
                                                                <i class="ri-heart-line"></i>
                                                            </a>
                                                        </li>
                                                        <li class="bb-btn-group">
                                                            <a href="javascript:void(0)" data-link-action="quickview"
                                                               title="Quick View" data-bs-toggle="modal"
                                                               data-bs-target="#bry_quickview_modal">
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
                                                        <a href="shop-left-sidebar-col-3.html">{{ $newArriavalProduct->categories()->first()->title }}</a>
                                                        <span class="bb-pro-rating">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-line"></i>
                                                </span>
                                                    </div>
                                                    <h4 class="bb-pro-title"><a
                                                                href="product-left-sidebar.html">{{ $newArriavalProduct->title }}</a>
                                                    </h4>
                                                    <div class="bb-price">
                                                        <div class="inner-price">
                                                            <span class="new-price">{{ $newArriavalProduct->price }}</span>
                                                            {{-- <span class="old-price">$22</span> --}}
                                                        </div>
                                                        {{-- <span class="last-items">500g</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                @foreach ($this->underNewArraivalBanners as $banner)
                    <div class="col-lg-3 col-md-6 col-12 mb-24" data-aos="flip-up" data-aos-duration="1000"
                         data-aos-delay="200">
                        <div class="bb-services-box">
                            <div class="services-img">
                                <img src="{{ $banner->getImage() }}" alt="services-1">
                            </div>
                            <div class="services-contact">
                                <h4>{{ $banner->title }}</h4>
                                <p>{!! $banner->description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Vendors -->
    <section class="section-vendors padding-t-50 padding-b-100">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12">
                    <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                         data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">Top <span>Products</span></h2>
                            <p>Discover Our Trusted Partners: Excellence & Reliability in Every choice</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000"
                     data-aos-delay="200">
                    <div class="bb-vendors-img">
                        <div class="tab-content">
                            @foreach ($this->topProducts as $product)
                                <div class="tab-pane fade @if ($selectedTab == $loop->index + 1 || $loop->first)
                                    show active
                            @endif" id="vendors_tab_{{ $loop->index + 1 }}">
                                    <a href="javascript:void(0)" class="bb-vendor-init">
                                        <i class="ri-arrow-right-up-line"></i>
                                    </a>
                                    <img src="{{ $product->getMainImage() }}" alt="vendors-img-{{ $loop->index + 1 }}">
                                    <div class="vendors-local-shape">
                                        <div class="inner-shape"></div>
                                        <img src="{{ $product->getGalleryImages()[0] ?? $product->getMainImage() }}"
                                             alt="vendor">
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12 mb-24">
                    <ul class="bb-vendors-tab-nav nav">
                        @foreach ($this->topProducts as $product)
                            <li class="nav-item" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                                <a class="nav-link @if ($loop->first)
                                active
                            @endif" data-bs-toggle="tab" href="#vendors_tab_{{ $loop->index + 1 }}">
                                    <div class="bb-vendors-box">
                                        <div class="inner-heading">
                                            <h5>{{ $product->title }}</h5>
                                            {{-- <span>Sales - 587</span> --}}
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</p>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- <!-- Testimonials -->
    <section class="section-testimonials padding-tb-100 p-0-991">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bb-testimonials" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="400">
                        <img src="{{ asset('images/testimonials/img-1.png') }}" alt="testimonials-1"
                            class="testimonials-img-1">
                        <img src="{{ asset('images/testimonials/img-2.png') }}" alt="testimonials-2"
                            class="testimonials-img-2">
                        <img src="{{ asset('images/testimonials/img-3.png') }}" alt="testimonials-3"
                            class="testimonials-img-3">
                        <img src="{{ asset('images/testimonials/img-4.png') }}" alt="testimonials-4"
                            class="testimonials-img-4">
                        <img src="{{ asset('images/testimonials/img-5.png') }}" alt="testimonials-5"
                            class="testimonials-img-5">
                        <img src="{{ asset('images/testimonials/img-6.png') }}" alt="testimonials-6"
                            class="testimonials-img-6">
                        <div class="inner-banner">
                            <h4>Testimonials</h4>
                        </div>
                        <div class="owl-carousel testimonials-slider">
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="{{ asset('images/testimonials/1.jpg') }}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/1.jpg') }}"
                                                    alt="testimonials">
                                                <div class="detail">
                                                    <h4>Isabella Oliver</h4>
                                                    <span>(Manager)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="{{ asset('images/testimonials/2.jpg') }}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/2.jpg') }}"
                                                    alt="testimonials">
                                                <div class="detail">
                                                    <h4>Nikki Albart</h4>
                                                    <span>(Team Leader)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="{{ asset('images/testimonials/3.jpg') }}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/3.jpg') }}"
                                                    alt="testimonials">
                                                <div class="detail">
                                                    <h4>Stephen Smith</h4>
                                                    <span>(Co Founder)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Instagram -->
    <section class="section-instagram padding-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    {{-- <div class="bb-title">
                        <h3>#Insta</h3>
                    </div> --}}
                    <div class="bb-instagram-slider owl-carousel">
                        @foreach ($this->getBrands as $brand)
                            <div class="bb-instagram-card"
                                 data-aos-delay="200">
                                <div class="">
                                    <a href="javascript:void(0)">
                                        <img src="{{ $brand->getImage()}}" alt="instagram-1">
                                    </a>
                                </div>
                                <div>
                                    <p class="text-center text-bold">{{ $brand->title }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
