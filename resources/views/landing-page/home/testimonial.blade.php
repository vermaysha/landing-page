<section class="testimonial-section testimonial-style-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="testimonial-image wow fadeInUp" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <img src="{{ Vite::asset('resources/img/testimonial-img.png') }}" alt="" class="w-100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="testimonial-active-wrapper wow fadeInUp" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <div class="tns-outer" id="tns1-ow">
                        <div class="tns-controls" aria-label="Carousel Navigation" tabindex="0"><button type="button"
                                data-controls="prev" tabindex="-1" aria-controls="tns1"><i
                                    class="lni lni-chevron-left prev"></i></button><button type="button"
                                data-controls="next" tabindex="-1" aria-controls="tns1"><i
                                    class="lni lni-chevron-right prev"></i></button></div>
                        <div class="tns-liveregion tns-visually-hidden" aria-live="polite" aria-atomic="true">
                            slide <span class="current">5</span> of 2</div>
                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div class="testimonial-active-3  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    id="tns1" style="transform: translate3d(-66.6667%, 0px, 0px);">
                                    <div class="single-testimonial tns-item tns-slide-cloned " aria-hidden="true"
                                        tabindex="-1">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Perfect Coding telah membantu kami mengembangkan aplikasi yang luar
                                                biasa. Mereka benar-benar memahami kebutuhan kami dan memberikan solusi
                                                yang tepat.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Budi Santoso</h5>
                                            <p>CEO di PT. Maju Mundur</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial tns-item tns-slide-cloned " aria-hidden="true"
                                        tabindex="-1">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Saya sangat terkesan dengan kecepatan dan kualitas pekerjaan Perfect Coding. Mereka benar-benar membantu bisnis saya tumbuh.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Dewi Sartika</h5>
                                            <p>Pemilik Toko Online Dewi’s Shop</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial tns-item " id="tns1-item0 " aria-hidden="true"
                                        tabindex="-1">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Tim di Perfect Coding sangat profesional dan mudah diajak bekerja sama. Mereka selalu ada untuk menjawab pertanyaan saya dan memberikan saran yang berharga.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Agus Pranoto</h5>
                                            <p>Manajer Proyek di PT. Sejahtera Abadi</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial tns-item " id="tns1-item1 " aria-hidden="true"
                                        tabindex="-1">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Saya sangat merekomendasikan Perfect Coding untuk semua kebutuhan pengembangan aplikasi Anda. Mereka benar-benar tahu apa yang mereka lakukan.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Ratna Dewi</h5>
                                            <p>Pendiri Startup Edukasi Anak Genius</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial tns-item tns-slide-cloned tns-slide-active">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Perfect Coding telah menjadi partner yang luar biasa dalam proyek kami. Mereka selalu memberikan hasil yang melebihi ekspektasi.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Eko Prasetyo</h5>
                                            <p>Direktur Teknologi di PT. Inovasi Digital Indonesia</p>
                                        </div>
                                    </div>
                                    <div class="single-testimonial tns-item tns-slide-cloned " aria-hidden="true"
                                        tabindex="-1">
                                        <div class="section-title mb-40">
                                            <h2>Testimonial</h2>
                                        </div>
                                        <div class="content">
                                            <p>Saya sangat puas dengan layanan Perfect Coding. Mereka selalu memberikan solusi yang inovatif dan efisien untuk bisnis saya.</p>
                                        </div>
                                        <div class="info">
                                            <h5>Siti Aminah</h5>
                                            <p>CEO di PT. Kuliner Nusantara</p>
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

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.min.css"
        integrity="sha512-06CZo7raVnbbD3BlY8/hGUoUCuhk8sTdVGV3m3nuh9i2R+UmkLbLRTE/My8TuJ3ALbDulhBObJQWtOUt0mXzNQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.min.js"
        integrity="sha512-sfTO4Pp4bdGjTlI1WZZ7zqcbBIo4NY51k1Gr99l1ezQIRboEqAbCNegL3vP65zQwP6aJjqqdDm1GPULlqp94Qw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@push('deferJs')
    <script>
        tns({
            container: '.testimonial-active-3',
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            items: 1,
            controlsText: [
                '<i class="lni lni-chevron-left prev"></i>',
                '<i class="lni lni-chevron-right prev"></i>',
            ]
        });
    </script>
@endpush
