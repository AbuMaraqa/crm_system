@php use Modules\Shop\Entities\Tag;use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp

<div class="shop-page">
    <!-- page title -->
    <section class="page-title-inner" data-bg-img='{{ asset('frontend-assets/images/page-titlebg.png') }}'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page title inner -->
                    <div class="page-title-wrap">
                        <div class="page-title-heading">
                            <h1 class="h2">
                                {{ __('Shop') }}
                                <span>
                                    {{ __('Shop') }}
                                </span>
                            </h1>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <a href="{{ route('frontside.homepage') }}">
                                    {{ __('Home Page') }}
                                </a>
                            </li>
                            <li class="active">
                                <a href="#">
                                    {{ __('Shop') }}
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

    <!-- product shop wrapper -->
    <section class="pt-100 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- shop toolbar wrap -->
                    <div class="shop-toolbar-wrap type2">
                        <div class="shop-toolbar-filter">
                            <div class="row align-items-center">
                                <div class="col-md-4 position-static">
                                    <!-- product found -->
                                    <div class="product-found product-count">
                                        <span>
                                            {{ __('Showing') }}
                                            {{ $this->products->firstItem() }}
                                            {{ __('to') }}
                                            {{ $this->products->lastItem() }}
                                            {{ __('of') }}
                                            {{ $this->products->total() }}
                                            {{ __('results') }}
                                        </span>
                                    </div>
                                    <!-- End of product found -->
                                </div>
                                <div class="col-md-8 col-lg-7 col-xl-6 offset-xl-2 offset-lg-1 position-static">
                                    <!-- product filter inner -->
                                    <div class="product-filter-inner">
                                        <!-- sort by newest -->
                                        <div class="newest-product">
                                        </div>
                                        <!-- End of sort by newest -->

                                        <!-- product grid view -->
                                        <div class="product-grid-view">
                                            <ul class="nav">
                                                <li>
                                                    <a class="active" id="nav-four-col" data-toggle="tab"
                                                       href="#fourcol">
                                                        <img src="{{ asset('frontend-assets/images/icons/3grid.svg') }}"
                                                             class="svg" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="" id="nav-three-col" data-toggle="tab" href="#threecol">
                                                        <img src="{{ asset('frontend-assets/images/icons/3grid.svg') }}"
                                                             class="svg" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="" id="nav-two-tab" data-toggle="tab" href="#twocol">
                                                        <img src="{{ asset('frontend-assets/images/icons/2grid.svg') }}"
                                                             class="svg" alt="">
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="" id="nav-one-tab" data-toggle="tab" href="#onecol">
                                                        <img src="{{ asset('frontend-assets/images/icons/1grid.svg') }}"
                                                             class="svg" alt="">
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <!-- End of product grid view -->
                                    </div>
                                    <!-- product filter inner -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of shop toolbar wrap -->
                    <div class="row">
                        <div class="col-12">
                            <div class="tab-content shop-tab-content">
                                <div class="tab-pane fade show active" role="tabpanel" id="fourcol"
                                     aria-labelledby="nav-four-col">
                                    <div class="row">
                                        @foreach($this->products as $product)
                                            <div class="col-md-4 col-sm-12 col-lg-3">
                                                <div class="single-product type2">
                                                    <div class="product-item">
                                                        <div class="product-thumb">
                                                            <!-- Tag Image -->
                                                            <div class="product-image">
                                                                <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                                    <img class='normal-state' data-rjs="2"
                                                                         src="{{ $product->getMainImage() }}"
                                                                         alt="{{ $product->getTitle() }}">
                                                                    <img class='hover-state' data-rjs="2"
                                                                         src="{{ $product->getMainImage() }}"
                                                                         alt="{{ $product->getTitle() }}">
                                                                </a>
                                                            </div>

                                                            {{--                                                            @if($product->isNew())--}}
                                                            {{--                                                                <div class="new-product-tag">--}}
                                                            {{--                                                                    <div class="product-tag">--}}
                                                            {{--                                                                        <div class="tag-text">--}}
                                                            {{--                                                                            <span>--}}
                                                            {{--                                                                                {{ __('New') }}--}}
                                                            {{--                                                                            </span>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </div>--}}
                                                            {{--                                                                </div>--}}
                                                            {{--                                                            @endif--}}
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
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            {{ $this->products->links() }}
                            <!-- blog pagination -->
                            {{--                            <div class="blog-pagination-wrap">--}}
                            {{--                                <ul class="pagination blog-pagination list-unstyled">--}}
                            {{--                                    <li class="disabled"><a href="#"><i class="fa fa-angle-left"></i></a></li>--}}
                            {{--                                    <li><a href="#">01</a></li>--}}
                            {{--                                    <li class="active"><a href="#">02</a></li>--}}
                            {{--                                    <li><a href="#">03</a></li>--}}
                            {{--                                    <li><a href="#">04</a></li>--}}
                            {{--                                    <li><a href="#"><i class="fa fa-angle-right"></i></a></li>--}}
                            {{--                                </ul>--}}
                            {{--                            </div>--}}
                            <!-- End of blog pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of product shop wrapper -->
</div>
