<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">

    <link rel="apple-touch-icon" sizes="180x180" href="/ico/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/ico/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/ico/favicon-16x16.png">
    <link rel="mask-icon" href="/ico/safari-pinned-tab.svg" color="#2681fe">
    <meta name="apple-mobile-web-app-title" content="WebGBX">
    <meta name="application-name" content="WebGBX">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-config" content="/ico/browserconfig.xml">
    
    <link rel="manifest" href="/manifest.json">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <title>@yield('title') - WebGBX</title>
    <script src="/js/app.js" type="application/javascript"></script>
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-neutral-900 text-white no-scrollbar">
    <header>
        {{-- Main navigation bar --}}
        <x-layout.nav />

        {{-- Hero section: Map screenshot with a set height. Overwritable. --}}
        @section('hero')
        <div class="h-[20vh] w-full bg-hero-tm-tantoura bg-center bg-cover {{-- shadow-[inset_0px_-30px_50px_30px_rgba(0,0,0,0.3)] shadow-black/80 --}}">
        </div>
        @show

    </header>
    <main class="max-w-7xl mx-auto px-4 sm:px-5 md:px-6 lg:px-8">
        @section('content')
        @show
    </main>
    <footer class="max-w-7xl mx-auto px-4 sm:px-5 md:px-6 lg:px-8">
        @include('layouts.footer')
    </footer>
    @livewireScripts
</body>
</html>