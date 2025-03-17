@php use Modules\Shop\Entities\Tag;use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp
<div class="product-details-page">
    <!-- product page -->
    <section class="section-product padding-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bb-single-pro">
                        <div class="row">
                            <div class="col-lg-5 col-12 mb-24">
                                <div class="single-pro-slider">
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="{{ $this->product->getMainImage() }}"
                                                 alt="product-1">
                                        </div>
                                        {{-- <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="assets/img/new-product/2.jpg"
                                                alt="product-2">
                                        </div>
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="assets/img/new-product/3.jpg"
                                                alt="product-3">
                                        </div>
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="assets/img/new-product/4.jpg"
                                                alt="product-4">
                                        </div>
                                        <div class="single-slide zoom-image-hover">
                                            <img class="img-responsive" src="assets/img/new-product/5.jpg"
                                                alt="product-5">
                                        </div> --}}
                                    </div>
                                    {{-- <div class="single-nav-thumb">
                                        <div class="single-slide">
                                            <img class="img-responsive" src="assets/img/new-product/1.jpg"
                                                alt="product-1">
                                        </div>
                                        <div class="single-slide">
                                            <img class="img-responsive" src="assets/img/new-product/2.jpg"
                                                alt="product-2">
                                        </div>
                                        <div class="single-slide">
                                            <img class="img-responsive" src="assets/img/new-product/3.jpg"
                                                alt="product-3">
                                        </div>
                                        <div class="single-slide">
                                            <img class="img-responsive" src="assets/img/new-product/4.jpg"
                                                alt="product-4">
                                        </div>
                                        <div class="single-slide">
                                            <img class="img-responsive" src="assets/img/new-product/5.jpg"
                                                alt="product-5">
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="col-lg-7 col-12 mb-24">
                                <div class="bb-single-pro-contact">
                                    <div class="bb-sub-title">
                                        <h4>{{ $this->product->title }}</h4>
                                    </div>
                                    <div class="bb-single-rating">
                                        <span class="bb-pro-rating">
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-fill"></i>
                                            <i class="ri-star-line"></i>
                                        </span>
                                        <span class="bb-read-review">
                                            |&nbsp;&nbsp;<a href="#bb-spt-nav-review">992 Ratings</a>
                                        </span>
                                    </div>
                                    <p>
                                        {{ $this->product->description }}
                                    </p>
                                    <div class="bb-single-price-wrap">
                                        <div class="bb-single-price">
                                            <div class="price">
                                                <h5>${{ $this->product->price }} <span></span></h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bb-single-qty">
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" type="text" name="bb-qtybtn" value="1">
                                        </div>
                                        <div class="buttons">
                                            <a href="javascript:void(0)" class="bb-btn-2">View Cart</a>
                                        </div>
                                        <ul class="bb-pro-actions">
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)">
                                                    <i class="ri-heart-line"></i>
                                                </a>
                                            </li>
                                            <li class="bb-btn-group">
                                                <a href="javascript:void(0)" data-link-action="quickview"
                                                   title="Quick view" data-bs-toggle="modal"
                                                   data-bs-target="#bry_quickview_modal">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
