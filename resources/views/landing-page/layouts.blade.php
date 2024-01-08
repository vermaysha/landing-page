<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-45CG3XF25G"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-45CG3XF25G');
    </script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @hasSection('pageTitle')
        <title>@yield('pageTitle') | {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"
        integrity="sha512-usVBAd66/NpVNfBge19gws2j6JZinnca12rAe2l+d+QkLU9fiG02O1X8Q6hepIpr/EYKZvKx/I9WsnujJuOmBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.compat.min.css"
        integrity="sha512-b42SanD3pNHoihKwgABd18JUZ2g9j423/frxIP5/gtYgfBz/0nDHGdY/3hi+3JwhSckM3JLklQ/T6tJmV7mZEw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="icon" href="{{ Vite::asset('resources/img/icon-perfectcoding2.png') }}" type="image/x-icon">
    <style>
        .mapouter {
            position: relative;
            text-align: right;
            width: 100%;
            height: 220px;
        }

        .gmap_canvas {
            overflow: hidden;
            background: none !important;
            width: 100%;
            height: 220px;
        }

        .gmap_iframe {
            height: 220px !important;
        }
    </style>
    @vite('resources/scss/home.scss')
    @stack('css')
    {{-- /CSS --}}

    {{-- JavaScript --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"
        integrity="sha512-72WD92hLs7T5FAXn3vkNZflWG6pglUDDpm87TeQmfSg8KnrymL2G30R7as4FmTwhgu9H7eSzDCX3mjitSecKnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('js')
    {{-- /JavaScript --}}
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    @yield('pageContent')
    <a href="#" class="scroll-top" style="display: flex;"> <i class="lni lni-chevron-up"></i> </a>
    <footer class="footer footer-style-2 mt-40">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">
                    <div class="col-12 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <div class="logo">
                                <a href="{{ route('home') }}"> {{ config('app.name') }} </a>
                            </div>
                            <p class="desc">“Perfect Coding” berdedikasi untuk membantu
                                Anda mewujudkan visi digital Anda. Kami percaya bahwa setiap masalah
                                memiliki solusi yang sempurna. </p>
                            <ul class="socials">
                                <li> <a target="_blank" href="https://facebook.com/perfectcoding.id"> <i
                                            class="lni lni-facebook-fill"></i> </a> </li>
                                <li> <a target="_blank" href="https://www.instagram.com/perfectcoding.id/"> <i
                                            class="lni lni-instagram-fill"></i> </a> </li>
                                <li> <a target="_blank"
                                        href="https://api.whatsapp.com/send/?phone=6287765299386&text=Halo+Perfect+Coding%2C+Saya+(Nama)+dari+(Kota)+mau+bikin...">
                                        <i class="lni lni-whatsapp"></i> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-2 offset-xl-1 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget">
                            <h6>Contact Info</h6>
                            <ul class="links">
                                <li> <a target="_blank" href="https://facebook.com/perfectcoding.id">Instagram</a> </li>
                                <li> <a target="_blank" href="https://www.instagram.com/perfectcoding.id">Facebook</a>
                                </li>
                                <li> <a target="_blank"
                                        href="https://api.whatsapp.com/send/?phone=6287765299386&text=Halo+Perfect+Coding%2C+Saya+(Nama)+dari+(Kota)+mau+bikin...">Whatsapp</a>
                                </li>
                                <li> <a href="tel:6287765299386" hidden>+62 8776 5299 386</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no"
                                    marginheight="0" marginwidth="0"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63282.313786212006!2d110.7776122133248!3d-7.5592070682909185!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16627ad11ab1%3A0xe7fe4e0454bc3095!2sSurakarta%2C%20Kota%20Surakarta%2C%20Jawa%20Tengah!5e0!3m2!1sid!2sid!4v1704723819201!5m2!1sid!2sid">
                                </iframe>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrapper">
                <p>Copyright &copy; {{ now()->format('Y') }} Perfect Coding. All Right Reserved</p>
            </div>
        </div>
    </footer>
    @vite('resources/js/app.js')
    <script>
        ;
        (() => {
            new WOW().init();
        })();
    </script>
    @stack('deferJs')


</body>

</html>
