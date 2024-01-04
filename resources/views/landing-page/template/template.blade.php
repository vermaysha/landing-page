@extends('landing-page.layouts')

@section('pageTitle', 'Template')

@section('pageContent')
    @include('landing-page.template.header')

    <section id="template" class="gallery-section gallery-style-4" style="background: #fff">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-60">
                        <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Desain Template
                        </h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Kami
                            menawarkan template desain yang inovatif dan menarik. Gunakan template kami sebagai titik awal
                            dalam menciptakan solusi digital Anda.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-1.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Web Design</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-2.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Graphic Design</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-3.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Mobile App</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-4.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Web Development</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".3s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-5.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Content Generate</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/template/gallery-6.jpg') }}" alt="">
                            <div class="overlay">
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                        <div class="info">
                            <h5>Seo Optimization</h5>
                            <p>Short description for the ones who look for something new. Awesome!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
