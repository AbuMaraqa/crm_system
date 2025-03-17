<div class="about-us-page">
    <!-- page title -->
    <section class="page-title-inner" data-bg-img='{{ asset('frontend-assets/images/page-titlebg.png') }}'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page title inner -->
                    <div class="page-title-wrap">
                        <div class="page-title-heading">
                            <h1 class="h2">
                               {{ __('Who We Are') }}
                                <span>
                                    {{ __('About Us') }}
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
                                    {{ __('About Us') }}
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

    <!-- about us  -->
    <section class="pt-100 pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <!-- about us intro -->
                    <div class="about-us-intro text-center">
                        <!-- intro heading -->
                        <div class="intro-heading">
                            <h2>
                                {{ __('Our Profile') }}
                            </h2>
                        </div>
                        <!-- intro heading -->

                        <!-- intro text -->
                        <div class="intro-text-inner">
                            <p>
                                {{ __("About Company 1") }}
                            </p>
                            <p>
                                {{ __("About Company 2") }}
                            </p>
                        </div>
                        <!--End of intro text -->
                    </div>
                    <!-- about us intro -->
                </div>
                <div class="col-12">
                    <!-- about image inner -->
                    <div class="about-image-inner type2">
                        <div class="row">
                            <div class="col-sm-6 about-image img1">
                                <!-- about image -->
                                <img src="{{ asset('frontend-assets/images/featuerd/about1.png') }}" width="540px" height="350px" data-rjs="2" alt="">
                                <!-- End of about image -->
                            </div>
                            <div class="col-sm-5 offset-sm-1 about-image img2">
                                <!-- about image -->
                                <img src="{{ asset('frontend-assets/images/featuerd/about2.png') }}" width="445px" height="350px" data-rjs="2" alt="">
                                <!-- End of about image -->
                            </div>
                            <div class="col-sm-5 offset-sm-5 about-image img3">
                                <!-- about image -->
                                <img src="{{ asset('frontend-assets/images/featuerd/about3.png') }}" width="445px" height="315px" data-rjs="2" alt="">
                                <!-- End of about image -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="about-our-goal">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="about-our-mision-inner ceo-discription-inner">
                                    <p>
                                        {{ __("About Company 3") }}
                                    </p>
                                    <p>
                                        {{ __("About Company 4") }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about-our-principles-inner ceo-discription-inner">
                                    <blockquote>
                                        “{{ __("About Company 5") }}”
                                    </blockquote>
                                    <p>
                                        {{ __("About Company 6") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of about us  -->
</div>
