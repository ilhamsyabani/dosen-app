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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/adminlte.css') }}" rel="stylesheet">

    <!-- Menambahkan Bootstrap secara offline -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="script"></script>
    
    <!-- Menambahkan scripts.js -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('assets/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/adminlte.js') }}"></script>




    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body class="sb-nav-fixed">
    @include('components.navbar-user')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            @include('components.sidebar-user')
        </div>
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            @include('components.footer')
        </div>
    </div>
    @yield('scripts')
</body>

</html>
