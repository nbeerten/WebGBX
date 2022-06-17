<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu+Mono:ital,wght@0,400;0,700;1,400;1,700&family=Ubuntu:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

        <title>@yield('title') - WebGBX</title>
    </head>
<body class="bg-white dark:bg-neutral-900 text-black dark:text-white">
    <header>
        <nav class="bg-neutral-800">
            <div class="max-w-7xl mx-auto px-2 lg:px-8">
              <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                  <div class="flex-shrink-0 flex items-center">
                    <h1 class="text-white font-bold">WebGBX</h1>
                  </div>
                  <div class="block ml-6">
                    <div class="flex space-x-4">
                      <!-- Current: "bg-neutral-900 text-white", Default: "text-neutral-300 hover:bg-neutral-700 hover:text-white" -->
                      <a href="/" class="bg-neutral-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                      <a href="/gbx" class="text-neutral-300 hover:bg-neutral-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Map File Information</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
    </header>
    <main class="max-w-7xl mx-auto px-2 lg:px-8">
        <div class="container">
            @yield('content')
        </div>
    </main>
</body>
</html>