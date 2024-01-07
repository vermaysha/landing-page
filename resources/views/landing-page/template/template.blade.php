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
                @foreach ($templates as $row)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        <div class="single-gallery">
                            <div class="image">
                                <img src="{{ asset('storage/' . $row->thumbnail) }}" alt="{{ $row->thumbnail }}">
                                <div class="overlay">
                                    <div class="action">
                                        <a href="{{ asset('storage/' . $row->image) }}" target="_blank"> <i class="lni lni-link"></i> </a>
                                    </div>
                                </div>
                            </div>
                            <div class="info">
                                <h5>{{ $row->title }}</h5>
                                <p>{{ $row->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
