<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}

<head>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
            @vite('resources/js/app.js')
            {{-- @include('sweetalert::alert') --}}
            @stack('scripts')
        </main>
    </div>
</body>

</html>
