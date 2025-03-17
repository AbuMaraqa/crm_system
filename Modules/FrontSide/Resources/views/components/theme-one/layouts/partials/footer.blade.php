<!-- footer area -->
<footer class="footer-type3 pt-50">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- footer widget -->
                <div class="col-md-6 col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <div class="footer-logo">
                            <a href="{{ route('frontside.homepage') }}">
                                <img src="{{ $logoUrl }}" data-rjs="2" alt="{{ config('app.name') }}" width="100px">
                            </a>
                        </div>
                        <div class="footer-about-text">
                            <p>
                                {{ __("About Company 1") }}
                            </p>
                        </div>
                    </div>
                </div>
                <!-- End of footer widget -->

                <!-- footer widget -->
                <div class="col-md-6 col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <!-- footer Widget heading -->
                        <div class="footer-header">
                            <h5>
                                {{ __('Pages') }}
                            </h5>
                        </div>
                        <!--End of footer Widget heading -->
                        <div class="footer-links">
                            <ul class="links-list list-unstyled mb-0">
                                <li>
                                    <a href="{{ route('frontside.shop') }}">
                                        {{ __('Shop') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('frontside.categories') }}">
                                        {{ __('Categories') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('frontside.about-us') }}">
                                        {{ __('About Us') }}
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ route('frontside.contact-us') }}">
                                        {{ __('Contact Us') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End of footer widget -->

                <!-- footer widget -->
                <div class="col-md-6 col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <!-- footer Widget heading -->
                        <div class="footer-header">
                            <h5>
                                {{ __('Contact Us') }}
                            </h5>
                        </div>
                        <!--End of footer Widget heading -->
                        <div class="footer-contact-wrap">
                            <ul class="footer-contact-list list-unstyled mb-0">
                                <li>
                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                    Building 5, Xishan Home, Xishan Street, Ouhai District, Wenzhou City
                                    Zhou Hui 13780178413
                                </li>
                                <li>
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                    <a href="mailto:info@beedent.net">
                                        {{ __('Email') }}: info@beedent.net
                                    </a>
                                </li>
                                <li>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i></span>
                                    <a href="">
                                        {{ __('Phone') }}: </a>
                                </li>
                            </ul>
                        </div>
                        <!-- footer social area -->
                        {{--                        <div class="footer-social-area">--}}
                        {{--                            <ul class="list-unstyled mb-0">--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#"><i class="fa fa-facebook"></i></a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#"><i class="fa fa-twitter"></i></a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#"><i class="fa fa-pinterest"></i></a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#"><i class="fa fa-linkedin"></i></a>--}}
                        {{--                                </li>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="#"><i class="fa fa-google-plus"></i></a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        <!-- End of footer social area -->
                    </div>
                </div>
                <!-- End of footer widget -->
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom-wrap">
                        <!-- copyright text -->
                        <div class="copyright-text">
                            <p>
                                &copy;&nbsp;{{ __('Copyright') }} {{ date('Y') }}
                                <a href="https://paltechhub.com/" target="_blank">
                                    &nbsp;
                                    {{ __("Paltech Hub") }}
                                </a>.
                                {{ __('All Rights Reserved') }}.
                            </p>
                        </div>
                        <!-- End of copyright text -->

                        <!-- tarms and condition -->
                        <div class="trams-conditaion">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="{{ route('frontside.privacy_policy') }}">
                                        {{ __('Privacy Policy') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('frontside.terms_and_conditions') }}">
                                        {{ __('Terms & Conditions') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End of tarms and condition -->
                    </div>

                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of footer area -->
