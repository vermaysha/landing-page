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
    <style>
        :root {
            --tblr-font-sans-serif: 'Fira Sans', -apple-system, BlinkMacSystemFont, 'San Francisco', 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
        }
    </style>
    @stack('head')
    @vite('resources/js/app.js')
</head>

<body class="d-flex flex-column">
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                @yield('pageContent')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta20/dist/js/tabler.min.js"
        integrity="sha256-ygO5OTRUtYxDDkERRwBCfq+fmakhM6ybwfl6gCCPlAQ=" crossorigin="anonymous"></script>
    @stack('foot')
</body>

</html>
