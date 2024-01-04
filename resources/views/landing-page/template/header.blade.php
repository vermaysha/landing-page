<section class="hero-section-wrapper-3 mb-100">

    <header class="header header-5">
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
                                    data-target="#navbarSupportedContent5" aria-controls="navbarSupportedContent5"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                    <span class="toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent5">
                                    <ul id="nav5" class="navbar-nav ml-auto">
                                        @include('landing-page.navbar')
                                    </ul>
                                </div>
                            </div>
                            <div>&nbsp;</div>
                        </nav>

                    </div>
                </div>

            </div>

        </div>

    </header>


    <div class="hero-section hero-style-3 img-bg"
        style="background-image: url('{{ Vite::asset('resources/img/template/hero-bg.svg') }}');">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="hero-content-wrapper">
                        <div class="content" >
                            <h2 class="mb-30 wow fadeInUp" data-wow-delay=".2s"
                            style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">Desain Inspiratif dari Perfect Coding</h2>
                            <p class="mb-40 wow fadeInUp" data-wow-delay=".4s"
                            style="visibility: visible; animation-delay: 0.4s; animation-name: fadeInUp;">Temukan inspirasi dalam template kami. kami menyediakan
                                berbagai template desain yang dapat Anda gunakan sebagai titik awal atau referensi dalam
                                menciptakan aplikasi Anda.</p>
                            <div class="buttons wow fadeInUp" data-wow-delay=".5s"
                            style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                                <a href="#template" class="button button-lg radius-50">Lihat <i class="lni lni-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="image wow fadeInUp" data-wow-delay=".65s"
                        style="visibility: visible; animation-delay: 0.65s; animation-name: fadeInUp;">
                            <img src="{{ Vite::asset('resources/img/template/hero-img.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shapes">
            <img src="{{ Vite::asset('resources/img/template/shape-1.svg') }}" alt="" class="shape shape-1">
            <img src="{{ Vite::asset('resources/img/template/shape-2.svg') }}" alt="" class="shape shape-2">
            <img src="{{ Vite::asset('resources/img/template/shape-3.svg') }}" alt="" class="shape shape-3">
            <img src="{{ Vite::asset('resources/img/template/shape-4.svg') }}" alt="" class="shape shape-4">
            <img src="{{ Vite::asset('resources/img/template/shape-5.svg') }}" alt="" class="shape shape-5">
            <img src="{{ Vite::asset('resources/img/template/shape-6.svg') }}" alt="" class="shape shape-6">
            <img src="{{ Vite::asset('resources/img/template/shape-7.svg') }}" alt="" class="shape shape-7">
            <img src="{{ Vite::asset('resources/img/template/shape-8.svg') }}" alt="" class="shape shape-8">
        </div>
    </div>

</section>
