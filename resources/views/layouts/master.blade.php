<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

    <!-- AlpineJS -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.inc.admin-navbar')

    <!-- Sidebar -->
    <div id="layoutSidenav">
        @include('layouts.inc.admin-sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            @include('layouts.inc.admin-footer')
        </div>
    </div>
    
    <!-- Scripts -->
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}" crossorigin="anonymous"></script>
</body>
</html>