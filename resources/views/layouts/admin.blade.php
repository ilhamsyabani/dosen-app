<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <!-- Menambahkan Bootstrap secara offline -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="script"></script>

    <!-- Menambahkan jQuery secara offline (jika menggunakan jQuery) -->
    <script src="{{ asset('js/jquery.min.js') }}" type="script"></script>

    <!-- Menambahkan scripts.js -->
    <script src="{{ asset('js/scripts.js') }}"></script>
   


    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class="sb-nav-fixed">
    @include('components.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('components.sidebar')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('components.footer')
        </div>
    </div>
</body>

</html>
