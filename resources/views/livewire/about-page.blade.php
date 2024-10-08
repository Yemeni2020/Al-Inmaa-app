<div>
    {{-- <div class="about-container">
        <div class="about-header">
            <h1>{{ $title }}</h1>
        </div>

        <div class="about-content">
            <p>{{ $description }}</p>

            @if ($image)
                <img src="{{ Storage::url($image) }}" alt="About Us Image" class="about-image">
            @endif
        </div>
    </div> --}}

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="mainTitle pageTop">
                    {{__('locale.About Us')}}
                </h1>
            </div>
        </div>
    </div>

    <section class="about-first aos-init aos-animate" data-aos="fade-in" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-content-box">
                        <h2>
                            {{ $title }}
                        </h2>
                        <p>{{ $description }}</p>
                    </div>
                </div>
                <div class="col-lg-5 aos-init aos-animate" data-aos="fade-right" data-aos-delay="500">
                    <div class="first-img-box">
                        <img src="{{ asset('images/slider/01.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-values">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>
                        {{__('locale.Our Values')}}

                    </h2>
                </div>
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="500">
                    <div class="value-card first">
                        <div class="value-img-box">
                            <img src="{{ asset('images/svg/medal-star.svg') }}" alt="">
                        </div>
                        <div class="value-content-box">
                            <h4>
                                {{__('locale.Work with Passion')}}
                            </h4>
                            <p>
                            </p>
                            <p>{{__('locale.message2')}}</p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="700">
                    <div class="value-card second">
                        <div class="value-img-box">
                            <img src="{{ asset('images/svg/shield-tick.svg') }}" alt="">
                        </div>
                        <div class="value-content-box">
                            <h4>
                                {{__('locale.Accountability')}}
                            </h4>
                            <p>{{__('locale.message3')}}
                            </p>
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-up" data-aos-delay="900">
                    <div class="value-card third">
                        <div class="value-img-box">
                            <img src="{{ asset('images/svg/user-octagon.svg') }}" alt="">
                        </div>
                        <div class="value-content-box">
                            <h4>
                                {{__('locale.Customer Focus')}}
                            </h4>
                            <p>
                            </p>
                            <p>{{__('locale.message4')}}</p>
                            <p></p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

</div>
