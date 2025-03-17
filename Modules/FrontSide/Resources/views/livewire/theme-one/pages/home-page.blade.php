@php use Mcamara\LaravelLocalization\Facades\LaravelLocalization;use Modules\Shop\Entities\Tag;use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp

<div class="home-page">
    <!-- banner area -->
    <section class="banner-slider">
        <div class="slider-inner-wrap">
            <div class="owl-carousel banner-carousel1">
                @foreach($this->mainSlider as $product)
                    <!-- single slider wrap -->
                    <div class="single-slider-wrap"
                         data-bg-img='{{ asset('frontend-assets/images/banner/bannar3-img1.png') }}'>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="banner-image" data-trigger="parallax_layers">
                                        <img src="{{ $product->getMainImage() }}" alt="" data-depth="0.5">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <!-- slider text -->
                                    <div class="single-slider-text">
                                        <h1>
                                            {{ $product->getTitle() }}
                                        </h1>
                                        <p>
                                            {{ $product->description }}
                                        </p>
                                        <a href="{{ route('frontside.shop') }}" class="btn">
                                            {{ __('Browse All') }}
                                        </a>
                                    </div>
                                    <!-- End of slider text -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single slider wrap -->
                @endforeach
            </div>
        </div>
    </section>
    <!-- End of banner area -->

    <!-- featured categories section -->
    <section class="pt-100">
        <div class="insta-feed-wrap">
            <div class="section-title-wrap type3">
                <div class="section-title">
                    <h2>{{ __('Featured Categories') }}
                        <span>{{ __('Featured Categories') }}</span>
                    </h2>
                </div>
            </div>
            <div class="insta-feed-inner">
                <div class="owl-carousel insta-feed-carousel owl-theme">
                    @foreach($this->categories as $category)
                        <div class="single-carousel-inner cursor-pointer">
                            <a href="#" class="cursor-pointer">
                                <span class="image-wrap">
                                    <img src="{{ $category->getImage() }}" alt="{{ $category->getTitle() }}">
                                </span>
                            </a>
                            <h5 class="fw-medium cursor-pointer text-center mt-2">{{ $category->getTitle() }}</h5>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End of featured categories section -->

    <!-- New Arrival -->
    <section class="pt-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- section title -->
                    <div class="section-title-wrap">
                        <div class="section-title">
                            <h2>
                                {{ __('New Arrival')}}
                                <span>
                                    {{ __('New Arrival')}}
                                </span>
                            </h2>
                        </div>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
            <div class="row">
                @foreach($this->newArriavalProducts as $product)
                    <div class="col-sm-6 col-12 col-lg-3">
                        <div class="single-product type2">
                            <div class="product-item">
                                <div class="product-thumb">
                                    <!-- Tag Image -->
                                    <div class="product-image">
                                        <a href="{{ route('frontside.product_details', $product->slug) }}">
                                            <img class='normal-state' data-rjs="2" src="{{ $product->getMainImage() }}"
                                                 alt="{{ $product->getTitle() }}">
                                            <img class='hover-state' data-rjs="2" src="{{ $product->getMainImage() }}"
                                                 alt="{{ $product->getTitle() }}">
                                        </a>
                                    </div>
                                    <!-- End of Tag Image -->
                                </div>

                                <!-- product info -->
                                <div class="product-info">
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <span></span>
                                        </div>
                                    </div>

                                    <!-- product title -->
                                    <div class="product-title">
                                        <h4>
                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                {{ $product->getTitle() }}
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- end of product title -->

                                    <div class="product-price">
                                        <h5>
                                            ${{ $product->price }}
                                        </h5>
                                    </div>
                                </div>
                                <!-- End of product info -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End of New Arrival -->

    <!-- Featured Products -->
    <section class="pt-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="single-catagory-title type2">
                                <div class="catagory-title-wrap">
                                    <h2>
                                        {{ __('Featured Products') }}
                                        <span>
                                            {{ __('Featured Products') }}
                                        </span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($this->featuredProducts as $product)
                        @if($loop->even)
                            <div class="single-category-wrap left-content type2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="single-sub-category">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="category-image hover-effect">
                                                        <img src="{{ !empty($product->getGalleryImages()) ? $product->getGalleryImages()[0] : $product->getMainImage() }}"
                                                             data-rjs="2"
                                                             alt="image-1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="category-image hover-effect">
                                                        <img src="{{ !empty($product->getGalleryImages()) ? $product->getGalleryImages()[1] : $product->getMainImage() }}"
                                                             data-rjs="2"
                                                             alt="image-2">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-category-content">
                                                        <h2>
                                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                                {{ $product->getTitle() }}
                                                            </a>
                                                        </h2>
                                                        <a href="{{ route('frontside.product_details', $product->slug) }}"
                                                           class="btn">
                                                            {{ __('View Details') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="category-image hover-effect">
                                            <img src="{{ $product->getMainImage() }}" data-rjs="2"
                                                 alt="{{ $product->getTitle() }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="single-category-wrap type2">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="category-image hover-effect">
                                            <img src="{{ $product->getMainImage() }}" data-rjs="2"
                                                 alt="{{ $product->getTitle() }}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="single-sub-category">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="category-image hover-effect">
                                                        <img src="{{ !empty($product->getGalleryImages()) ? $product->getGalleryImages()[0] : $product->getMainImage() }}"
                                                             data-rjs="2"
                                                             alt="image-1">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="category-image hover-effect">
                                                        <img src="{{ !empty($product->getGalleryImages()) ? $product->getGalleryImages()[1] : $product->getMainImage() }}"
                                                             data-rjs="2"
                                                             alt="image-2">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="single-category-content">
                                                        <h2>
                                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                                {{ $product->getTitle() }}
                                                            </a>
                                                        </h2>
                                                        <a href="{{ route('frontside.product_details', $product->slug) }}"
                                                           class="btn">
                                                            {{ __('View Details') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End of  Featured Products  -->

    <!-- top sellers type2-->
    <section class="pt-100">
        <div class="container">
            <div class="row">
                <div class="col">
                    <!-- section title -->
                    <div class="section-title-wrap">
                        <div class="section-title">
                            <h2>
                                {{ __('Best Sellers') }}
                                <span>
                                    {{ __('Best Sellers') }}
                                </span>
                            </h2>
                        </div>
                    </div>
                    <!-- End of section title -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-lg-12">
                    <div class="row">
                        @foreach($this->bestSellerProducts as $product)
                            <div class="col-lg-4">
                                <div class="single-top-seller type2 main-parent media">
                                    <div class="top-seller-img normal-hover-parent">
                                        <img class="normal-state" src="{{ $product->getMainImage() }}"
                                             alt="{{ $product->getTitle() }}" width="160px" height="160px">
                                    </div>
                                    <div class="single-seller-body media-body">
                                        <div class="product-rating">
                                            <div class="star-rating">
                                                <span></span>
                                            </div>
                                        </div>
                                        <h5>
                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                {{ $product->getTitle() }}
                                            </a>
                                        </h5>
                                        <h6 class="h5">
                                            ${{ $product->price }}
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of top sellers type2-->

    <!-- Top Products -->
    <section class="pt-100">
        <!-- shop content wrap -->
        <div class="container">
            <div class="row isotope">
                @foreach($this->topProducts as $product)
                    <div class="col-md-4 col-sm-6 coll-12 grid-item">
                        @if($loop->index == 1)
                            <div class="row">
                                <div class="col">
                                    <!-- section title -->
                                    <div class="section-title-wrap type3">
                                        <div class="section-title">
                                            <h2>{{ __('Top Products') }}<span>{{ __('TopProducts') }}</span></h2>
                                        </div>
                                    </div>
                                    <!-- End of section title -->
                                </div>
                            </div>
                        @endif
                        <!-- single product -->
                        <div class="single-product type2">
                            <div class="product-item mr-50">
                                <div class="product-thumb">
                                    <!-- Tag Image -->
                                    <div class="product-image top-product-image-wrap">
                                        <a href="{{ route('frontside.product_details', $product->slug) }}">
                                            <img class='normal-state' data-rjs="2"
                                                 src="{{ $product->getMainImage() }}" alt="{{ $product->getTitle() }}">
                                        </a>
                                    </div>
                                    <!-- End of Tag Image -->
                                </div>

                                <!-- product info -->
                                <div class="product-info">
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <span></span>
                                        </div>
                                    </div>

                                    <!-- product title -->
                                    <div class="product-title">
                                        <h4>
                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                {{ $product->getTitle() }}
                                            </a>
                                        </h4>
                                    </div>
                                    <!-- end of product title -->

                                    <div class="product-price">
                                        <h5>
                                            ${{ $product->price }}
                                        </h5>
                                    </div>
                                </div>
                                <!-- End of product info -->
                            </div>
                        </div>
                        <!-- End of single product -->
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End of shop content wrap -->
    </section>
    <!-- End of Top Products  -->

    <!-- About area -->
    <section class="pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="about-area-inner">
                        <div class="about-header">
                            <span>
                                {{ __('About Us')}}
                            </span>
                            <h3>
                                {{ __('Best Brand Best Quality')}}
                            </h3>
                        </div>
                        <p>
                            {{ __('About Company 1') }}
                        </p>
                        <p>
                            {{ __('About Company 2') }}
                        </p>
                        <p>
                            {{ __('About Company 3') }}
                        </p>

                        <a href="{{ route('frontside.about-us') }}">
                            {{ __('More About Us')}}
                            <span>
                                <i class="@if(LaravelLocalization::getCurrentLocale() == 'ar') fa fa-angle-left @else fa fa-angle-right @endif"></i>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="about-image-inner">
                        <div class="about-image">
                            <img src="{{ asset('frontend-assets/images/featuerd/about1.png') }}" width="350px"
                                 height="240px" alt=""
                                 class="about-image1">
                            <img src="{{ asset('frontend-assets/images/featuerd/about2.png') }}" width="255px"
                                 height="180px" alt=""
                                 class="about-image2">
                            <img src="{{ asset('frontend-assets/images/featuerd/about3.png') }}" width="255px"
                                 height="180px" alt=""
                                 class="about-image3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of About area -->
</div>
