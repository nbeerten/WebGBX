<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="/css/app.css" rel="stylesheet">

        <title>@yield('title') - WebGBX</title>
    </head>
<body>
    <header>
        <nav class="bg-gray-800">
            <div class="max-w-7xl mx-auto px-2 lg:px-8">
              <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                  <div class="flex-shrink-0 flex items-center">
                    <img class="block h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                  </div>
                  <div class="block ml-6">
                    <div class="flex space-x-4">
                      <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                      <a href="/" class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
                      <a href="/gbx" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Map File Information</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>