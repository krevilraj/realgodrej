@section('content')
    <section id="contactus-container">
        <div class="container">
            <div class="top-list">
                <ul>
                    <li class="active"><a href="#"> Godrej & Boyce</a></li>
                    <li><a href="#" class="top-list-link"> Godrej Industries</a></li>
                    <li><a href="#" class="top-list-link"> Godrej Consumer Products</a></li>
                    <li><a href="#" class="top-list-link"> Godrej Properties</a></li>
                    <li><a href="#" class="top-list-link"> Godrej Agrovet</a></li>
                </ul>
            </div>

            <div class="map-section">

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9995922269873!2d85.24561105002408!3d27.68640748271619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb22ec5d818a75%3A0x239ed562a6f13976!2sCG%20Digital%20Park!5e0!3m2!1sen!2snp!4v1611998761645!5m2!1sen!2snp" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>

            <div class="businessunit-section">
                <div class="address-section">
                    <h3>{{getConfiguration('site_title')}}</h3>
                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center">
                            <strong class="text font-weight-normal">{{getConfiguration('site_address')}}</strong>
                        </li>
                        <li class="d-flex align-items-center">
                            <strong class="text font-weight-normal"><a
                                    href="mailto:{{getConfiguration('site_primary_email')}}">{{getConfiguration('site_primary_email')}}</a></strong>
                        </li>
                        <li class="d-flex align-items-center">
                            <strong class="text font-weight-normal"><a
                                    href="tel:{{getConfiguration('site_primary_phone')}}">{{getConfiguration('site_primary_phone')}}</a></strong>
                        </li>
                    </ul>

                </div>

                <div class="business-section">
                    <h3 class="business-unit-text">Our Business Units</h3>
                    <!-- Swiper -->
                    <div class="swiper-container-business-section">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <h4>Godrej Aerospace</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 8,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br>
                                    <br>

                                    <span class="email-inside-slide">
                                       srkn@godrej.com
                                   </span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <h4>Godrej Appliances</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 11,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br>
                                    <br>
                                    <span class="email-inside-slide">
                                        smartcare@godrej.com
                                    </span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <h4>Godrej Construction</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 25,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br>
                                    <br>
                                    <span class="email-inside-slide">
                                       construction@godrej.com
                                   </span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <h4>Godrej Electricals & Electronics</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 1,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br>
                                    <br>
                                    <span class="email-inside-slide">
                                       spurohit@godrej.com
                                   </span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <h4>Godrej Interio</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 13,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br>
                                    <br>
                                    <span class="email-inside-slide">
                                       interiocare@godrej.com
                                   </span>
                                </p>
                            </div>
                            <div class="swiper-slide">
                                <h4>Godrej Locking Solutions & Systems</h4>
                                <p>
                                    Godrej & Boyce Manufacturing Company Limited, Plant 8,
                                    <br>
                                    Pirojshanagar, Vikhroli
                                    <br>
                                    Mumbai 400 079, India
                                    <br><br>

                                    <span class="email-inside-slide">
                                       locksmkt@godrej.com
                                   </span>
                                </p>
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>

            <div class="contactform-section">
                <div class="leftside">
                    <h3>Write to us</h3>
                </div>
                <div class="rightside">
                    @livewire('partials.contact-form')
                </div>
            </div>

        </div>



    </section>




@endsection
@push('scripts')
    <script>
        var swiper = new Swiper('.swiper-container-business-section', {
            slidesPerView: 2,
            spaceBetween: 30,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
