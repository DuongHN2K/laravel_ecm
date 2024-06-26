<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- Fonts --}}
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    
    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

    {{-- Owl Carousel --}}
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">

    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- AlertifyJS CSS --}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

    {{-- Exzoom - Product images --}}
    <link rel="stylesheet" href="{{asset('assets/exzoom/jquery.exzoom.css')}}">

    {{-- Livewire styles --}}
    @livewireStyles
</head>
<body>
    <div id="app">
        @include('layouts.inc.frontend.frontend-navbar')
        
        <main>
            @yield('content')
        </main>

        @include('layouts.inc.frontend.frontend-footer')
    </div>

    {{-- Scripts --}}
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script> {{-- JQuery --}}
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script> {{-- Owl Carousel --}}
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script> {{-- AlertifyJS --}}
    <script src="{{asset('assets/exzoom/jquery.exzoom.js')}}"></script> {{-- Exzoom --}}

    <script>
        window.addEventListener('message', event => {
            alertify.set('notifier','position', 'bottom-right');
            alertify.notify(event.detail.text, event.detail.type);
        })
    </script>

    @yield('script')
    @livewireScripts
    @stack('scripts')
</body>
</html>
