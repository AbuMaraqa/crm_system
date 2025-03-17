<div class="contact-us-page">
    <!-- page title -->
    <section class="page-title-inner" data-bg-img='{{ asset('frontend-assets/images/page-titlebg.png') }}'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- page title inner -->
                    <div class="page-title-wrap">
                        <div class="page-title-heading">
                            <h1 class="h2">
                                {{ __('Contact Us') }}
                                <span>
                                    {{ __('Contact Us') }}
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
                                    {{ __('Contact Us') }}
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

    <!-- office location -->
    <section class="pt-100 pb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-12">
                    <!-- office info -->
                    <div class="office-ifno-inner">
                        <h3>
                            {{ __('Reach Our Expert Team')}}
                        </h3>
                        <p>
                            {{ __('We are here to help you with any questions you may have. Reach out to us and we will respond as soon as we can.') }}
                        </p>
                    </div>
                    <!--End of office info -->

                    <!-- office address -->
                    <div class="office-addess-inner">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- single address -->
                                <div class="single-address">
                                    <h4>
                                        {{ __('Our Location')}}
                                    </h4>
                                    <ul class="list-unstyled mb-0">
                                        <li>Building 5, Xishan Home, Xishan Street, Ouhai District, Wenzhou City Zhou
                                            Hui 13780178413
                                        </li>
                                    </ul>
                                </div>
                                <!-- End of single address -->
                            </div>
                            <div class="col-md-4">
                                <!-- single address -->
                                <div class="single-address">
                                    <h4>
                                        {{ __("Email") }}
                                    </h4>
                                    <a href="mailto:info@beedent.net">info@beedent.net</a>
                                </div>
                                <!-- End of single address -->
                            </div>
                            <div class="col-md-4">
                                <!-- single address -->
                                <div class="single-address">
                                    <h4>
                                        {{ __('Phone') }}
                                    </h4>
                                    <ul class="list-unstyled mb-0">

                                    </ul>
                                </div>
                                <!-- End of single address -->
                            </div>
                        </div>
                    </div>
                    <!-- End of office address -->
                </div>

                <div class="col-md-12 col-lg-12">
                    <!--office address form -->
                    <div class="office-address-form">

                        <div class="address-form-inner contact-page-form parsley-validate">
                            @if (session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form wire:submit.prevent="submit" novalidate>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-form-group">
                                            <label>
                                                <img src="{{ asset('frontend-assets/images/icons/account-icon.svg') }}"
                                                     class="svg" alt="">
                                            </label>
                                            <input type="text" wire:model="yourName"
                                                   placeholder="{{ __('Enter Your Name') }}" class="theme-input-style"
                                                   aria-required="true" aria-invalid="false" required>
                                            @error('yourName') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-form-group">
                                            <label>
                                                <img src="{{ asset('frontend-assets/images/icons/email-icon.svg') }}"
                                                     class="svg" alt="">
                                            </label>
                                            <input type="email" wire:model="yourEmail"
                                                   placeholder="{{ __('Enter Your Email') }}"
                                                   class="theme-input-style" aria-required="true" aria-invalid="false"
                                                   required>
                                            @error('yourEmail') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-form-group">
                                            <input type="tel" wire:model="phoneNumber"
                                                   placeholder="{{ __('Enter Your Number') }}"
                                                   class="theme-input-style" aria-required="true" aria-invalid="false"
                                                   required>
                                            @error('phoneNumber') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-form-group">
                                            <input type="text" wire:model="yourCompany"
                                                   placeholder="{{ __('Your Company (optional)') }}"
                                                   class="theme-input-style" aria-required="true" aria-invalid="false">
                                            @error('yourCompany') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-form-group">
                                            <label>
                                                <img src="{{ asset('frontend-assets/images/icons/subject.svg') }}"
                                                     class="svg" alt="">
                                            </label>
                                            <input type="text" wire:model="yourSubject"
                                                   placeholder="{{ __('Enter Your Subject') }}"
                                                   class="theme-input-style" aria-required="true" aria-invalid="false" required>
                                            @error('yourSubject') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-form-group">
                                            <label>
                                                <img src="{{ asset('frontend-assets/images/icons/message.svg') }}"
                                                     class="svg" alt="">
                                            </label>
                                            <textarea wire:model="yourMessage" cols="40" rows="10"
                                                   placeholder="{{ __('Your message (optional)') }}"
                                                   class="theme-input-style" aria-required="true" aria-invalid="false"></textarea>
                                            @error('yourMessage') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-fill-type mb-30">
                                            {{ __('Send Message') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--End of office address form -->
                </div>

                <div class="col-md-12 col-lg-12">
                    <!-- google map -->
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d71516.68630957583!2d120.68485509850957!3d27.906870294745882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3445885d4da4f895%3A0x7ab061090978fb8f!2sXishan%20Road!5e0!3m2!1sen!2sus!4v1719196431699!5m2!1sen!2sus"
                        width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <!-- End of google map -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of office location -->
</div>
