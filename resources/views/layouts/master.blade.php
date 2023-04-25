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
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    
    {{-- Bootstrap icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    Styles
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">

    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

    {{-- Datatable --}}
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <style>
        .dataTables_wrapper .dataTables_paginate .paginate_button
        {
            padding: 0px !important;
            margin: 0px !important;
        }
        .dataTables_wrapper .dataTables_length select
        {
            width: 50% !important;
        }
    </style>

    {{-- SummernoteJS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="sb-nav-fixed">
    {{-- Navbar --}}
    @include('layouts.inc.admin-navbar')

    {{-- Sidebar --}}
    <div id="layoutSidenav">
        @include('layouts.inc.admin-sidebar')
        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            @include('layouts.inc.admin-footer')
        </div>
    </div>
    
    {{-- Scripts --}}
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/scripts.js')}}" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script> {{-- JQuery --}}
    
    {{-- Datatable scripts --}}
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        var table = new DataTable('#myTable', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/vi.json',
            },
        });
    </script>

    {{-- SummernoteJS scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="{{asset('assets/js/summernote-vi-VN.js')}}"></script>
    <script>
        $(document).ready(function() {
            $("#mySummernote").summernote({
                lang: "vi-VN"
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
</body>
</html>