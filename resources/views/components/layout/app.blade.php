<!DOCTYPE html>
<html lang="{{ App::currentLocale() }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">

    <title>{{ $title }} - WebGBX</title>

    {{-- Main JS from the compiled files --}}
    <script src="/js/app.js" type="application/javascript"></script>

    {{-- AlpineJS --}}
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
        Alpine.magic('clipboard', () => {
            return subject => navigator.clipboard.writeText(subject)
        })
        })
    </script>

    {{-- Required Livewire Styles --}}
    @livewireStyles

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
</head>

<body class="bg-neutral-900 text-white no-scrollbar"> 
    {{-- Navbar and hero sections --}}
    <header>
        {{-- Main navigation bar --}}
        <x-layout.nav />

        {{-- 
        Hero section: Map screenshot with a set height. Overwritable:
        <x-slot:hero>
            <div> (Your content here) </div>
        </x-slot:hero>
        --}}
        @isset($hero)
            {!! $hero !!}
        @else
            <x-layout.hero />
        @endisset

    </header>

    {{-- Main content --}}
    <main class="min-h-[80vh] max-w-7xl mx-auto px-4 sm:px-5 md:px-6 lg:px-8">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-layout.footer class="max-w-7xl mx-auto px-4 sm:px-5 md:px-6 lg:px-8" />

    {{-- Required Livewire JS Scripts --}}
    @livewireScripts

</body>
</html>