<section class="testimonial-section testimonial-style-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="testimonial-image wow fadeInUp" data-wow-delay=".2s"
                    style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                    <img src="{{ Vite::asset('resources/img/technology-use.png') }}" alt="" class="w-100">
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
                            slide <span class="current">1</span> of {{ $testimonials->count() }}</div>
                        <div id="tns1-mw" class="tns-ovh">
                            <div class="tns-inner" id="tns1-iw">
                                <div class="testimonial-active-3  tns-slider tns-carousel tns-subpixel tns-calc tns-horizontal"
                                    id="tns1" style="transform: translate3d(-66.6667%, 0px, 0px);">
                                    @foreach ($testimonials as $row)
                                        <div class="single-testimonial tns-item" aria-hidden="true" tabindex="-1">
                                            <div class="section-title mb-40">
                                                <h2>Teknologi Terbaik</h2>
                                                <h6>Untuk klien kami</h6>
                                            </div>
                                            <div class="content">
                                                <p>{{ $row->content }}</p>
                                            </div>
                                            <div class="info">
                                                <h5>{{ $row->fullname }}</h5>
                                                <p>{{ $row->job_title }}</p>
                                            </div>
                                        </div>
                                    @endforeach
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
