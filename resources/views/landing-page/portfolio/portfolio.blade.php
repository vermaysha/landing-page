@extends('landing-page.layouts')

@section('pageTitle', 'Portfolio')

@section('pageContent')
    @include('landing-page.portfolio.header')

    <section id="portfolio" class="gallery-section gallery-style-5" style="background: #fff">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-7 col-md-10">
                    <div class="section-title text-center mb-60">
                        <h3 class="mb-15 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Portfolio</h3>
                        <p class="wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Jelajahi Portfolio
                            Perfect Coding, tempat ide menjadi inovasi digital yang nyata.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col wow fadeInDown" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInDown;">
                    <div class="portfolio-button-wrapper">
                        <button class="portfolio-btn active" data-filter="*">All</button>
                        <button class="portfolio-btn" data-filter=".web">Web Design</button>
                        <button class="portfolio-btn" data-filter=".dev">Web Development</button>
                        <button class="portfolio-btn" data-filter=".app">Mobile App</button>
                        <button class="portfolio-btn" data-filter=".branding">Branding</button>
                        <button class="portfolio-btn" data-filter=".illustration">Illustration</button>
                    </div>
                </div>
            </div>
            <div class="row gallery-5 wow fadeInUp" data-wow-delay=".2s"
                style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                <div class="col-lg-4 col-md-6 gallery-item web branding">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-1.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item dev app illustration">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-2.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item branding illustration">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-3.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item web illustration">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-5.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item web app branding">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-6.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 gallery-item web dev app">
                    <div class="single-gallery">
                        <div class="image">
                            <img src="{{ Vite::asset('resources/img/gallery-4.jpg') }}" alt="">
                        </div>
                        <div class="overlay">
                            <div class="overlay-content">
                                <div class="info">
                                    <h5>Business</h5>
                                    <p>Short description for the ones who look for something new. Awesome!</p>
                                </div>
                                <div class="action">
                                    <a href="#0"> <i class="lni lni-link"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
@endpush

@push('deferJs')
    <script>
        imagesLoaded('#portfolio', function() {
            var elem5 = document.querySelector('.gallery-5');
            var iso5 = new Isotope(elem5, {
                // options
                itemSelector: '.gallery-item',
                masonry: {
                    // use outer width of grid-sizer for columnWidth
                    columnWidth: '.gallery-item'
                }
            });

            let filterButtons = document.querySelectorAll('#portfolio .portfolio-button-wrapper button');
            filterButtons.forEach(e =>
                e.addEventListener('click', () => {

                    let filterValue = event.target.getAttribute('data-filter');
                    iso5.arrange({
                        filter: filterValue
                    });
                })
            );
        });
        let elements5 = document.querySelectorAll("#portfolio .portfolio-btn");
        for (var i = 0; i < elements5.length; i++) {
            elements5[i].onclick = function() {
                var el = elements5[0];
                while (el) {
                    if (el.tagName === "BUTTON") {
                        el.classList.remove("active");
                    }
                    el = el.nextSibling;
                }
                this.classList.add("active");
            };
        }
    </script>
@endpush
