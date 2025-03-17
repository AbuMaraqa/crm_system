@php use Modules\Shop\Entities\Tag;use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp
<div class="product-details-page">
    <!-- page title -->
    <section class="page-title-inner" data-bg-img='{{ asset('frontend-assets/images/page-titlebg.png') }}'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page title inner -->
                    <div class="page-title-wrap">
                        <div class="page-title-heading">
                            <h1 class="h2">
                                {{ __('Tag Details') }}
                                <span>
                                    {{ __('Tag Details') }}
                                </span>
                            </h1>
                        </div>

                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="{{ route('frontside.homepage') }}">
                                    {{ __('Home Page') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('frontside.shop') }}">
                                    {{ __('Shop') }}
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    {{ $this->product->getTitle() }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End of page title inner -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of page title -->

    <!-- product details wrapper -->
    <section class="pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <!-- Start shop product slider -->
                    <div class="shop-product-slider-wrap">
                        <!-- Start shop slider top side -->
                        <div class="swiper-container product-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img id="zoom_01" class='zoom product-details-image'
                                         src="{{ $this->product->getMainImage() }}"
                                         data-zoom-image="{{ $this->product->getMainImage() }}" data-rjs="2"
                                         alt="image">
                                </div>
                                @foreach($this->product->getGalleryImages() as $image)
                                    <div class="swiper-slide">
                                        <img id="zoom_01" class='zoom product-details-image' src="{{ $image }}"
                                             data-zoom-image="{{ $image }}" data-rjs="2" alt="image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End of shop slider top side -->

                        <!-- Start shop slider bottom side -->
                        <div class="swiper-container product-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img class="product-details-thumb" src="{{ $this->product->getMainImage() }}"
                                         data-rjs="2" alt="thumb">
                                </div>
                                @foreach($this->product->getGalleryImages() as $image)
                                    <div class="swiper-slide">
                                        <img class="product-details-thumb" src="{{ $image }}" data-rjs="2" alt="thumb">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End of shop slider bottom side -->
                    </div>
                    <!-- End of shop product slider -->
                </div>

                <div class="col-md-6">
                    <!-- product details inner -->
                    <div class="product-details-inner">
                        <!-- product info -->
                        <div class="product-info">
                            <div class="product-rating">
                                <div class="star-rating">
                                    <span></span>
                                </div>
                            </div>

                            <!-- product title -->
                            <div class="product-title">
                                <h2><a href="#">{{ $this->product->getTitle() }}</a></h2>
                            </div>
                            <!-- end of product title -->

                            <div class="product-price">
                                <h3 class="new-price">{{ $this->product->price }}</h3>
                            </div>

                            <div class="product-description">
                                {!! $this->product->description !!}
                            </div>

                            <!-- product mata -->
                            <div class="product_meta item-product-meta-info">
                                <span class="sku_wrapper">
                                    <label>
                                        SKU:
                                        <span>{{ $this->product->sku }}</span>
                                    </label>
                                </span>
                                <span class="posted_in">
                                    <span class="meta-item-list">
                                        @foreach($this->product->categories as $category)
                                            <a href="#">
                                                {{ $category->getTitle() }}
                                            </a>
                                            @if(!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </span>
                                </span>
                            </div>
                            <!-- End of product mata -->
                        </div>
                        <!-- End of product info -->
                    </div>
                    <!-- End of product details inner -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12">
                            <!-- product details tab -->
                            <div class="product-details-tab-inner">
                                <div class="product-details-nav">
                                    <nav class="nav text-center">
                                        <a id="nav-dis-tab" data-toggle="tab" href="#dis" class="active">
                                            {{ __('Description') }}
                                        </a>
                                    </nav>
                                </div>
                            </div>
                            <!-- End of product details tab -->
                        </div>
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <!-- product details tab Contaent-->
                                    <div class="tab-content single-product-tab">
                                        <div class="tab-pane fade show active" id="dis" role="tabpanel"
                                             aria-labelledby="nav-dis-tab">
                                            <!-- description inner -->
                                            <div class="description-inner">
                                                {!! $this->product->content !!}
                                            </div>
                                            <!-- End of description inner -->
                                        </div>
                                    </div>
                                    <!--End of product details tab Contaent-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!--kinen related products heading -->
                            <div class="related-product-heading text-center">
                                <h2>
                                    {{ __('Related Products') }}
                                </h2>
                            </div>
                            <!--End of kinen related products heading -->
                        </div>
                        @foreach($this->relatedProducts as $product)
                            <div class="col-sm-6 col-12 col-xl-3">
                                <!-- single product -->
                                <div class="single-product">
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <!-- Tag Image -->
                                            <div class="product-image related-product">
                                                <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                    <img class='normal-state' data-rjs="2"
                                                         src="{{ $product->getMainImage() }}" alt="">
                                                </a>
                                            </div>
                                            <!-- End of Tag Image -->

                                            <!-- product title -->
                                            <div class="product-title">
                                                <h4>
                                                    <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                        {{ $product->getTitle() }}
                                                    </a>
                                                </h4>
                                            </div>
                                            <!-- end of product title -->
                                        </div>

                                        <!-- product info -->
                                        <div class="product-info">
                                            <div class="product-price">
                                                <h5>
                                                    {{ $product->price }}
                                                </h5>
                                            </div>
                                            <div class="product-rating">
                                                <div class="star-rating">
                                                    <span></span>
                                                </div>
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
                <div class="col-lg-3">
                    <aside>
                        <!--Single sidebar widget -->
                        <div class="single-sidebar-widget mb-60 pt-100">
                            <!-- widget title -->
                            <div class="widget-title">
                                <h4>
                                    {{ __('New Products') }}
                                </h4>
                            </div>
                            <!--End of widget title -->
                            <div class="new-product-item">
                                <ul class="list-unstyled mb-0">
                                    @foreach($this->newProducts as $product)
                                        <!-- single new product -->
                                        <li>
                                            <div class="new-product-wrap media">
                                                <div class="new-produt-image">
                                                    <img src="{{ $product->getMainImage() }}" alt="image">
                                                </div>
                                                <div class="product-img-caption media-body">
                                                    <h5>
                                                        <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                            {{ $product->getTitle() }}
                                                        </a>
                                                    </h5>
                                                    <h6>
                                                        {{ $product->price }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                        <!--End of single new product -->
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!--End of Single sidebar widget -->
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End of product details wrapper -->
</div>
