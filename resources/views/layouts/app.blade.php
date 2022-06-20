<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="/css/app.css" rel="stylesheet">

    <link rel="manifest" href="manifest.json">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <title>@yield('title') - WebGBX</title>
</head>

<body class="bg-white dark:bg-neutral-900 text-black dark:text-white">
    <header>
        <nav
            class="bg-zinc-900/50 backdrop-blur fixed top-0 left-0 right-0 w-full border-b border-zinc-500 shadow-2xl shadow-black/80">
            <div class="max-w-7xl mx-auto px-2 lg:px-8">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                        <div class="flex-shrink-0 flex items-center">
                            <h1 class="text-white font-bold">WebGBX</h1>
                        </div>
                        <div class="block ml-6">
                            <div class="flex space-x-4">
                                @php
                                    $homeactive = Request::routeIs('home');
                                    $gbxactive = Request::routeIs('gbx');
                                @endphp

                                <a href="/" @class([
                                    'px-3 py-2 rounded-md text-sm font-medium',
                                    'bg-neutral-900 text-white' => $homeactive,
                                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! $homeactive
                                ]) aria-current="page">Home</a>
                                <a href="/gbx" @class([
                                    'px-3 py-2 rounded-md text-sm font-medium',
                                    'bg-neutral-900 text-white' => $gbxactive,
                                    'text-neutral-300 hover:bg-neutral-700 hover:text-white ' => ! $gbxactive
                                ]) >Map File Information</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <div
            class="h-[20vh] w-full bg-hero-tm-tantoura bg-center bg-cover shadow-[inset_0px_-30px_50px_30px_rgba(0,0,0,0.3)] shadow-black/80">
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-2 lg:px-8">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>

</html>