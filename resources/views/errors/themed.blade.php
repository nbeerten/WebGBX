<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title') - WebGBX</title>

        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    </head>
    <body class="text-white bg-neutral-900">
        <main class="grid place-content-center h-screen w-screen">
            <div class="flex flex-row divide-x divide-neutral-500 items-center justify-center py-2">
                <h2 class="px-4 font-bold text-3xl">@yield('code')</h2>

                <h1 class="px-4 text-lg">@yield('message')</h1>
            </div>
            <div class="flex justify-center">
                <h3 class="italic">
                    @yield('custommessage', '')
                </h3>
            </div>
            <div class="flex justify-center border-t border-neutral-500 pt-2 mt-2">
                <a href="/" class="text-blue-500 hover:underline hover:text-blue-600">Go back to the homepage</a>
            </div>
        </main>
    </body>
</html>
