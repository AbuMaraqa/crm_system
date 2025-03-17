@php use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     */
@endphp
<div class="categories-page">
    <!-- Category section -->
    <section class="section-category padding-t-50 mb-24">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bb-category-6-colum owl-carousel">
                        @foreach ($this->categories as $category)
                        <div class="bb-category-box category-items-1" data-aos="flip-left" data-aos-duration="1000"
                        data-aos-delay="500">
                        <div class="category-image">
                            <img src="{{ $category->getImage() }}" alt="category">
                        </div>
                        <div class="category-sub-contact">
                            <h5><a href="shop-left-sidebar-col-3.html">{{ $category->title }}</a></h5>
                            <p>{{ $category->products()->count() }}</p>
                        </div>
                    </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-shop padding-b-50">
        <div class="container">
            <div class="row">
                <div class="bb-shop-overlay"></div>
                <div class="col-lg-3 col-12 bb-shop-sidebar">
                    <div class="sidebar-filter-title">
                        <h5>Filters</h5>
                        <a class="filter-close" href="javascript:void(0)">×</a>
                    </div>
                    <div class="bb-shop-wrap">
                        <div class="bb-sidebar-block">
                            <div class="bb-sidebar-title">
                                <h3>Category</h3>
                            </div>
                            <div class="bb-sidebar-contact">
                                <ul>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">clothes</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Bags</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Shoes</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Cosmetics</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Electrics</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Phone</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">Watch</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bb-sidebar-block">
                            <div class="bb-sidebar-title">
                                <h3>Weight</h3>
                            </div>
                            <div class="bb-sidebar-contact">
                                <ul>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">200gm pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">500gm pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">1kg pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">5kg pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <input type="checkbox">
                                            <a href="javascript:void(0)">10kg pack</a>
                                            <span class="checked"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bb-sidebar-block">
                            <div class="bb-sidebar-title">
                                <h3>Color</h3>
                            </div>
                            <div class="bb-color-contact">
                                <ul>
                                    <li class="color-sidebar-active">
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-1"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-2"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-3"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-4"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-5"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-6"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-7"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-8"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-9"></span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bb-sidebar-block-item">
                                            <span class="pro-color-10"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bb-sidebar-block">
                            <div class="bb-sidebar-title">
                                <h3>Price</h3>
                            </div>
                            <div class="bb-price-range">
                                <div class="price-range-slider">
                                    <p class="range-value">
                                        <input type="text" id="amount" readonly>
                                    </p>
                                    <div id="slider-range" class="range-bar"></div>
                                </div>
                            </div>
                        </div>
                        <div class="bb-sidebar-block">
                            <div class="bb-sidebar-title">
                                <h3>Tags</h3>
                            </div>
                            <div class="bb-tags">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0)">Clothes</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Fruits</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Snacks</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Dairy</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Seafood</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Toys</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">perfume</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">jewelry</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">Bags</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bb-shop-pro-inner">
                        <div class="row mb-minus-24">
                            <div class="col-12">
                                <div class="bb-pro-list-top">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="bb-bl-btn">
                                                <button type="button" class="grid-btn btn-filter">
                                                    <i class="ri-equalizer-2-line"></i>
                                                </button>
                                                <button type="button" class="grid-btn btn-grid-100 active">
                                                    <i class="ri-apps-line"></i>
                                                </button>
                                                <button type="button" class="grid-btn btn-list-100">
                                                    <i class="ri-list-unordered"></i>
                                                </button>
                                            </div>
                                        </div>
                                        {{-- <div class="col-6">
                                            <div class="bb-select-inner">
                                                <div class="custom-select">
                                                    <select>
                                                        <option selected disabled>Sort by</option>
                                                        <option value="1">Position</option>
                                                        <option value="2">Relevance</option>
                                                        <option value="3">Name, A to Z</option>
                                                        <option value="4">Name, Z to A</option>
                                                        <option value="5">Price, low to high</option>
                                                        <option value="6">Price, high to low</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>

                            @foreach ($this->products as $product)
                            <div class="bb-col-5 col-lg-3 col-md-4 col-6 mb-24 bb-product-box pro-bb-content"
                            data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="bb-pro-box">
                                <div class="bb-pro-img">
                                    <a href="javascript:void(0)">
                                        <div class="inner-img">
                                            <img class="main-img" src="{{ $product->getMainImage() }}"
                                                alt="product-2">
                                            <img class="hover-img" src="{{ $product->getMainImage() }}"
                                                alt="product-2">
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
                                    <h4 class="bb-pro-title"><a href="product-left-sidebar.html">{{ $product->title }}</a>
                                    </h4>
                                    <p>{{ $product->description }}</p>
                                    <div class="bb-price">
                                        <div class="inner-price">
                                            <span class="new-price">{{ $product->price }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                            {{ $this->products->links() }}
                            {{-- <div class="col-12">
                                <div class="bb-pro-pagination">
                                    <p>Showing 1-12 of 21 item(s)</p>
                                    <ul>
                                        <li class="active">
                                            <a href="javascript:void(0)">1</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">2</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">3</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">4</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" class="next">Next <i
                                                    class="ri-arrow-right-s-line"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
