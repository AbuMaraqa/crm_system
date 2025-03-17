<!-- footer area -->
<footer class="bb-footer margin-t-50">
    <div class="footer-container">
        <div class="footer-top padding-tb-50">
            <div class="container">
                <div class="row m-minus-991" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="col-sm-12 col-lg-3 bb-footer-cat">
                        <div class="bb-footer-widget bb-footer-company">
                            <img src="{{ $logoUrl }}" class="bb-footer-logo" alt="footer logo">
                            <img src="{{ asset('images/logo/logo-dark.png') }}" class="bb-footer-dark-logo" alt="footer logo">
                            <p class="bb-footer-detail">
                                {!! $description !!}
                            </p>
                            {{-- <div class="bb-app-store">
                                <a href="javascript:void(0)" class="app-img">
                                    <img src="{{ asset('images/app/android.png') }}" class="adroid" alt="apple">
                                </a>
                                <a href="javascript:void(0)" class="app-img">
                                    <img src="{{ asset('images/app/apple.png') }}" class="apple" alt="apple">
                                </a>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 bb-footer-info">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading">Category</h4>
                            <div class="bb-footer-links bb-footer-dropdown">
                                <ul class="align-items-center">
                                    @foreach ($categories as $category)
                                        <li class="bb-footer-link">
                                            <a href="shop-left-sidebar-col-3.html">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 bb-footer-account">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading">Company</h4>
                            <div class="bb-footer-links bb-footer-dropdown">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link">
                                        <a href="{{ route('frontside.about-us') }}">About us</a>
                                    </li>
                                    {{-- <li class="bb-footer-link">
                                        <a href="track-order.html">Delivery</a>
                                    </li> --}}
                                    {{-- <li class="bb-footer-link">
                                        <a href="faq.html">Legal Notice</a>
                                    </li> --}}
                                    <li class="bb-footer-link">
                                        <a href="{{ route('frontside.terms_and_conditions') }}">Terms & conditions</a>
                                    </li>
                                    {{-- <li class="bb-footer-link">
                                        <a href="checkout.html">Secure payment</a>
                                    </li> --}}
                                    <li class="bb-footer-link">
                                        <a href="{{ route('frontside.contact-us') }}">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-3 bb-footer-cont-social">
                        <div class="bb-footer-contact">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading">Contact</h4>
                                <div class="bb-footer-links bb-footer-dropdown">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link bb-foo-location">
                                            <span class="mt-15px">
                                                <i class="ri-map-pin-line"></i>
                                            </span>
                                            <p>{!! $address !!}</p>
                                        </li>
                                        <li class="bb-footer-link bb-foo-call">
                                            <span>
                                                <i class="ri-whatsapp-line"></i>
                                            </span>
                                            <a href="tel:+009876543210">{{ $whats_app }}</a>
                                        </li>
                                        <li class="bb-footer-link bb-foo-mail">
                                            <span>
                                                <i class="ri-mail-line"></i>
                                            </span>
                                            <a href="mailto:example@email.com">{{ $email }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bb-footer-social">
                            <div class="bb-footer-widget">
                                <div class="bb-footer-links bb-footer-dropdown">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link">
                                            <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="bb-footer-link">
                                            <a href="javascript:void(0)"><i class="ri-twitter-fill"></i></a>
                                        </li>
                                        <li class="bb-footer-link">
                                            <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                        <li class="bb-footer-link">
                                            <a href="javascript:void(0)"><i class="ri-instagram-line"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="bb-bottom-info">
                        <div class="footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="bb-copy">Copyright © <span id="copyright_year"></span>
                                    <a class="site-name" href="https://www.paltechhub.com/" target="_blank">PalTech Hub</a> all rights reserved.
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom-right">
                            {{-- <div class="footer-bottom-payment d-flex justify-content-center">
                                <div class="payment-link">
                                    <img src="{{ asset('images/payment/payment.png') }}" alt="payment">
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End of footer area -->
