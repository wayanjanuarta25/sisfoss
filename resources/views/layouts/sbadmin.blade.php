<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Dashboard')</title>

    <link rel="icon" href="{{ asset('assets/img/logo.png') }}" type="image/png">

    <!-- SB Admin Bootstrap 5 CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.5.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">

    <!-- Navbar -->
    @include('layouts.partials.navbar')

    <div id="layoutSidenav">
        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>

            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4 text-center">
                    <small>&copy; {{ date('Y') }} Satsiber TNI</small>
                </div>
            </footer>
        </div>
    </div>

    <!-- Bootstrap & DataTables Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2" crossorigin="anonymous"></script>
    <script src="{{ asset('js/datatables-simple-demo.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>

    @stack('scripts')
</body>
</html>
