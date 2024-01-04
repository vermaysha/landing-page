<section class="hero-section-wrapper-6">
    <header class="header header-1">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg justify-content-between">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                {{ config('app.name') }}
                            </a>
                            <div>
                                <button class="navbar-toggler" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                    <ul id="nav" class="navbar-nav ml-auto">
                                        @include('landing-page.navbar')
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="hero-section hero-style-6 mb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6">
                    <div class="hero-content-wrapper">
                        <h2 class="mb-30">Menampilkan Karya Terbaik Kami</h2>
                        <p class="mb-30">Setiap proyek yang kami selesaikan adalah cerita sukses kami, cerita tentang
                            bagaimana kami
                            mengubah tantangan menjadi solusi. Kami menampilkan karya kami yang mencerminkan dedikasi,
                            keahlian, dan inovasi kami. Setiap proyek adalah bukti komitmen kami terhadap kualitas dan
                            kepuasan pelanggan.</p>
                        <a href="#portfolio" class="button button-lg radius-10">Lihat Sekarang <i
                                class="lni lni-chevron-down"></i></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero-image">
                        <img src="{{ Vite::asset('resources/img/portfolio/hero-img.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ Vite::asset('resources/img/portfolio/hero-bg.svg') }}" alt="" class="shape bg-shape">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-1.svg') }}" alt="" class="shape shape-1">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-2.svg') }}" alt="" class="shape shape-2">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-3.svg') }}" alt="" class="shape shape-3">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-4.svg') }}" alt="" class="shape shape-4">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-5.svg') }}" alt="" class="shape shape-5">
            <img src="{{ Vite::asset('resources/img/portfolio/shape-6.svg') }}" alt="" class="shape shape-6">
        </div>
    </div>

</section>
