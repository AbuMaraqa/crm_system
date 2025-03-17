@php use Modules\Shop\Entities\Tag;use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     * @var Tag $product
     */
@endphp

<div class="shop-page">
    <!-- Shop section -->
    <section class="section-shop padding-b-50 mt-4">
        <div class="container">
            <div class="row">
                <div class="bb-shop-overlay"></div>
                <div class="col-lg-3 col-12 bb-shop-sidebar">
                </div>
                <div class="col-12">
                    <div class="bb-shop-pro-inner">
                        <div class="row mb-minus-24">
                            @foreach ($this->products as $product)
                                <div class="bb-col-5 col-lg-3 col-md-4 col-6 mb-24 bb-product-box pro-bb-content"
                                     data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                                    <div class="bb-pro-box">
                                        <div class="bb-pro-img">
                                        <span class="flags">
                                            <span>{{ $product->labels()->first()->title ?? '' }}</span>
                                        </span>
                                            <a href="{{ route('frontside.product_details', $product->slug) }}">
                                                <div class="inner-img">
                                                    <img class="main-img" src="{{ $product->getMainImage() }}"
                                                         alt="product-1">
                                                    <img class="hover-img" src="@if (empty($product->getGalleryImages()[0])) {{ $product->getMainImage() }}

                                                @else
                                                    {{ $product->getGalleryImages()[0] }}

                                                @endif"
                                                         alt="product-1">
                                                </div>
                                            </a>

                                        </div>
                                        <div class="bb-pro-contact">
                                            <div class="bb-pro-subtitle">
                                                <a href="shop-left-sidebar-col-3.html">{{ $product->categories()->first()->title }}</a>
                                                <span class="bb-pro-rating">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-line"></i>
                                            </span>
                                            </div>
                                            <h4 class="bb-pro-title"><a
                                                        href="product-left-sidebar.html">{{ $product->title }}</a>
                                            </h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                                                consectetur
                                                sit mollitia nihil magnam
                                                perspiciatis eos atque qui cupiditate delectus. Provident totam optio
                                                sapiente nam.</p>
                                            <div class="bb-price">
                                                <div class="inner-price">
                                                    <span class="new-price">$15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $this->products->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
