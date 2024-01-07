<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @hasSection('pageTitle')
        <title>@yield('pageTitle') | Dashboard &dash; {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/css/tabler.min.css"
        integrity="sha256-lS3nKxMMZiKIRJG7UgUonOHYuvHgW5eckEjvHMYxb9Q=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.45.0/tabler-icons.min.css"
        integrity="sha256-2qo2IY0L2cQtVnYCiHJaQwR1AUa1b1eVlOa2tT6/lBQ=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/themes/blue/pace-theme-flash.css"
        integrity="sha256-Kk0yRO8JR3ajRG7oTKhiZuIF7mgZpEpFaafRrgwwx/I=" crossorigin="anonymous">
    <style>
        :root {
            --tblr-font-sans-serif: 'Fira Sans', -apple-system, BlinkMacSystemFont, 'San Francisco', 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/pace-js@1.2.4/pace.min.js"
        integrity="sha256-gqd7YTjg/BtfqWSwsJOvndl0Bxc8gFImLEkXQT8+qj0=" crossorigin="anonymous"></script>
    <script>
        function preview(event, id) {
            const previewImage = document.getElementById(id);
            if (event.target.files.length > 0) {
                previewImage.querySelector('img').src = URL.createObjectURL(
                    event.target.files[0],
                );

                previewImage.style.display = 'block';
            } else {
                previewImage.style.display = 'none';
            }
        }
    </script>
    @stack('head')
    @vite('resources/js/app.js')
</head>

<body>
    <div class="page">
        <!-- Sidebar -->
        <aside class="navbar navbar-vertical navbar-expand-lg" data-bs-theme="dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar-menu"
                    aria-controls="sidebar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="{{ route('dashboard.home') }}">
                        {{ config('app.name') }}
                    </a>
                </h1>
                <div class="navbar-nav flex-row d-lg-none">&nbsp;</div>
                <div class="collapse navbar-collapse" id="sidebar-menu">
                    <ul class="navbar-nav pt-lg-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.home') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-home"></div>
                                </span>
                                <span class="nav-link-title">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.testimonial.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-book"></div>
                                </span>
                                <span class="nav-link-title">
                                    Testimonials
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.plan.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-timeline-event"></div>
                                </span>
                                <span class="nav-link-title">
                                    Plan
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.portfolio.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-file-star"></div>
                                </span>
                                <span class="nav-link-title">
                                    Portfolio
                                </span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.template.index') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-template"></div>
                                </span>
                                <span class="nav-link-title">
                                    Template
                                </span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard.home') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <div class="icon ti ti-settings"></div>
                                </span>
                                <span class="nav-link-title">
                                    Setting
                                </span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </aside>
        <!-- Navbar -->
        <header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="javascript:void(0);" class="nav-link d-flex lh-1 text-reset p-0"
                            data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm">
                                <div class="ti ti-user icon"></div>
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->fullname }}</div>
                                <div class="mt-1 small text-secondary">{{ auth()->user()->email }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('dashboard.logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div>&nbsp;</div>
            </div>
        </header>
        <div class="page-wrapper">
            @yield('pageContent')
        </div>
        {{-- <header class="navbar navbar-expand-md d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
                    aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href="{{ route('dashboard.home') }}">
                        {{ config('app.name') }}
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">
                    <div class="nav-item dropdown">
                        <a href="javascript:void(0);" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm">
                                <i class="icon ti ti-user"></i>
                            </span>
                            <div class="d-none d-xl-block ps-2">
                                <div>{{ auth()->user()->fullname }}</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="{{ route('dashboard.logout') }}" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.home') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="ti ti-home icon"></i>
                                    </span>
                                    <span class="nav-link-title">
                                        Home
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dashboard.testimonial.index') }}">
                                    <span
                                        class="nav-link-icon d-md-none d-lg-inline-block">
                                        <i class="ti ti-book icon"></i>
                                    </span>
                                    <span class="nav-link-title">
                                        Testimonials
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/js/tabler.min.js"
        integrity="sha256-ygO5OTRUtYxDDkERRwBCfq+fmakhM6ybwfl6gCCPlAQ=" crossorigin="anonymous"></script>
    @stack('foot')
</body>

</html>
