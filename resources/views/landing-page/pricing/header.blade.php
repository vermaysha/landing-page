<section class="hero-section-wrapper-4">

    <header class="header header-3">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg justify-content-between">
                            <a class="navbar-brand" href="{{ route('home') }}">
                                <{{ config('app.name') }} </a>
                                    <div>
                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                            data-target="#navbarSupportedContent3"
                                            aria-controls="navbarSupportedContent3" aria-expanded="false"
                                            aria-label="Toggle navigation">
                                            <span class="toggler-icon"></span>
                                            <span class="toggler-icon"></span>
                                            <span class="toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent3">
                                            <ul id="nav3" class="navbar-nav ml-auto">
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

    <div class="hero-section hero-style-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-content-wrapper">
                        <h2 class="mb-30">Solusi Digital Anda, Sesuai Anggaran Anda</h2>
                        <p class="mb-30">Temukan paket yang paling sesuai dengan kebutuhan Anda. Kami menawarkan
                            berbagai paket dengan detail yang lengkap dan
                            terfokus, dirancang untuk memberikan solusi terbaik bagi bisnis Anda. Dengan berbagai
                            pilihan yang tersedia, Anda dapat memilih paket yang paling sesuai dengan anggaran dan
                            kebutuhan Anda</p>
                        <a href="#pricing" class="button button-lg radius-50">Dapatkan Promo <i
                                class="lni lni-chevron-down"></i> </a>
                    </div>
                </div>
                <div class="col-lg-6 align-self-end">
                    <div class="hero-image">
                        <img src="{{ Vite::asset('resources/img/pricing/hero-img.svg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ Vite::asset('resources/img/pricing/shape-1.svg') }}" alt="" class="shape shape-1">
            <img src="{{ Vite::asset('resources/img/pricing/shape-2.svg') }}" alt="" class="shape shape-2">
            <img src="{{ Vite::asset('resources/img/pricing/shape-3.svg') }}" alt="" class="shape shape-3">
        </div>
    </div>

</section>
