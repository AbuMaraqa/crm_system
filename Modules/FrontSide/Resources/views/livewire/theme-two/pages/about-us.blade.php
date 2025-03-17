<div class="about-us-page">
    <!-- About -->
    <section class="section-about padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-lg-6 col-12 mb-24">
                    <div class="bb-about-img">
                        <img src="@if (empty($pageDetails->getImage()))
{{ asset('images/about/one.png')}}
                            @else
                            {{ $pageDetails->getImage() }}
                        @endif" alt="about-one">
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-24">
                    <div class="bb-about-contact">
                        <div class="section-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="section-detail">
                                <h2>{{ $pageDetails->title }}</h2>
                            </div>
                        </div>
                        <div class="about-inner-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <h4>{{ $pageDetails->content }}</h4>
                            <p>
                                {!! $pageDetails->description !!}
                            </p>
                        </div>
                        <div class="bb-vendor-rows row mb-minus-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <div class="col-sm-4 mb-24">
                                <div class="bb-vendor-box">
                                    <div class="bb-count">
                                        <h5 class="counter">200 +</h5>
                                    </div>
                                    <div class="inner-text">
                                        <p>vendors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-24">
                                <div class="bb-vendor-box">
                                    <div class="bb-count">
                                        <h5 class="counter">654k +</h5>
                                    </div>
                                    <div class="inner-text">
                                        <p>Sales</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 mb-24">
                                <div class="bb-vendor-box">
                                    <div class="bb-count">
                                        <h5 class="counter">587k +</h5>
                                    </div>
                                    <div class="inner-text">
                                        <p>Customers</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="section-services padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="col-12">
                    <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">Our <span>Services</span></h2>
                            <p>Customer service should not be a department. It should be the entire company.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('images/services/1.png')}}" alt="services-1">
                        </div>
                        <div class="services-contact">
                            <h4>Free Shipping</h4>
                            <p>Free shipping on all Us order or above $200</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('images/services/2.png')}}" alt="services-2">
                        </div>
                        <div class="services-contact">
                            <h4>24x7 Support</h4>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('images/services/3.png')}}" alt="services-3">
                        </div>
                        <div class="services-contact">
                            <h4>30 Days Return</h4>
                            <p>Simply return it within 30 days for an exchange</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                    <div class="bb-services-box">
                        <div class="services-img">
                            <img src="{{ asset('images/services/4.png')}}" alt="services-4">
                        </div>
                        <div class="services-contact">
                            <h4>Payment Secure</h4>
                            <p>Contact us 24 hours a day, 7 days a week</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    {{-- <section class="section-testimonials padding-tb-100 p-0-991">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bb-testimonials" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <img src="{{ asset('images/testimonials/img-1.png')}}" alt="testimonials-1" class="testimonials-img-1">
                        <img src="{{ asset('images/testimonials/img-2.png')}}" alt="testimonials-2" class="testimonials-img-2">
                        <img src="{{ asset('images/testimonials/img-3.png')}}" alt="testimonials-3" class="testimonials-img-3">
                        <img src="{{ asset('images/testimonials/img-4.png')}}" alt="testimonials-4" class="testimonials-img-4">
                        <img src="{{ asset('images/testimonials/img-5.png')}}" alt="testimonials-5" class="testimonials-img-5">
                        <img src="{{ asset('images/testimonials/img-6.png')}}" alt="testimonials-6" class="testimonials-img-6">
                        <div class="inner-banner">
                            <h4>Testimonials</h4>
                        </div>
                        <div class="owl-carousel testimonials-slider">
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="{{ asset('images/testimonials/1.jpg')}}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/1.jpg')}}" alt="testimonials">
                                                <div class="detail">
                                                    <h4>Isabella Oliver</h4>
                                                    <span>(Manager)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="/testimonials/2.jpg')}}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/2.jpg')}}') }}" alt="testimonials">
                                                <div class="detail">
                                                    <h4>Nikki Albart</h4>
                                                    <span>(Team Leader)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bb-testimonials-inner">
                                <div class="row">
                                    <div class="col-md-4 col-12 d-none-767">
                                        <div class="testimonials-image">
                                            <img src="{{ asset('images/testimonials/3.jpg')}}') }}" alt="testimonials">
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <div class="testimonials-contact">
                                            <div class="user">
                                                <img src="{{ asset('images/testimonials/3.jpg')}}') }}" alt="testimonials">
                                                <div class="detail">
                                                    <h4>Stephen Smith</h4>
                                                    <span>(Co Founder)</span>
                                                </div>
                                            </div>
                                            <div class="inner-contact">
                                                <p>"Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto
                                                    at sint eligendi possimus perspiciatis asperiores reiciendis hic
                                                    amet alias aut quaerat maiores blanditiis."</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="section-team padding-tb-50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        <div class="section-detail">
                            <h2 class="bb-title">Our <span>Team</span></h2>
                            <p>Meet out expert team members.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="bb-team owl-carousel">
                        <div class="bb-team-box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <div class="bb-team-img">
                                <div class="bb-team-socials">
                                    <div class="inner-shape"></div>
                                    <ul>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-twitter-x-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/1.jpg')}}') }}" alt="team-1">
                            </div>
                            <div class="bb-team-contact">
                                <h5>Elena Wilson</h5>
                                <p>Manager</p>
                            </div>
                        </div>
                        <div class="bb-team-box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="bb-team-img">
                                <div class="bb-team-socials">
                                    <div class="inner-shape"></div>
                                    <ul>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-twitter-x-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/2.jpg')}}') }}" alt="team-2">
                            </div>
                            <div class="bb-team-contact">
                                <h5>Mario Bisop</h5>
                                <p>CEO</p>
                            </div>
                        </div>
                        <div class="bb-team-box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                            <div class="bb-team-img">
                                <div class="bb-team-socials">
                                    <div class="inner-shape"></div>
                                    <ul>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-twitter-x-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/3.jpg')}}') }}" alt="team-3">
                            </div>
                            <div class="bb-team-contact">
                                <h5>Maria Margret</h5>
                                <p>Co-Founder</p>
                            </div>
                        </div>
                        <div class="bb-team-box" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="800">
                            <div class="bb-team-img">
                                <div class="bb-team-socials">
                                    <div class="inner-shape"></div>
                                    <ul>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-twitter-x-fill"></i></a>
                                        </li>
                                        <li class="bb-social-link">
                                            <a href="javascript:void(0)"><i class="ri-linkedin-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <img src="{{ asset('images/team/4.jpg')}}') }}" alt="team-4">
                            </div>
                            <div class="bb-team-contact">
                                <h5>Juliat Hilson</h5>
                                <p>Team Leader</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
</div>
