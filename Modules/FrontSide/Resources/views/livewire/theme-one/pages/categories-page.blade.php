@php use Modules\Shop\Entities\ProductCategory; @endphp
@php
    /**
     * @var ProductCategory $category
     */
@endphp
<div class="categories-page">
    <!-- page title -->
    <section class="page-title-inner" data-bg-img='{{ asset('frontend-assets/images/page-titlebg.png') }}'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page title inner -->
                    <div class="page-title-wrap">
                        <div class="page-title-heading">
                            <h1 class="h2">
                                {{ __('Categories') }}
                                <span>
                                    {{ __('Featured') }}
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
                                    {{ __('Categories') }}
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

    <section class="pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            @foreach($this->categories as $category)
                                <div class="swiper-slide">
                                    <div class="single-collection-wrap type4">
                                        <div class="row align-items-center">
                                            <div class="col-md-9">
                                                <div class="collection-image image-wrap">
                                                    <img src="{{ $category->getImage() }}" data-rjs='2'
                                                         alt="{{ $category->getTitle() }}">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="image-caption">
                                                    <h2>
                                                        <a href="javascript:void(0)">
                                                            {{ $category->getTitle() }}
                                                        </a>
                                                    </h2>
                                                    <p>
                                                        {!! $category->description !!}
                                                    </p>
                                                </div>
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

        <div class="swiper-container gallery-thumbs">
            <div class="swiper-wrapper">
                @foreach($this->categories as $category)
                    <div class="swiper-slide">
                        <div class="collection-image image-thumb cursor-pointer">
                            <img src="{{ $category->getImage() }}" data-rjs='2'
                                 alt="{{ $category->getTitle() }}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
