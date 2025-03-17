<div class="terms-and-conditions-page">
   <!-- Terms & Conditions -->
   <section class="section-terms padding-tb-50">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">Terms & <span>Conditions</span></h2>
                        <p>Customer Terms Conditions.</p>
                    </div>
                </div>
            </div>
            <div class="desc">
                <div class="row mb-minus-24">
                    <div class="col-lg-12 col-md-12 mb-24">
                        <div class="terms-detail" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                            <div class="block">
                                <h3>{{ $terms_and_conditions->title }}</h3>
                                <p>{!! $terms_and_conditions->description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Faq -->
{{-- <section class="section-faq padding-tb-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-12">
                <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                    data-aos-delay="200">
                    <div class="section-detail">
                        <h2 class="bb-title">frequently asked <span>questions</span></h2>
                        <p>Customer service management.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mb-24">
                <div class="bb-faq-img" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <img src="{{ asset('images/faq/faq.jpg') }}" alt="faq-img">
                </div>
            </div>
            <div class="col-lg-8 mb-24">
                <div class="bb-faq-contact" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="600">
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What is the multi vendor services?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How to buy many products at a time?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Refund policy for customer
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Exchange policy for customer
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    Give a way products available
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    Exchange policy for customer
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate sint atque
                                    pariatur cupiditate beatae voluptates quidem. Et tenetur autem itaque? Eum
                                    exercitationem assumenda enim eos voluptas. Ad incidunt laborum aliquam,
                                    expedita, voluptatibus quo id adipisci ea ratione ut, dignissimos natus?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
</div>
