<section id="home" class="hero-section-wrapper-2">
    <header class="header header-2">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <nav class="navbar navbar-expand-lg justify-content-between">
                            <a class="navbar-brand mt-1" href="{{ route('home') }}">
                                <img src="{{ Vite::asset('resources/img/logo 6.png') }}" alt="logo perfect coding"
                                    class="w-100">
                            </a>
                            <div>
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbar">
                                    <ul id="nav2" class="navbar-nav ml-auto">
                                        @include('landing-page.navbar')
                                    </ul>
                                    <a target="_blank"
                                        href="https://api.whatsapp.com/send/?phone=6287765299386&text=Halo+Perfect+Coding%2C+Saya+(Nama)+dari+(Kota)+mau+bikin..."
                                        class="button button radius-10 d-none d-lg-flex">Kontak</a>
                                </div>
                            </div>
                        </nav>

                    </div>
                </div>

            </div>

        </div>

    </header>


    <div class="hero-section hero-style-2">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-lg-6">
                    <div class="hero-content-wrapper">
                        <h4 class="wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Wujudkan Masa
                            Depan
                            Digitalmu !</h4>
                        <h2 class="mb-30 wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Solusi Digital
                            Anda untuk
                            Masa Depan yang Lebih Baik</h2>
                        <p class="mb-50 wow fadeInUp" data-wow-delay=".6s"
                            style="visibility: visible; animation-delay: 0.6s; animation-name: fadeInUp;">Perfect Coding
                            adalah
                            rumah bagi inovasi. Kami membantu Anda merancang dan membangun aplikasi yang tidak hanya
                            memenuhi
                            kebutuhan Anda, tetapi juga melampaui ekspektasi.</p>
                        <div class="buttons">
                            <a href="https://api.whatsapp.com/send/?phone=6287765299386&text=Halo+Perfect+Coding%2C+Saya+(Nama)+dari+(Kota)+mau+bikin..."
                                class="button button-lg radius-50 wow fadeInUp" data-wow-delay=".7s"
                                style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">Hubungi
                                Kami<i class="lni lni-chevron-right"></i></a>
                            {{-- <a href="#" class="video-button glightbox wow fadeInUp" data-wow-delay=".8s"
                                style="visibility: visible; animation-delay: 0.8s; animation-name: fadeInUp;"> <span
                                    class="icon"><i class="lni lni-play"></i></span> <span>Watch now</span> </a> --}}
                        </div>
                    </div>
                </div>
                <div class="d-none d-lg-block col-lg-6">
                    <div class="hero-image">
                        <img src="{{ Vite::asset('resources/img/home/hero-img.svg') }}" alt=""
                            class="wow fadeInRight" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInRight;">
                        <img src="{{ Vite::asset('resources/img/home/paattern.svg') }}" alt=""
                            class="shape shape-1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
